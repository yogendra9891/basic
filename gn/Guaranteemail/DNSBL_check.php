<?php
/**
 * @copyright http://creativecommons.org/licenses/by/3.0/ - Please keep this comment intact
 * @author gavin@engel.com
 */
class DNSBL_check {

  // required
  var $ip =''; // you may set to a blacklisted ip found on http://www.projecthoneypot.org homepage, to see what happens to it...

  // read only
  var $errors = array(); // if errors found, they are stored in this array.  The structure of this array will change as new versions are released. (the recommened error message will probably change)
  var $debug_messages = array(); // if debug is turned on, debug messages are stored in this array.  The structure of this array will change as new versions are released.
  var $version  = '1.0.1';
  var $last_revised  = '2011.02.13.1443';

  // optional
  var $http_bl_access_key; // sign up at: http://www.projecthoneypot.org/ then click here to get the key: http://www.projecthoneypot.org/httpbl_configure.php
  var $use_strong_verification = false; // use the XBL Spamhaus blacklist

  // privates
  var $_http_bl_host = 'dnsbl.httpbl.org'; // don't change this.
  var $_verified_ips = array(); // cache visitor's ip after verifying.  Useful when verifying lots of email addresses in single page load
  var $_rip; // holds the reversed ip
  var $_bad_ip  = false; // if found on a DNSBL, this is set to true.

  /**
   * @return bool
   */
  function validate_ip() {
    // clear errors/debug-messages, in case this object is verifying multiple email addresses in a single page load
    $this->errors = array();
    $this->debug_messages = array();

    $this->_reverse_ip(); // reset `$_rip`, in case this function is called more than once

    if ($this->ip) {
    if (!$this->_in_verified_ips($this->ip)) {
        $this->__ez_debug("IP address `{$this->ip}` not already verified.  Checking DNSBLs.");
        $this->_check_dnsbls();
        if (!$this->_bad_ip) { $this->_check_http_bl(); }

        if (!$this->_bad_ip) {
          $this->_verified_ips[] = $this->ip;
        }
        else {
          $this->errors[(string) microtime(true)] = array('failed-dnsbl-checks' => "The IP address `{$this->ip}` has failed DNSBL blacklists verification.");
        }
      }
      else {
        $this->__ez_debug("IP address `{$this->ip}` already verified.  Not checking DNSBLs.");
      }
    }
    else {
      $this->errors[(string) microtime(true)] = array('dnsbl-missing-ip' => "No IP address has been passed to ".__function__);
    }

    return ($this->_bad_ip)?false:true;
  }


  /**
   * Checks major dns-blacklists and adds to error log if found
   * @author GJE and mix of suggestions from: http://php.net/manual/en/function.checkdnsrr.php
   * @return bool
   */
  function _check_dnsbls() {
    $results = array();

    if ($this->_rip) {
      $this->__ez_debug("timemark");
      $dnsbls = array(
        ##unused in this release.## 'bl.spamcop.net'=>'http://www.spamcop.net/bl.shtml',
        'sbl.spamhaus.org'=>'http://www.spamhaus.org/sbl/delistingprocedure.html',
      );

      if ($this->use_strong_verification) { $dnsbls['xbl.spamhaus.org'] ='http://www.spamhaus.org/lookup.lasso'; }

      foreach ($dnsbls as $dnsbl=>$dnsbl_removal_url)
      {
        $this->__ez_debug("Checking DNSBL: $dnsbl.");
        $this->__ez_debug("network-connection: checkdnsrr");
        if (checkdnsrr($this->_rip.'.'.$dnsbl.'.','A'))
        {
          $this->__ez_debug("FAIL: ip address `{$this->ip}` is on blacklist $dnsbl.");
          list($usec, $sec) = explode(" ", microtime());$debug_time = $sec.substr($usec,1,7);$this->debug_messages[$debug_time][__class__.'::'.__function__.'#'.__line__]  = array($dnsbl => $this->_rip.'.'.$dnsbl);
          $this->errors[(string) microtime(true)] = array('failed-dnsbl-check' => "IP address `{$this->ip}` is on blacklist `$dnsbl`.  For information about this blacklist and removing your IP address from it please see: $dnsbl_removal_url");
          $this->_bad_ip  = true;
          break;
        }
      }
      $this->__ez_debug("timemark");
    }

    return $results;
  }



  /**
   * dnsbl's require the ip be reversed before sending to its api
   * @return string
   */
  function _reverse_ip() {
      if ($this->ip)
      {
          preg_match("/[0-9]{1,4}.[0-9]{1,4}.[0-9]{1,4}.[0-9]{1,4}/", $this->ip, $matches);
          $pieces = explode(".", $matches[0]);
          if (count($pieces)==4)
          {
              $this->_rip = $pieces[3] . '.' . $pieces[2] . '.' . $pieces[1] . '.' . $pieces[0];
          }
      }
  }


  /**
   * connect to http:bl api
   * @return array
   */
  function _get_http_bl_values() {
      $values = array();

      if ($this->_rip)
      {
          $this->__ez_debug("Request: ".$this->http_bl_access_key . '.' . $this->_rip . '.' . $this->_http_bl_host);
          $this->__ez_debug("network-connection: gethostbyname (debug display)");
          $this->__ez_debug("resolved?: " . gethostbyname($this->http_bl_access_key . '.' . $this->_rip . '.' . $this->_http_bl_host));

          $this->__ez_debug("timemark");
          $this->__ez_debug("Checking DNSBL: {$this->_http_bl_host}.");
          $this->__ez_debug("network-connection: gethostbyname");


          $response = gethostbyname($this->http_bl_access_key . '.' . $this->_rip . '.' . $this->_http_bl_host);
          $this->__ez_debug("Raw HTTP:BL response:  {$response}");
          $this->__ez_debug("timemark");

          if (!strstr($response, $this->_http_bl_host)) { //if the domain does not resolve then it will be the same thing we passed to gethostbyname

            $this->__ez_debug("response is: ".var_export($response, true));

            $response = explode("." ,$response);

            if ($response[0] == 127) { //First octet must be 127, else there is an error condition
              $this->__ez_debug("HTTP:BL correct octet response.");
              $values['last_activity'] = $response[1];
              $values['threat'] = $response[2];

              if ($response[3] == 0)//if it's 0 then there's only 1 thing it can be
                $values['Search_Engine'] = true;
              if ($response[3] & 1)//does it have the same bits as 1 set
                $values['Suspicious'] = true;
              if ($response[3] & 2)//does it have the same bits as 2 set
                $values['Harvester'] = true;
              if ($response[3] & 4)//does it have the same bits as 4 set
                $values['Comment_Spammer'] = true;
            }
            else {
            $this->__ez_debug("HTTP:BL incorrect octet response.");
            }

          }

      }

      return $values;
  }


  /**
   * return the http:bl treat level for an ip address
   * @return int
   */
  function _get_httpbl_threat_level() {
      $level  = 0;

      if ($this->ip and $this->http_bl_access_key)
      {
          $answer = $this->_get_http_bl_values($this->ip);
          if ($answer != false) {
              $level  = $answer["threat"];
          }

          $this->__ez_debug("Check ".__function__." result:".var_export($answer, true));

      }
      else {
          $this->__ez_debug('Not performing http:bl check.');
      }

      return $level;
  }

  /**
   * If ip address on http:bl blacklist then return false
   * @return bool
   */
  function _check_http_bl()
  {
      $result = false;

      if ($this->_in_verified_ips($this->ip)) {
          // its been verfied already, so let's not waste time.
          $this->__ez_debug("not checking ip {$this->ip} since its been checked before.");
          $result = true;
      }
      else {
          if ($this->_get_httpbl_threat_level($this->ip) > 0) {
              $this->errors[(string) microtime(true)] = array('failed-dnsbl-check' => "The IP address `{$this->ip}` has failed non-blacklist verification with `http://www.projecthoneypot.org`.");
              $this->__ez_debug("The IP address `{$this->ip}` has failed non-blacklist verification with `http://www.projecthoneypot.org`.");
              $this->_bad_ip  = true;
          }
          else {
        $this->__ez_debug("The IP address `{$this->ip}` has passed non-blacklist verification with `http://www.projecthoneypot.org`.");
            $result = true;
          }
      }

      $debug_message = "Check ".__function__.":";
      $debug_message .= ($result)? 'pass':'fail';
      $this->__ez_debug($debug_message);

      return $result;
  }

  /**
   * Determines if the `_verified_ips` stores the passed ip (accepts `*` mask)
   * @return bool
   */
  function _in_verified_ips($ip_string='') {
      $in_verified = false;

      if ($ip_string) {
      $passed_pieces = explode('.', $ip_string);

      foreach ($this->_verified_ips as $verified_ip) {
      $verified_pieces  = explode('.', $verified_ip);

      $found_mismatch = false;
        foreach (range(0,3) as $i) {
          if ($verified_pieces[$i] != $passed_pieces[$i] && $verified_pieces[$i] != '*')
          {
          $found_mismatch = true;
        }

      }
      if ($found_mismatch) {
        $this->__ez_debug("Found a mismatch of IP address {$ip_string} with the verified IP address {$verified_ip}");
            }
            else {
        $this->__ez_debug("Not found a mismatch of IP address {$ip_string} with the verified IP address {$verified_ip}");
                $in_verified = true;
                break;
      }
    }

    }

    return $in_verified;
  }

  /**
   * Add Useful and Simple Debug Messages to $this->debug_messages
   * @last_revised 2011.01.11.1111
   * @return null
   */
  function __ez_debug($msg='') {

    list($usec, $sec) = explode(" ", microtime());
    $debug_time = $sec.substr($usec,1,7);
    $backtrace     = debug_backtrace();
    $this->debug_messages[$debug_time][__class__.'::'.$backtrace[1]['function'].'#'.$backtrace[0]['line'].'!'.memory_get_usage()] = $msg;

  }

}
