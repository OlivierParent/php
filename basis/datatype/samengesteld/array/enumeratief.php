<?php
/**
 * Enumeratieve arrays.
 */
$a = ['één', 'twee', 'drie'];
var_dump($a)
/* Output:
 * array (size=3)
 *     0 => string 'één' (length=5)
 *     1 => string 'twee' (length=4)
 *     2 => string 'drie' (length=4)
 */
echo "{$a[0]} {$a[1]} {$a[2]}";
// Output: één twee drie

$a = [];
$a[] = 'one';
$a[] = 'two';
$a[] = 'three';
var_dump($a);
/* Output:
 * array (size=3)
 *     0 => string 'één' (length=5)
 *     1 => string 'twee' (length=4)
 *     2 => string 'drie' (length=4)
 */

$a[0] = 'Eins';
$a[1] = 'Zwei';
$a[2] = 'Drei';
var_dump($a);
/* Output:
 * array (size=3)
 *     0 => string 'Eins' (length=4)
 *     1 => string 'Zwei' (length=4)
 *     2 => string 'Drei' (length=4)
 */