<?php
$i1 = 1;
$d1 = 1.1;
$s1 = 'string1';           // int(0)
$s2 = '1string';           // int(1)
$s3 = '1.1string';         // float(1.1)
$b1 = true;                // int(1)
$a1 = array();
$a2 = array(1);
$a3 = array('a','b');

var_dump($i1 + $s1);       // output: int(1)
var_dump($i1 + $d1);       // output: float(2.1)
var_dump($i1 + $s2);       // output: int(2)
var_dump($i1 + $s3);       // output: float(2.1)
var_dump($s2 + $i1);       // output: int(2)
var_dump($s2 + $s3);       // output: float(2.1)
var_dump($i1 + $b1 + $d1); // output: float(3.1)
var_dump($a1 + $a2 + $a3); // output: array(2) { [0]=>  int(1) [1]=>  string(1) "b" } 
