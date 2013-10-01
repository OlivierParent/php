<?php
$str     = 'Dit is een karakterconstante.';
echo $str; // output: Dit is een karakterconstante.

$str     = 'Dit is een \'karakterconstante\'.';
echo $str; // output: Dit is een 'karakterconstante'.

$vervang = 'variabelenvervanging';
$str     = "Dit is een karakterstring met {$vervang}.";
echo $str; // output: Dit is een karakterstring met variabelenvervanging.
