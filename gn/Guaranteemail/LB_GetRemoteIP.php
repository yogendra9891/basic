<?php

// Original located here: http://www.laughing-buddha.net/php/remoteip
if (!function_exists('LB_GetRemoteIP'))
{
    function LB_GetRemoteIP()
    {    
        // check to see whether the user is behind a proxy - if so,
        // we need to use the HTTP_X_FORWARDED_FOR address (assuming it's available)

        if (strlen(@$_SERVER["HTTP_X_FORWARDED_FOR"]) > 0) { 

          // this address has been provided, so we should probably use it

          $f = $_SERVER["HTTP_X_FORWARDED_FOR"];

          // however, before we're sure, we should check whether it is within a range 
          // reserved for internal use (see http://tools.ietf.org/html/rfc1918)- if so 
          // it's useless to us and we might as well use the address from REMOTE_ADDR

          $reserved = false;

          // check reserved range 10.0.0.0 - 10.255.255.255
          if (substr($f, 0, 3) == "10.") {
            $reserved = true;
          }

          // check reserved range 172.16.0.0 - 172.31.255.255
          if (substr($f, 0, 4) == "172." && substr($f, 4, 2) > 15 && substr($f, 4, 2) < 32) {
            $reserved = true;
          }

          // check reserved range 192.168.0.0 - 192.168.255.255
          if (substr($f, 0, 8) == "192.168.") {
            $reserved = true;
          }

          // now we know whether this address is any use or not
          if (!$reserved) {
            $ip = $f;
          }

        } 

        // if we didn't successfully get an IP address from the above, we'll have to use
        // the one supplied in REMOTE_ADDR

        if (!isset($ip)) {
          $ip = $_SERVER["REMOTE_ADDR"];
        }

        if ($ip == '::1')
        {
          $ip = '127.0.0.1';
        }

        // done!
        return $ip;
    }
}
