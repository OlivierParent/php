<?php

require_once 'connectie.php';
require_once 'drop_table.php';

echo '<pre>CREATE (TABLE)</pre>';

// Maak een nieuwe tabel `personas` als die nog niet bestaat.
$sql_create_table
     = 'CREATE TABLE IF NOT EXISTS `personas` ('
     .     '`user_id` INTEGER PRIMARY KEY ' . ($isSqlite ? 'AUTOINCREMENT' : 'AUTO_INCREMENT') . ', ' // SQL-dialect
     .     '`user_givenname` VARCHAR(255), '
     .     '`user_familyname` VARCHAR(255)'
     . ')'
;
$affectedRows = $db->exec($sql);
var_dump($affectedRows);
