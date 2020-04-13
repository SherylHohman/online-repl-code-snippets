/*
php emailer - test form data and resulting email
file: php-emailer-test-form-data-and-resulting-email.php
(should have .php extension, but I dunno how to edit its name)

repl-it has the most up-to-date version:
https://repl.it/@sherylhohman/php-emailer-test-form-data-and-resulting-email
created 200322
github url (may not be up to date)
https://github.com/SherylHohman/online-repl-code-snippets/blob/master/php-emailer-test-form-data-and-resulting-email

Shows what the email formatting looks like, and tests code for errors.
Should create/populate a $_POST var instead.
*/

<?php
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
  $headers = 
            //  "From: $name &lt;$email&gt;"    . PHP_EOL .
             "From: $name <$email>"    . PHP_EOL .
             "Reply-To: $name <$email>" . PHP_EOL .
             "Subject: $emailSubject"   . PHP_EOL .
             "Content-type: text/plain; charset=UTF-8" . PHP_EOL .
             "MIME-Version: 1.0"        . PHP_EOL .
              // "X-Mailer: PHP/" . phpversion(). PHP_EOL;
            // Do NOT include PHP/apache version, for security.
             "X-Mailer: " . PHP_EOL;

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

  $eol = PHP_EOL; //(so can use inside quotes) 
  //"\n\r"; // for html use "<br \>" or "<br>"

  /* MESSAGE TEMPLATE */
  $mailBody = "Name:    \t $name"    . PHP_EOL .
              "Email:   \t $email"   . PHP_EOL .
              "Subject: \t $subject" . PHP_EOL .
              //"Phone:   \t $phone" . PHP_EOL" .
              PHP_EOL . "$message"   . PHP_EOL;


  /* SEND EMAIL */
  // mail($recipient, $emailSubject, $mailBody, $headers);

  // Print EMAIL for TESTING instead of sending it
    echo("$mailBody");

// end-if} // comment out for testing
?>
