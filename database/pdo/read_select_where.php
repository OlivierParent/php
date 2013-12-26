<?php

require_once 'read_select.php';

$sql_persons_select_where
    = 'SELECT '
    .     '`person_id` AS `id` '
    . 'FROM `persons` '
    . 'WHERE '
    .     '`person_givenname` = :givenname AND '
    .     '`person_familyname` LIKE :familyname '

;
var_dump("Read-statement (CRUD): {$sql_persons_select_where}");

// SQL-statement voorbereiden.
$stmt_persons_select_where = $db->prepare($sql_persons_select_where);

// Als het voorbereiden gelukt is:
if ($stmt_persons_select_where) {
    $stmt_persons_select_where->bindValue(':givenname', 'Honey');
    $stmt_persons_select_where->bindValue(':familyname', 'B%'); // Hier wordt het jokerteken (%) van het LIKE-statement aan de waarde toegevoegd.
    // Voer het prepared statement uit.
    $stmt_persons_select_where->execute();

    // Eén rij opvragen uit het resultaat. Gebruik 'while' in plaats van 'if' indien er meerdere zijn.
    if ($row_persons_select_where = $stmt_persons_select_where->fetch()) {
        var_dump($row_persons_select_where);
        $person_id = $row_persons_select_where['id'];
        var_dump("person_id: {$person_id}");
    }
}
