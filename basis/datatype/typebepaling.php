<?php
/**
 * Alternatief voor de functie gettype().
 * 
 * Zie ook: http://php.net/is_scalar
 */
function get_type($var)
{
    if (is_scalar($var)) {
        $a = [
           'bool', 
           'int',
           'float',
           'string',
       ];
    } else {
        $a = [
           'array',
           'object',
           'resource',
           'null',
        ];
    }
    foreach($a as $type) {
        // Variabele functie.
        $functions = "is_{$type}";
        if ($functions($var)) {
            return $type;
        }
    }
    
    return 'unknown';
}

$b = false;
echo get_type($b);
// Output: bool

$i = 1;
echo get_type($i);
// Output: int

$f = 1.1;
echo get_type($f);
// Output: float

$s = '';
echo get_type($s);
// Output: string

$a = [];
echo get_type($a);
// Output: array

$o = (object) null;
echo get_type($o);
// Output: object

$n = null;
echo get_type($n);
// Output: null