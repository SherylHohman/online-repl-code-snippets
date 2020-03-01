<?php

// Repl.it Address: 
	// https://repl.it/@sherylhohman/php-parse-SERVER-HTTP-HOST-implode-explode-limit
// Title:
	// php_parse_HTTP_HOST-implode-explode_limit
// Description:
	//- Explode usage
	//- parse $_SERVER[HTTP_HOST]into:
	//top-level domain
	//secondary level domain 
	//combined subdomains (except www)
	//wwwdot_or_empty

<?php

// ====================================================
print(PHP_EOL . PHP_EOL . '==================================================' . PHP_EOL);

print('Concise $_SERVER["HTTP_HOST"] parsing (paste, ready to use)' . PHP_EOL);
print('---------------------------------------' . PHP_EOL . PHP_EOL);

$_SERVER['HTTP_HOST'] = 'www.subdomain2.subdomain1.example.com';
print '$_SERVER["HTTP_HOST"]: ' . PHP_EOL . "\t" . $_SERVER['HTTP_HOST'] . PHP_EOL;

// ------ copy below here -------------------------------

$host_array = explode('.',$_SERVER['HTTP_HOST']);

// assumes a single top leven domain (eg 'com')
// second level domain is main named portion of domain
// consider the www separately from any other subdomain parts, even though technically it is a subdomain
	// $subdomains stores all subdomain levels (except www) as a single, joined string, as though it were a single subdomain 

// remove and store top level domain.
    // assumes only 1 top level domain (eg 'com', '.gov.us' would store as 'us' only)
$tld = array_pop($host_array);
// remove and store second level domain: (eg 'example')
    // assumes only 1 top level domain (ie 'example.gov.us' would not yield the intended results)
$sld = array_pop($host_array);

// if www. (subdomain) is present store it separate 
   // WITH the DOT, else empty string
if ($host_array && $host_array[0]=='www') {
    $wwwdot_or_empty = 'www.';
    array_shift($host_array);
    // remove the www subdomain from the remaining array
} else {
    $wwwdot_or_empty = '';
}

// only subdomains (except www) remain in the array.
// join them together into a single string representing all them
$subdomains = implode('.', $host_array);

// ------ copy above here -------------------------------

// USAGE (eg re-join)
// because www. is stored with the dot..
if ($subdomains) {
    $rejoined = $wwwdot_or_empty . join('.', array($subdomains, $sld, $tld, ));
} else {
    $rejoined = $wwwdot_or_empty . join('.', array($sld, $tld, ));
}
print ("rejoined: " . PHP_EOL . "\t" . "$rejoined\r\n");
print('parts:' . PHP_EOL . "\t" . "$wwwdot_or_empty \t $subdomains \t $sld \t $tld \r\n");


// ====================================================
print(PHP_EOL . PHP_EOL . '==================================================' . PHP_EOL);

print('PARSE SERVER HTTP Test suite (choose a sampe url)' . PHP_EOL);
print(PHP_EOL . '-----------------------------' . PHP_EOL);

$str = 'www.subdomain2.subdomain1.example.com';
// $str =     'subdomain2.subdomain1.example.com';
// $str =            'www.subdomain1.example.com';
// $str =                'subdomain1.example.com';
// $str =                       'www.example.com';
// $str =                           'example.com';
print $str . PHP_EOL;

// no limit
$myArray = explode('.',$str);
print_r($myArray);

print(PHP_EOL . '-----------------------------' . PHP_EOL);

	// assumes a single top leven domain (eg 'com')
	// second level domain is main named portion of domain
	// consider the www separately from any other subdomain parts, even though technically it is a subdomain
	// subdomain will store 
// remove and store top level domain.
    // assumes only 1 top level domain (eg 'com', '.gov.us' would store as 'us' only)
$tld = array_pop($myArray);
echo "tld: \t\t\t $tld \r\n";
// remove and store second level domain: (eg 'example')
    // assumes only 1 top level domain (ie 'example.gov.us' would not yield the intended results)
$sld = array_pop($myArray);
echo "sld: \t\t\t $sld \r\n";

// if www subdomain is present store it separate 
   // WITH the DOT, else empty string
if ($myArray && $myArray[0]=='www') {
    $wwwdot_or_empty = 'www.';
    array_shift($myArray);
    // remove the www subdomain from the remaining array
} else {
    $wwwdot_or_empty = '';
}
echo "wwwdot_or_empty: $wwwdot_or_empty \r\n";

// the complexity of array_pop() is O(1).
    // the complexity of array_shift() is O(n).
    // array_shift() requires a re-index process on the array, so it has to run over all the elements and index them.
    // only a max of around 0-3-5 elements, so no big deal.
    // ref: https://www.php.net/manual/en/function.array-pop.php

// only subdomains (except www) remain in the array.
// join them together into a single string representing all them
$subdomains = implode('.', $myArray);
echo "subdomains: \t $subdomains \r\n";

print( PHP_EOL . '---------------------------------------' . PHP_EOL);
// rejoin pieces together, to confirm correctness
//echo($wwwdot,  $subdomain,  $sld,  $tld);
if ($subdomains) {
    $rejoined = $wwwdot_or_empty . join('.', array($subdomains, $sld, $tld));
} else {
    $rejoined = $wwwdot_or_empty . join('.', array($sld, $tld));
}
print ("str: \t\t$str\r" . PHP_EOL);
print ("rejoined: \t$rejoined\r" . PHP_EOL);
// Do they match ?
($str == $rejoined) 
    ? print 'TRUE'  . PHP_EOL 
    : print 'FALSE' . PHP_EOL;


print(PHP_EOL . PHP_EOL . '==================================================' . PHP_EOL);

print('EXPLODE' . PHP_EOL);
print($str . PHP_EOL);

//-----------
print(PHP_EOL . '-----No Limit - every split element into array item-----' . PHP_EOL);
// no limit supplied
print("\r\nexplode, no limit: \r\n");
print_r(explode('.',$str));

//-----------
print(PHP_EOL . "-----0 Limit: \r\n    entire string into element 0\r\n--" . PHP_EOL);
// zero limit
print("\r\nexplode, 0 limit: \r\n");
print_r(explode('.',$str,0));
print PHP_EOL . PHP_EOL;

//-----------
print(PHP_EOL . "--Positive Limit: \r\n    `limit elements`, \r\n    `limit-1` individual split/elements, \r\n    last element gets `length-limit+1` splits \r\n--" . PHP_EOL);
// positive limit
print("\r\nexplode, 2 limit: \r\n");
print_r(explode('.',$str,2));
print PHP_EOL . PHP_EOL;

// positive limit
print("\r\nexplode, 3 limit: \r\n");
print_r(explode('.',$str,3));
print PHP_EOL . PHP_EOL;

// positive limit
print("\r\nexplode, 8 limit: \r\n");
print_r(explode('.',$str,8));
print PHP_EOL . PHP_EOL;

//-----------
print(PHP_EOL . "--Negative Limit: \r\n    split as norm, throw away last `-limit` elements\r\n--" . PHP_EOL);
// negative limit 
print("\r\nexplode, -1 limit: \r\n");
print_r(explode('.',$str,-1));

// negative limit 
print("\r\nexplode, -2 limit: \r\n");
print_r(explode('.',$str,-2));

// negative limit 
print("\r\nexplode, -3 limit: \r\n");
print_r(explode('.',$str,-3));

// negative limit 
print("\r\nexplode, -5 limit: \r\n");
print_r(explode('.',$str,-5));

//----------------------------------------------------

// print(implode($wwwdot_or_empty, $subdomains, sld$, $tld));

// ====================================================

$tf = null; 
echo boolval($tf);
