<?php
// Alternatief voor gettype()
function get_type($var)
{
    if (is_scalar($var)) {
        $a = array('bool', 
                   'int',
                   'float',
                   'string');
    } else {
        $a = array('array',
                   'object',
                   'resource',
                   'null');
    }
    foreach($a as $type) {
        // variabele functie
        $functions = "is_{$type}";
        if ($functions($var)) {
            return $type;
        }
    }
    return 'unknown';
}
$b = false;
echo get_type($b); // output: bool
$i = 1;
echo get_type($i); // output: int
$f = 1.1;
echo get_type($f); // output: float
$s = '';
echo get_type($s); // output: string
$a = array();
echo get_type($a); // output: array
$o = (object) null;
echo get_type($o); // output: object
$n = null;
echo get_type($n); // output: null
