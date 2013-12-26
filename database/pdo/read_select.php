<?php

require_once 'create_insert.php';

$sql_persons_select
    = 'SELECT * '
    . 'FROM `persons`'
;

var_dump("Read-statement (CRUD): {$sql_persons_select}");

// Resultaat (result set) van de query opvragen.
$res_persons_select = $db->query($sql_persons_select);
if ($res_persons_select) {
    // Rijen één voor één opvragen uit het resultaat.
    if ($rows_persons_select = $res_persons_select->fetchAll()) {
        var_dump('Personen in `persons`:', $rows_persons_select);
    }
}
