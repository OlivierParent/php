<?php
// Enumeratieve arrays
$a = array('één', 'twee', 'drie');
echo $a; // output: Array
echo "{$a[0]} {$a[1]} {$a[2]}";
// output: één twee drie

$a = array();
$a[] = 'one';
$a[] = 'two';
$a[] = 'three';
print_r($a);
// output: Array ( [0] => one [1] => two [2] => three )

$a[0] = 'Eins';
$a[1] = 'Zwei';
$a[2] = 'Drei';
var_dump($a);
// output: array(3) { [0]=>  string(4) "Eins" [1]=>  string(4) "Zwei" [2]=>  string(4) "Drei" }
