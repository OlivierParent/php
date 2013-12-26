<?php

require_once 'update.php';

// Om de tabel te verwijderen als die bestaat.

$familyNames = [
    'Coolidge',
    'Vega',
    'Winnfield',
];
var_dump('Personen verwijderen met deze familienaam:', $familyNames);

$inClause = [];
for ($i = 1, $iMax = count($familyNames); $i <= $iMax; $i++) {
    $inClause[] = '?';
}
$inClause = implode(',', $inClause);

$sql_persons_delete
    = 'DELETE FROM `persons` '
    . 'WHERE '
    . "`person_familyname` IN ({$inClause})"
;
var_dump("Delete-statement (CRUD): {$sql_persons_delete}");


// SQL-statement voorbereiden.
$stmt_persons_delete = $db->prepare($sql_persons_delete);

// Als het voorbereiden gelukt is:
if ($stmt_persons_delete) {
    for ($position = 1, $positionMax = count($familyNames); $position <= $positionMax; $position++) {
        $stmt_persons_delete->bindValue($position, $familyNames[$position - 1]);
    }
    $stmt_persons_delete->execute();
}

require 'read_select.php';
