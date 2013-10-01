<?php
// PHP 5.4 voorbeeld
$a = [4 => 'vier', '6' => 'zes'];
var_dump($a[4], $a['4'], $a[6], $a['6']); // output: string(4) "vier" string(4) "vier" string(3) "zes" string(3) "zes"
$a[] = 'zeven'; // de arrayindex was automatisch gelijkgezet met het hoogste vorige sleutel (6)
print_r($a); // output: Array ( [4] => vier [6] => zes [7] => zeven )
