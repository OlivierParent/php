<?php

require_once 'connectie.php';

echo '<pre>DROP (TABLE)</pre>';

// Om de tabel te verwijderen als die bestaat.
$sql_drop = 'DROP TABLE IF EXISTS `personas`';
$db->exec($sql_drop);
