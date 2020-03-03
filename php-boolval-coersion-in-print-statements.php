<?php

// Repl.it Address: 
//     https://repl.it/@sherylhohman/php-boolval-coersion-by-print-statements
// GitHub address:
//     https://github.com/SherylHohman/online-repl-code-snippets/blob/master/php-boolval-coersion-by-print-statements.php
// Title:
//     php-boolval-coersion-in-print-statements
// Description:

print(PHP_EOL . PHP_EOL . '==================================================' . PHP_EOL);
print('BOOLVAL()' . PHP_EOL);
print(PHP_EOL . '-----------------------------' . PHP_EOL);

// BOOLVAL()
// false values coerced into empty string???
(boolval(null) ==  '') ? print 'empty string' : print 'not an empty string';
print PHP_EOL;
(boolval(null) === '') ? print '...but not by coersion' : print '...was coerced';
// print PHP_EOL . 'false values are coerced into an empty string by PRINT/ECHO STATEMENTS.' . PHP_EOL;
print PHP_EOL . "\t so PRINT/ECHO coerces false into the string '', the empty string.";


print PHP_EOL . '---' . PHP_EOL;

// true values coerced into '1'???
// passing in: true, and 1, and '1' all yield the same results
(boolval('1') ==  '1') ? print '1 as string' : print 'not 1 as a string';
print PHP_EOL;
(boolval('1') ===  1) ? print 'number 1' : print 'not the number 1';
print PHP_EOL;
(boolval('1') === '1') ? print '...but not by coersion' : print '...was coerced into "1" as a string';
print PHP_EOL;
(boolval('1') ===  true) ? print "boolval yields 'true', \r\n\t but PRINT/ECHO coerces true into the string '1'" : print "boolval does NOT yield 'true'";
print PHP_EOL . '---' . PHP_EOL;

// proper way to print t/f as true/false strings (cannot use echo here):
print 'The proper way to echo t/f as true/false strings:' . PHP_EOL;
(boolval(true)===true) ? print "TRUE" : print "FALSE";
print PHP_EOL;
(boolval(false)===false) ? print "FALSE" : print "TRUE";
print PHP_EOL . '---' . PHP_EOL;

//
$tf = null; 
echo "null  \t" . boolval($tf) . "\t falsey -> (empty string)" . PHP_EOL;
$tf = 0; 
echo "0     \t" . boolval($tf) . "\t falsey -> (empty string)" . PHP_EOL;
$tf = false; 
echo "false \t" . boolval($tf) . "\t falsey -> (empty string)" . PHP_EOL;
$tf = true; 
echo "true  \t" . boolval($tf) . "\t truthy -> ( '1'  string)" . PHP_EOL;
$tf = 1; 
echo "1     \t" . boolval($tf) . "\t truthy -> ( '1'  string)" . PHP_EOL;

print PHP_EOL . '---' . PHP_EOL;
print PHP_EOL . '---' . PHP_EOL;
// ====================================================
