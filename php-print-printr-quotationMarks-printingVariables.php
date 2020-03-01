<?php

// https://repl.it/@sherylhohman/php-print-printr-quotationMarks-printingVariables   
// print vs print_r, single vs double quotation marks in php  
//   how to print variables in php  

// There are many more functions, and techniques for examining variables.  
// This is what I initially needed to know.  
// Good for printing multiple STRING variables, or SINGLE Array/Object variable.  
// Also See Implode, Explode, var_dump, etc.  

print '------------------------------------------------' . PHP_EOL;

    $part1 = 'A string';
    $part2 = 'to be printed'; 
    $sentence2 = 'double quotes for a double processing - replace variables with their values.';

    print(PHP_EOL);    // prints a new line              

    // can accept a single string variable
    print($part1);
    print(PHP_EOL);                  
    //echo($part1);                  

    // error - cannot accept 2 variables  
    //print($part1, $part2);    // uncomment to see error generated       
    // PHP Parse error:  syntax error, unexpected ','


    // can concatenate strings 
    // - need to manually add a "space" between the strings
    print($part1 . ' ' . $part2 . ' with concatenation' . PHP_EOL);   


    // single quotes literally prints the characters in the provided string.    
    print('$part1' . ': A string single quotes is literal' . PHP_EOL);                
    
    // double quotes replaces the variables with their values.
    // remember this as 2 passes: 1 to replace the variables, 2nd to print the result (double quotes = 2 passes - variable substitution.)
    // Notice the space between $part1 and #part2 has been retained.
    print("$part1 in double quotes uses variable substitution" . PHP_EOL);           

print '------------------------------------------------' . PHP_EOL;
    // single and double quoted strings saved to variables.
    $eol1 = ' eol1\r\n (single quotes does NOT translate as a line feed)';           // single quotes: not eol or linefeed
    $eol2 = " eol2\r\n " . '(\r\n in double quotes DID translate to a line feed)';        // double quotes: eol, linefeed
    $eol3 = ' PHP_EOL' . PHP_EOL;  // PHP predefined constant: eol, linefeed - 
    $eol4 = ' br <br>';   // use this if printing to an HTML page to get a new line
    
   print('Strings saved to variables retain the single/double quote qualities they were defined with.' . PHP_EOL . 'For example, newline/carriage return characters behave as expected if they were wrapped in double quotes.' . PHP_EOL . 'But print the literal characters if the string was wrapped in single quotes at the time the variable assignment was made.' . PHP_EOL . $eol1 . PHP_EOL . $eol2 . PHP_EOL . $eol3 . PHP_EOL . $eol4 . PHP_EOL . '//end' . PHP_EOL);  



print '------------------------------------------------' . PHP_EOL;
    
    $phrase1 = "Print can only print strings.\r\n";
    $phrase2 = "Other data types will be coerced to anstring before printing. \r\n";
    $num = 5;
    $arr = array('number ', 6,);

    // print multiple variables by wrapping then in double quotes
    print("$phrase1 $phrase2"  . PHP_EOL);   
    print("\r\ninteger '5' converted: $num"  . PHP_EOL);   
    print("\r\narray of a string and a number converted: $arr"  . PHP_EOL);   
            
   


print '------------------------------------------------' . PHP_EOL;
    print 'Cannot use a print statement to print out variables.' . PHP_EOL . PHP_EOL;
    // another example using double quotes. 
    print("Not even a single variable can be printed without conversion:\r\n");       
    print (PHP_EOL);  
    print($arr);
    print (PHP_EOL);  
    print (PHP_EOL);  

print '------------------------------------------------' . PHP_EOL;


    // use print_r to print out variable values
    print_r("Use print_r() to print variable values \r\nVariables should NOT be wrapped in any quotes.\r\nOnly a single variable can be passed into print_r."  . PHP_EOL);   
    print("\r\n" .'Value of $num:'.PHP_EOL);   
    print_r($num);   
    print("\r\n" .'Value of $arr:' . PHP_EOL);   
    print_r($arr);
            
print '------------------------------------------------' . PHP_EOL;

print '------------------------------------------------' . PHP_EOL;


    // use print_r to print out variable values
    print_r("Use print_r() to print variable values \r\nVariables should NOT be wrapped in any quotes.\r\nOnly a single variable can be passed into print_r."  . PHP_EOL);
    $variables = [$num, $arr]  ;
    for print("\r\n" .'Value of $num:'.PHP_EOL);   
    print_r($num);   
    print("\r\n" .'Value of $arr:' . PHP_EOL);   
    print_r($arr);
            
print '------------------------------------------------' . PHP_EOL;


?>  
