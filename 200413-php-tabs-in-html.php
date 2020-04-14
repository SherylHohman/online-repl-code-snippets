<!DOCTYPE html>
<html>
<body>

 <?php
  // example of an html email message using tabs to align info fields 
  $user['name']    = 'me';
  $user['email']   = 'me@example.com';
  $user['phone']   = '(555) 555-5555';
  $user['message'] = "Hi!\t We like your product.\r\nUsing `style='white-space:pre'` allows tabs to work!\r\nIt also allows `\\t` and `\\r\\n` to work. Including newlines embedded in the message :-)"; //( (balance out parens for matching counts)
  $custom_subject = 'Hello, ' . $user['name'];
  $settings['message_intro'] = '';//'Test message.';

  $br = '<br />';
  $p  = '<p style="white-space:pre">';
  $pp  = '</p>';
  $message =  '<html><head><title>Email from Contact Form</title></head><body>' .
              $p .
              // info fields
              "Name:    \t {$user['name']}"    . $br .
              "Email:   \t {$user['email']}"   . $br .
              "Subject: \t $custom_subject"    . $br .
              "Phone:   \t {$user['phone']}"   . $br .
              $pp .
              // (Testing message intro)
              $p .
              "{$settings['message_intro']}"   . $br .
              $pp . $p .
              // message
              "Message:\r\n{$user['message']}"             . $br .
              $pp .
              '</body></html>';
echo $message;
echo '----';
echo $br;
echo $br;
echo $br;
?>

  
<?php

// https://www.w3.org/TR/css-text-3/#white-space-property
// pre and < html-tag style='white-space:pre' >
 
echo "<p> Wrapping <pre>\ttabs in pre\t</pre> interrupts the flow of text. </p>";
echo "<p style='white-space:pre'> Setting tag style to \t `style='white-space:pre'`\t does not. </p>";
  
// ----
// comment/uncomment *1* $tab definition to see how it works
  
// not a true tab.a set number of spaces. similar to an indent. 
//$tab = '&nbsp;&nbsp;&nbsp;&nbsp;';  // 4 spaces
//$tab = '&ensp;&ensp;&ensp;&ensp;';  // wider
//$tab = '&emsp;&emsp;&emsp;&emsp;';  // widest

// true tabbing when combined with 
// - pre or 
// - style="white-space:pre" on a tag
$tab = "\t";      // double quotes required for string substitution
//$tab = '&#9;';  // tab, single quotes are fine
//$tab = "     "; // regular spaces also work in the pre tags

$txt = "Hello world!";
$x = 5;
$y = 10;

echo $txt . $tab .'khkhkjhkjhkjhkjhkjhkjhkjhkjhkhkjhkjkjh';
echo "<br>";

// pre makes text smaller, but ACTUAL tabs do work
echo '<pre>' . $x . $tab . $y . '</pre>';
//echo "<br>";
echo '<pre>' . $y . $tab . $x . '</pre>';
echo '<pre>' . $y . $tab . $y . '</pre>';
//echo '<pre>' . 1000 . $tab . $x . '</pre>';

// here, only whitespace affected by "pre" - tabs work!
echo '<p style="white-space:pre">' . $y . $tab . $y . '</p>';
echo '<p style="white-space:pre">' . $x . $tab . $x . '</p>';
echo '<p style="white-space:pre">' . $y . '      ' . $y . '</p>';
echo '<p style="white-space:pre">' . $x . '      ' . $x . '</p>';
echo "<p style='white-space:pre'>$y\t$y</p>";
echo '<h2 style="white-space:pre">' . $x . '      ' . $x . '</h2>';
echo "<h2 style='white-space:pre'>$y\t$y</h2>";

?>

</body>
</html>

/*
----
###  200413 tabs in html  
file: 200413-php-tabs-in-html.php  

#### github url: (may not be up to date)  
https://github.com/SherylHohman/online-repl-code-snippets/200413-php-tabs-in-html.php  
https://github.com/SherylHohman/online-repl-code-snippets/blob/master/200413-php-tabs-in-html.php

#### repl-it has the most up-to-date version:  
https://repl.it/@sherylhohman/tabs-in-html  

#### description  
experiment how to add tabs to html files  
(hint: whitespace:pre or pre)  
also how to add multiple spaces (indentation, which do not collapse)  
  //  Using `style='white-space:pre'` allows tabs to work!\r\nIt also allows `\\t` and `\\r\\n` to work
  //  https://stackoverflow.com/a/45266304/5411817
  //  https://stackoverflow.com/a/20423268/5411817
  //  https://stackoverflow.com/questions/20414504/how-do-i-replicate-a-t-tab-space-in-html
  //  https://www.w3.org/TR/css-text-3/#white-space-property

----
*/
