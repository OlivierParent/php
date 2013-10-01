<?php
$naam = 'Jane';
switch ($naam):
    case 'Jane': // gelijk aan: if ($naam == 'Jane') { ... }
    case 'John':
        echo "{$naam} Doe";
        break;
    default:     // moet altijd als laatste aanwezig zijn 
        break;
endswitch;
// output: Jane Doe
