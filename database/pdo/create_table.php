<?php

require_once 'drop_table.php';

// Maak een nieuwe tabel `personas` als die nog niet bestaat.
$sql_persons_create_table
     = 'CREATE TABLE IF NOT EXISTS `persons` ('
     .     '`person_id` INTEGER PRIMARY KEY ' . ($isSQLite ? 'AUTOINCREMENT' : 'AUTO_INCREMENT') . ', ' // SQL-dialect
     .     '`person_givenname` VARCHAR(255), '
     .     '`person_familyname` VARCHAR(255)'
     . ')'
;
var_dump("Create-statement (CRUD): {$sql_persons_create_table}");

$db->exec($sql_persons_create_table);
