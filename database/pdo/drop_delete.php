<?php

require_once 'update.php';

// Array met personen die uit de tabel `persons` verwijderd moeten worden.
$familyNames = [
    'Coolidge',
    'Vega',
    'Winnfield',
];
var_dump('Personen verwijderen met deze familienaam:', $familyNames);


// Per arrayitem moeten we een vraagteken toevoegen aan de IN-clause van het SQL-statement.
$inClause = [];
for ($i = 1, $iMax = count($familyNames); $i <= $iMax; $i++) {
    $inClause[] = '?';
}
// Plak alle vraagtekens in de array aan elkaar tot een string, telkens met een comma (,) ertussen.
$inClause = implode(',', $inClause); // Zie ook: http://php.net/implode

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
