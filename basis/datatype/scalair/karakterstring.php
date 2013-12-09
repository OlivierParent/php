<?php
$str     = 'Dit is een karakterconstante.';
echo $str;
// Output: Dit is een karakterconstante.

$str     = 'Dit is een \'karakterconstante\'.';
echo $str;
// Output: Dit is een 'karakterconstante'.

$vervang = 'variabeleninterpolatie';
$str     = "Dit is een karakterstring met {$vervang}.";
echo $str;
// Output: Dit is een karakterstring met variabeleninterpolatie.