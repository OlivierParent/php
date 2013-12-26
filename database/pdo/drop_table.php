<?php

require_once 'connectie_openen.php';

// Om de tabel te verwijderen als die bestaat.
$sql_persons_drop = 'DROP TABLE IF EXISTS `persons`';
var_dump("Delete-statement (CRUD): {$sql_persons_drop}");

// SQL-statement uitvoeren.
$db->exec($sql_persons_drop);
