<?php

  // default email list.
  $emails = array(
    'example@somedomainwhichdoesntexist345.org',
    'example@gmail.com',
    'gavinengelexample@gmail.com',
    'gavinengelexample@yahoo.com',
    '123-sdfasfd032rkj@yahoo.com',
    '123-sdfasfd032rkj@gmail.com',
    'example@example.com',
  );

  // ... or use submitted emails.
  if ($_POST['emails']) {
    $emails = explode("\n",$_POST['emails']);
    foreach ($emails as $k=>&$email) 
    { $email = trim($email); if (!$email) unset($emails[$k]); }
  }


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Guaranteemail v1.0.2 - Test Page</title>

    <style>
      pre {
        white-space: pre-wrap;       /* css-3 */
        white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
        white-space: -pre-wrap;      /* Opera 4-6 */
        white-space: -o-pre-wrap;    /* Opera 7 */
        word-wrap: break-word;       /* Internet Explorer 5.5+ */
      }
    </style>
  </head>
  <body>
      <h1>Guaranteemail v1.0.2 - Test Page</h1>

      <h2>Enter List of email addresses to check</h2>
      <form method='post'>
        <textarea name='emails' style='width:600px;height:120px;'><?=implode("\n", $emails)?></textarea>
        <div>
          <input name='submit' type='submit' style='clear:both;' />
        </div>
      </form>
      <hr />

      <div style='width:600px;font-size:10px;font-weight:bold;line-height:10px;'>
      <?php if ($_POST) {

        // create the required object
        require 'Guaranteemail.php';
        $Guaranteemail = new Guaranteemail;

        //-- Optional flags --//
        #$Guaranteemail->skip_hostcheck = true;
        $Guaranteemail->skip_boxcheck = false; // default is `true`
        #$Guaranteemail->skip_dnsbl = true;
        #$Guaranteemail->use_strong_verification(true);

        foreach ($emails as $email) {
            $Guaranteemail->email = $email;

            echo "<h2 style='font-weight:bold;font-size:18px; '>Verifying: `$email`...</h2>";
            echo "<br />";
            echo "<div style='margin:20px;padding:10px;border:1px solid blue;background-color:#ccffff;width:750px;'>";
            echo "$email is ... ";
            if ($Guaranteemail->verify())
            {
              echo "<span style='text-decoration: blink;'>valid!</span>";
            }
            else
            {
              echo "<span style='text-decoration: blink;'>invalid!</span>";
              echo "<p>errors found:</p>";
              echo "<pre>";
              print_r($Guaranteemail->errors);
              echo "</pre>";
            }

            echo "<p>debug messages (don't display these on your production server):</p>";
            echo "<pre>";
            print_r($Guaranteemail->debug_messages);
            echo "</pre>";
            echo "</div>";

            flush();
        }
      }

      ?>
      </div>

  <hr />
  <h2>General Notes</h2>

  <h3>Changelog</h3>
  <ul>
    <li>1.0.2 (<i>Feb 22, 2012</i>)
      <ul>
        <li>Inclusion of new file <i>LB_GetRemoteIP.php</i>, inspired by <a href="http://www.laughing-buddha.net/php/remoteip">this page</a>.  This allows slightly more accurate IP adress detection of visitors.</li>
        <li>Include file <i>smtp_validateEmail.class.php</i> only included when required.</li>
      </ul>
    </li>
  </ul>
  <ul>
    <li>1.0.1 (<i>Mar 24, 2011</i>)
      <ul>
        <li>Fixed bug where DNSBL_check class not returning result of HTTPBL check</li>
        <li>`$Guaranteemail->skip_boxcheck` defaults to true.  This was done because I noticed Gmail and Yahoo take a long time to respond to box-checks.  This extended period of time can cause visitors to re-submit forms because they believe their request was lost.</li>
        <li>DNSBL_check class can now accept verified IPs where one element is a wildcard (1.2.3.*)</li>
        <li>Guaranteemail class uses require_once instead of require.</li>
        <li>Guaranteemail class added `@` before call to gethostbyaddr().</li>
      </ul>
    </li>
  </ul>
  <ul>
    <li>1.0.0 (<i>Jan 11, 2011</i>)
      <ul>
        <li>Initial release.</li>
      </ul>
    </li>
  </ul>

  <h3>Possible future additions:</h3>
  <ul>
    <li>using another DNSBL service in addition to Spamhaus and Project Honeypot</li>
    <li>incorporate DNS-Whitelist</li>
    <li>reduce network requests</li>
  </ul>

  <h3>Required Files:</h3>
  <ul>
    <li>./Guaranteemail.php</li>
    <li>./Guaranteemail/DNSBL_check.php</li>
    <li>./Guaranteemail/smtp_validateEmail.class.php</li>
    <li>./Guaranteemail/LB_GetRemoteIP.php</li>
    <li>./Guaranteemail/Net/DNS.php</li>
    <li>./Guaranteemail/Net/DNS/RR.php</li>
    <li>./Guaranteemail/Net/DNS/Header.php</li>
    <li>./Guaranteemail/Net/DNS/Packet.php</li>
    <li>./Guaranteemail/Net/DNS/Resolver.php</li>
    <li>./Guaranteemail/Net/DNS/RR/MX.php</li>
    <li>./Guaranteemail/Net/DNS/RR/TXT.php</li>
    <li>./Guaranteemail/Net/DNS/RR/AAAA.php</li>
    <li>./Guaranteemail/Net/DNS/RR/SRV.php</li>
    <li>./Guaranteemail/Net/DNS/RR/SOA.php</li>
    <li>./Guaranteemail/Net/DNS/RR/NAPTR.php</li>
    <li>./Guaranteemail/Net/DNS/RR/NS.php</li>
    <li>./Guaranteemail/Net/DNS/RR/TSIG.php</li>
    <li>./Guaranteemail/Net/DNS/RR/HINFO.php</li>
    <li>./Guaranteemail/Net/DNS/RR/CNAME.php</li>
    <li>./Guaranteemail/Net/DNS/RR/A.php</li>
    <li>./Guaranteemail/Net/DNS/RR/PTR.php</li>
    <li>./Guaranteemail/Net/DNS/Question.php</li>
  </ul>

  <h3>Test Files:</h3>
  <ul>
    <li>./index.php</li>
  </ul>

  <h3>Project Page:</h3>
  <ul>
    <li><a href="http://code.gavinengel.com/guaranteemail">http://code.gavinengel.com/guaranteemail</a></li>
  </ul>


  </body>
</html>

