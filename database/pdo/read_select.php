<?php

require_once 'create_insert.php';

$sql_persons_select
    = 'SELECT * '
    . 'FROM `persons`'
;

var_dump("Read-statement (CRUD): {$sql_persons_select}");

// Resultaat (result set) van de query opvragen via het databaseconnectieobject.
$res_persons_select = $db->query($sql_persons_select);
if ($res_persons_select) {
    // Alle rijen in één keer opvragen.
    if ($rows_persons_select = $res_persons_select->fetchAll()) {
        var_dump('Personen in `persons`:', $rows_persons_select);
    }
}
