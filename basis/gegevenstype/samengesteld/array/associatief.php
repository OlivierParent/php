<?php
// Associatieve array
$a = array('één'  => 'un',
           'twee' => 'deux',
		   'drie' => 'trois');
var_dump($a['één'], $a['twee'], $a['drie']);
// output: string(2) "un" string(4) "deux" string(5) "trois"

$a = array('vier' => 'quatre',
           'Vier' => 'quatre');
print_r($a);
// output: Array ( [vier] => quatre [Vier] => quatre )
