<?php
$s = '1';
var_dump($s);
// Output: string '1' (length=1)

$i = (int) $s;
//$i = (integer) $s;
var_dump($i);
// Output: int 1 

$f = (float) $s;
//$f = (double) $s;
//$f = (real) $s;
var_dump($f);
// Output: float 1

$b = (boolean) $s;
//$b = (bool) $s;
var_dump($b);
// Output: boolean true

$a = (array)  $s;
var_dump($a); 
/* Output:
 * array (size=1)
 *   0 => string '1' (length=1)
 */

$o = (object) $s;
var_dump($o);
/* Output:
 * object(stdClass)[1]
 *   public 'scalar' => string '1' (length=1)
 */

$u = (unset) $s;
var_dump($u);
// Output: null