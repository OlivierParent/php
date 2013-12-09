<?php
/**
 * Associatieve array
 */
$a = [
    'one'   => 'één',
    'two'   => 'twee',
    'three' => 'drie', // Deze laatste komma hoeft niet, maar maakt items toevoegen makkelijker.
];
var_dump($a);
/* Output:
 * array (size=3)
 *   'one' => string 'één' (length=5)
 *   'two' => string 'twee' (length=4)
 *   'three' => string 'drie' (length=4)
 */

var_dump($a['two']);
// Output: string 'twee' (length=4)