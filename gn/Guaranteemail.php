<?php

/**
 * This class verifies email address in the following ways:
 * 1- email address syntax (missing `@`, missing `.`, etc)
 * 2- the domain name of the email address is registered and responding
 * 3- the ip address of the email host is not on a major DNSBL
 * 4- the ip address of the visitor is not on a major DNSBL
 * 5- for certain email providers, we can check the exact mailbox with SMTP validation
 *
 * @copyright http://creativecommons.org/licenses/by/3.0/ - Please keep this comment intact
 * @author gavin@engel.com
 * @homepage http://code.gavinengel.com/guaranteemail
 */
class Guaranteemail {

  // required
  var $email; // required, set to email address string

  // optional
  var $skip_dnsbl = false; // set this to true, and DNSBLs will not be used.
  var $skip_boxcheck = true; // set this to true, and SMTP mailbox validation will not be used
  var $skip_hostcheck = false; // set this to true, and DNS validation will not be used

  // read only
  var $errors = array(); // if errors found, they are stored in this array.  The structure of this array will change as new versions are released.  (the recommened error message will probably change)
  var $debug_messages = array(); // if debug is turned on, debug messages are stored in this array.  The structure of this array will change as new versions are released.
  var $version  = '1.0.2';
  var $last_revised  = '2012.02.22.1222';

  // privates
  var $_validated_hosts = array(); // array of previously validated hosts.  Useful when verifying lots of email addresses in single page load
  var $_participating_smtp_validation_hosts  = array('gmail.com','yahoo.com'); // not participating: live.com, hotmail.com, aol.com
  var $_smtp_validation_host_responses = array(); // array of major email service providers which accept the checking of boxes from your server ip
  var $_host; // everytime verify() is called, this is filled with host of current email address
  var $_SMTP_Validator  = null;
  var $_DNSBL_check  = null;

  /**
   * contructor
   */
  function Guaranteemail() {
      // include DNSBL-Check class.
      require_once (ucwords(__class__).'/DNSBL_check.php');
      $this->_DNSBL_check = new DNSBL_check;
      
      // include remote ip function
      require_once(ucwords(__class__).'/LB_GetRemoteIP.php');
  }


  /**
   * This is the only method that you will be calling, after setting some public variables.
   * @return bool
   */
  function verify() {
      $result = true;

      if ($this->email) {
        // clear errors/debug-messages, in case this object is verifying multiple email addresses in a single page load
        $this->errors = array();
        $this->debug_messages = array();

        $this->__ez_debug("timemark");
  
        // include SMTP Email Validation Class (download at:http://code.google.com/p/php-smtp-email-validation/)
        require_once (ucwords(__class__).'/smtp_validateEmail.class.php');
        $this->_SMTP_Validator = new SMTP_validateEmail();
        $this->_SMTP_Validator->debug = true;

        $this->_host  = $this->_get_host_from_address($this->email);

        //-- check 1 --//
        $this->_is_valid_syntax($this->email);

        //-- check 2 --//
        if (!$this->errors and !$this->skip_hostcheck) {
          $this->_is_valid_host($this->email);
        }

        //-- check 3 --//
        if (!$this->errors and !$this->skip_dnsbl) {
          $this->_DNSBL_check->ip = $this->_get_ip_address_from_host($this->_host);
          $this->_DNSBL_check->validate_ip();
          $this->errors = array_merge($this->errors, $this->_DNSBL_check->errors);
          $this->debug_messages = array_merge($this->debug_messages, $this->_DNSBL_check->debug_messages);
        }

        //-- check 4 --//
        if (!$this->errors and !$this->skip_dnsbl) {
          $this->_DNSBL_check->ip = LB_GetRemoteIP();
          $this->_DNSBL_check->validate_ip();
          $this->errors = array_merge($this->errors, $this->_DNSBL_check->errors);
          $this->debug_messages = array_merge($this->debug_messages, $this->_DNSBL_check->debug_messages);
        }

        //-- check 5 --//
        if (!$this->errors and !$this->skip_boxcheck) {

            if (in_array($this->_host, $this->_participating_smtp_validation_hosts)){

                // before checking the participating host, let's make sure a known valid box (the author's) returns as valid.
                if (!isset($this->_smtp_validation_host_responses[$this->_host])) {
                    $this->_smtp_validation_host_responses[$this->_host]  = $this->_is_valid_box('gavinengel@'.$this->_host, true);

                    if ($this->_smtp_validation_host_responses[$this->_host]) {
                        $this->__ez_debug("SUCCESS: email provider {$this->_host} returned valid for known valid box.");
                    } else {
                        $this->__ez_debug("WARNING: email provider {$this->_host} is not returning valid for known valid box.  Your ip address may be on their spam list.  Please review all debug.");
                    }
                }

                // if the email provider
                if ($this->_smtp_validation_host_responses[$this->_host]) {
                    $this->_is_valid_box($this->email);
                }
                else {
                  $this->__ez_debug("WARNING: email provider {$this->_host} is not returning valid for known valid box.  Your ip address may be on their spam list.  Please review all debug.");
                }

            }
        }

        //-- merge errors and debug from the DNSBL_check object --//
        ksort($this->debug_messages);

        //-- final review --//
        if ($this->errors) {$result  = false;}
        $this->__ez_debug("timemark");
      }
      else {
        $result  = false;
        $this->__ez_debug("Missing email address.");
      }


      return $result;
  }

  /**
   * Setting the HTTP:BL access key.  If this is not set, then HTTP:BL check is skipped.
   * @return null
   */
  function set_http_bl_access_key($http_bl_access_key='') {
    if ($http_bl_access_key) {
      $this->_DNSBL_check->http_bl_access_key = $http_bl_access_key;
    }
  }

  /**
   * Setting visitor IP manually.  This would be used for testing.
   * @return null
   */
  function set_ip($ip='') {
    $this->_DNSBL_check->ip = $ip;
  }

  /**
   * @return null
   */
  function use_strong_verification($bool=false) {
    $this->_DNSBL_check->use_strong_verification = $bool;
  }

  /**
   * for certain email providers, we can check the exact mailbox
   * @return bool
   */
  function _is_valid_box($email='', $suppress_errors=false) {
      $result = false;

      $this->__ez_debug("timemark");
      // do the validation
      ob_start();
      $results = $this->_SMTP_Validator->validate(array($email));
      $ob = ob_get_contents();
      ob_end_clean();
      $this->__ez_debug("timemark");
      $this->__ez_debug(str_replace(array('<pre>','</pre>'),'',str_replace("\n", ' | ', trim($ob))));
      $this->__ez_debug($results);

      if ($results[$email]) {
        $result = true;
      }
      else {
          if (!$suppress_errors) {
              $this->errors[(string) microtime(true)] = array('failed-box-check' => "The mailbox `$email` at host `{$this->_host}` is invalid.");
          }
      }

      $debug_message = "Check ".__function__.":";
      $debug_message .= ($result)? 'pass':'fail';
      $this->__ez_debug($debug_message);
      $this->__ez_debug("timemark");


      return $result;
  }



  /**
   * Do a check of email syntax.  Using Drupal 6 regex.
   * @return bool
   */
  function _is_valid_syntax($address='')
  {
      $result = false;

      if ($address)
      {
          if (strlen($address)<100)
          {
              $temp_address = str_replace('+','',$address);
              $result = eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $temp_address);
          }
      }

      if (!$result) $this->errors[(string) microtime(true)] = array('not-valid-syntax' => "The email address `$address` is not a valid email address.");


      $debug_message = "Check ".__function__.":";
      $debug_message .= ($result)? 'pass':'fail';
      $this->__ez_debug($debug_message);


      return $result;
  }

  /**
   * Return only the host string from an email address
   * @return string
   */
  function _get_host_from_address($address='', $strip_subdomains=false)
  {
      $host = '';

      if ($address)
      {
          @list($junk, $host)  = split('@', $address);
          if ($strip_subdomains) {
            $pieces = explode('.',$host);
            $host = $pieces[count($pieces)-2].'.'.$pieces[count($pieces)-1];
          }
          $host = strtolower(trim($host));
      }

      return $host;
  }

  /**
   * Return ip-address from dns host
   * @return string
   */
  function _get_ip_address_from_host($host='')
  {
      $ip_address = '';

      if ($host)
      {
        $this->__ez_debug("network-connection: gethostbyname & gethostbyaddr");
        $result = gethostbyname($host);
        if(ip2long($result) == -1 || ($result == @gethostbyaddr($result) && preg_match("/.*\.[a-zA-Z]{2,3}$/",$host) == 0) ) {
          // echo 'Error, incorrect host or ip';
          $this->__ez_debug("Cannot find IP address for: $host");

        }
        else {
          $ip_address = $result;
          $this->__ez_debug("Found IP address ($ip_address) for: $host");
        }
      }

      return $ip_address;
  }


  /**
   * Note:  checkdnsrr('nonexistantdomain432234.com','A') gives true
   * use dns lookups to determine if host is valid
   * TODO: add DNSWL
   * @return bool
   */
  function _is_valid_host($address='')
  {
      $result = false;


      if ($this->_host)
      {
          $known_hosts  = array('gmail.com','live.com','hotmail.com','yahoo.com','aol.com','me.com','inbox.com',);
          $invalid_hosts  = array('example.com','example.net','example.org','example.edu',);

          if (in_array($this->_host, $known_hosts)) {
              $this->__ez_debug("not checking host {$this->_host} since its in known hosts.");
              $result = true;
          }
          elseif (in_array($this->_host, $this->_validated_hosts)) {
              $this->__ez_debug("not checking host {$this->_host} since it was previously validated.");
              $result = true;
          }
          elseif (in_array($this->_host, $invalid_hosts)) {
              $this->__ez_debug("not checking host {$this->_host} since its in invalid hosts.");
              $this->errors[(string) microtime(true)] = array('not-valid-host' => "The email address `{$this->_host}` does not use a valid DNS host.");
          }
          else {

              if (function_exists('checkdnsrr')) {
                  $this->__ez_debug("checkdnsrr() of {$this->_host}");

                  $this->__ez_debug("network-connection: checkdnsrr (twice)");
                  if (checkdnsrr($this->_host,'ANY') || checkdnsrr($this->_host,'MX')) { // TODO: $checkdnsrr_mx is probably redundant.
                      $this->_validated_hosts[] = $this->_host;
                      $result = true;
                  }
              }
              else {
                  $this->__ez_debug("Missing function: checkdnsrr()");
              }


              if (!$result)  {
                  $debug_message = "Check ".__function__.":";
                  $debug_message .= ($result)? 'pass':'fail';
                  $this->__ez_debug($debug_message);
                  $this->__ez_debug("network-connection: dns_get_record (debug display)");
                  $this->__ez_debug("complete DNS for {$this->_host}:".var_export(@ dns_get_record($this->_host), true));

                  $this->errors[(string) microtime(true)] = array('not-valid-host' => "The email address `{$this->_host}` does not use a valid DNS host.");
              }
          }
      }


      return $result;
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


