<?php
/**
 * Multidimensionele array: de 2-dimensionele array
 */
 $a = [
    'de' => [
        1 => 'Eins',
        2 => 'Zwei',
        3 => 'Drei',
    ],
    'en' => [
        1 => 'one',
        2 => 'two',
        3 => 'three',
    ],
    'fr' => [
        1 => 'un',
        2 => 'deux',
        3 => 'trois',
    ],
    'nl' => [
        1 => 'één',
        2 => 'twee',
        3 => 'drie',
    ],
 ];
var_dump($a['de'][1], $a['en'][2], $a['fr'][3], $a['nl']);
/* Output:
 * string 'Eins' (length=4)
 * string 'two' (length=3)
 * string 'trois' (length=5)
 * array (size=3)
 *   1 => string 'één' (length=5)
 *   2 => string 'twee' (length=4)
 *   3 => string 'drie' (length=4)
 */