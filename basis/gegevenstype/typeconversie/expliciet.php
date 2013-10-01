<?php
$s = '1';
$i = (int)    $s; // alternatief: (integer)
$f = (float)  $s; // alternatief: (double) of (real)
$b = (bool)   $s; // alternatief: (boolean)
$a = (array)  $s;
$o = (object) $s;
$u = (unset)  $s;

var_dump($s); // output: string(1) "1"
var_dump($i); // output: int(1)
var_dump($f); // output: int(1)
var_dump($b); // output: bool(true)
var_dump($a); // output: array(1) { [0]=>  string(1) "1" } 
var_dump($o); // output: object(stdClass)#1 (1) { ["scalar"]=>  string(1) "1" }
var_dump($u); // output: null
