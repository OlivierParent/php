<?php
require_once 'MijnObject.php';

$o = new MijnObject;
$a = ['var4' => 4, 'var5' => 5, 'var6' => 6];

function alleVariabelen($var)
{
    foreach ($var as $waarde):
        echo "({$waarde})";
    endforeach;
    foreach ($var as $sleutel => $waarde):
        echo "({$sleutel}: {$waarde})";
    endforeach;
}

alleVariabelen($o); // output: (2)(3)(var2: 2)(var3: 3)
alleVariabelen($a); // output: (4)(5)(6)(var4: 4)(var5: 5)(var6: 6)
