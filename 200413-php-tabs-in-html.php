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
----
*/

<!DOCTYPE html>
<html>
<body>

<?php

// https://www.w3.org/TR/css-text-3/#white-space-property
// pre and < html-tag style='white-space:pre' >
  
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
