<?php

// url: https://repl.it/@sherylhohman/php-emailer-test-form-data-and-resulting-email
// description: Shows what the email formatting looks like, and tests code for errors. Should create/populate a $_POST var instead.

// This is a starting point for createing an ajax-email.php file to send an email from a website's online contact page.
// Purpose  for this replit was to make minor changes to how the email is formatted before being sent.
// basically: tabbed the contact info, and newlined the message.

// Question is, can I replace the &lt; and &gt;, with < and > ?

/* SETTINGS */
$recipient = "me@example.com";
$subject   = "New Message from Contact Form";

//if($_POST){  // Comment out for testing

  /* DATA FROM HTML FORM */
  // $name    = trim(  strip_tags($_POST['name']));
  // $email   = trim(  strip_tags($_POST['email']));
  // $message = trim(htmlentities($_POST['message']));
  // //$phone   = $_POST['phone'];

  // Fake Form Data for Testing
  $name    = trim(  strip_tags('me'));
  $email   = trim(  strip_tags('me@example.com'));
  $message = trim(htmlentities('Hello, I really like your product. do you have pricing?'));
  $phone   = trim(  strip_tags('555-555-5555'));

 
  // Sanitize email input fields for security:
    // - strip_tags() and trim () for $name and $email input fields
    // - htmlentities() for $message field. Added trim() for good measure.
    // source: https://css-tricks.com/snippets/php/send-email/


  /* SUBJECT */
  $emailSubject = $subject . " by " . $name;

  /* HEADERS */
  $headers = "From: $name &lt;$email&gt;\r\n" .
             "Reply-To: $name &lt;$email&gt;\r\n" .
             "Subject: $emailSubject\r\n" .
             "Content-type: text/plain; charset=UTF-8\r\n" .
             "MIME-Version: 1.0\r\n" .
            //  "X-Mailer: PHP/" . phpversion() . "\r\n";
            // Do NOT include PHP/apache version, for security.
             "X-Mailer: \r\n";

echo PHP_EOL . "$headers" . PHP_EOL;

  /* PREVENT EMAIL INJECTION */
  // version 1
  // if ( preg_match("/[\r\n]/", $name) || preg_match("/[\r\n]/", $email) ) {
  //   header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
  //   die("500 Internal Server Error: possible email injection attempt");
  // }
  // version 2 (maybe same as above?)
    // SEEMS slightly more robust because (as I understand it)
    // it looks for Either OR (but does not require BOTH: \n and \r).
    // source: https://www.damonkohler.com/2008/12/email-injection.html

  // $from = $_POST["sender"];
  // if (eregi("(\r|\n)", $from)) {
  //   header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
  //   die("500 Internal Server Error: possible email injection attempt");
  // }


  /* MESSAGE TEMPLATE */
  $mailBody = "Name:    \t $name \n\r" .
              "Email:   \t $email \n\r" .
              "Subject: \t $subject \n\r" .
              //"Phone:   \t $phone \n\r" .
              // "Message: " . PHP_EOL . "$message" . PHP_EOL;
              PHP_EOL . "$message" . PHP_EOL;


  /* SEND EMAIL */
  // mail($recipient, $emailSubject, $mailBody, $headers);

  // Print EMAIL for TESTING instead of sending it
    echo("$mailBody");

// end-if} // comment out for testing
?>
