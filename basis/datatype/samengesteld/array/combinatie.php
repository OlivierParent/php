<?php
/**
 * Combinatie van zowel enumeratief als associatief voor (positieve) integers
 */
$a = [
     4  => 'vier',
    '6' => 'zes',
];
var_dump($a[4], $a['4'], $a[6], $a['6']);
/* Output:
 * string 'vier' (length=4)
 * string 'vier' (length=4)
 * string 'zes' (length=3)
 * string 'zes' (length=3)
 */

$a[] = 'zeven'; // de arrayindex was automatisch gelijkgezet met het hoogste vorige sleutel (6)
var_dump($a);
/* Output:
 * array (size=3)
 *   4 => string 'vier' (length=4)
 *   6 => string 'zes' (length=3)
 *   7 => string 'zeven' (length=5)
 */