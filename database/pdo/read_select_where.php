<?php

require_once 'read_select.php';

$sql_persons_select_where
    = 'SELECT '
    .     '`person_id` AS `id` '
    . 'FROM `persons` '
    . 'WHERE '
    .     '`person_givenname` = :givenname AND '
    .     '`person_familyname` LIKE :familyname '
    . 'LIMIT 1'
;

var_dump("Read-statement (CRUD): {$sql_persons_select_where}");

// Resultaat (result set) van de query opvragen.
$stmt_persons_select_where = $db->prepare($sql_persons_select_where);
if ($stmt_persons_select_where) {
    $stmt_persons_select_where->bindValue(':givenname', 'Honey');
    $stmt_persons_select_where->bindValue(':familyname', 'B%');
    $stmt_persons_select_where->execute();

    // Rijen één voor één opvragen uit het resultaat.
    if ($row_persons_select_where = $stmt_persons_select_where->fetch()) {
        var_dump($row_persons_select_where);
        $person_id = $row_persons_select_where['id'];
        var_dump("person_id: {$person_id}");
    }
}
