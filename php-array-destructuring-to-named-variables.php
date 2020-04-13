/*
200407
https://repl.it/@sherylhohman/php-array-destructuring-to-named-variables-var-name-key  
file: php-array-destructuring-to-named-variables.php  

repl-it has the most up-to-date version:  
https://repl.it/@sherylhohman/php-array-destructuring-to-named-variables-var-name-key  

github url (may not be up to date)
https://github.com/SherylHohman/online-repl-code-snippets/blob/master/php-array-destructuring-to-named-variables.php
*/

<?php
echo PHP_EOL;

echo "Hello, world! " . PHP_EOL . PHP_EOL;

$variables = array('name' =>'Sheryl', 'email' => 'sh@y.com');
print_r ($variables);
echo PHP_EOL;

// converts array of key/value pairs 
// to individual variables with names matching their original keys.
if (count($variables) > 0) {
    foreach ($variables as $key => $value) {
        if (strlen($key) > 0) {
            ${$key} = $value;
            echo "$$key:\t $value", PHP_EOL;
        }
    }
}
echo PHP_EOL;

//--------------------
$variables2 = array('name2' =>'Sheryl2', 'email2' => 'sh2@y.com');
['name2' => $name2] = $variables2;

echo("\$name2:\t $name2");

echo PHP_EOL;

//--------------------
//  IGNORE BELOW HERE
echo PHP_EOL;

$variables3 = array('name3' =>'Sheryl3', 'email3' => 'sh3@y.com');
//['name3' => $name3] = $variables3;
if (count($variables3) > 0) {
    foreach ($variables3 as $key => $value) {
        if (strlen($key) > 0) {
            ${$key} = &$value;
            echo "$$key:\t $value", PHP_EOL;
        }
    }
}
echo PHP_EOL;


//echo("\$name3:\t $name3");

//--------------------
echo PHP_EOL;

