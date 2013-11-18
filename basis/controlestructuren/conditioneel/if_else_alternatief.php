<?php
$i = 9;
if ($i <= 10): // schrijf structuur en expressies in een zo logisch mogelijke volgorde! 
    echo 'i is kleiner of gelijk aan 10';
elseif (10 < $i && $i < 100): // let op de leesbaarheid (volgorde!)
    echo 'i is tussen 10 en 100';
else:
    echo 'i is groter of gelijk aan 100';
endif;
// output: i is kleiner of gelijk aan 10
