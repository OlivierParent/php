<?php
$i1 = 1;
$d1 = 1.1;
$s1 = 'string1';   // Wordt na conversie: int 0
$s2 = '1string';   // Wordt na conversie: int 1
$s3 = '1.1string'; // Wordt na conversie: float 1.1
$b1 = true;        // Wordt na conversie: int 1
$a1 = [];
$a2 = [1];
$a3 = ['a','b'];

var_dump($i1 + $s1);
// Output: int 1

var_dump($i1 + $d1);
// Output: float 2.1

var_dump($i1 + $s2);
// Output: int 2

var_dump($i1 + $s3);
// Output: float 2.1

var_dump($s2 + $i1);
// Output: int 2

var_dump($s2 + $s3);
// Output: float 2.1

var_dump($i1 + $b1 + $d1);
// Output: float 3.1

var_dump($a1 + $a2 + $a3);
/* Output:
 * array (size=2)
 *   0 => int 1
 *   1 => string 'b' (length=1)
 */