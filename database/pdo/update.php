<?php

require_once 'read_select_where.php';

$sql_persons_update
    = 'UPDATE `persons` '
    . 'SET '
    .     '`person_familyname` = ? '
    . 'WHERE '
    .     '`person_id` = ? '
;
var_dump("Update-statement (CRUD): {$sql_persons_update}");

$stmt_persons_update = $db->prepare($sql_persons_update);
if ($stmt_persons_update) {
    $stmt_persons_update->bindValue(1, 'Bunny');
    $stmt_persons_update->bindValue(2, $person_id);
    $stmt_persons_update->execute();
}

require 'read_select.php';