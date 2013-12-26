<?php

require_once 'create_table.php';

// Array met gegevens die we aan de tabel `persons` gaan toevoegen.
$persons = [
    // Givenname (key) => Familyname (value)
    'Vincent'          => 'Vega',
    'Mia'              => 'Walace',
    'Jules'            => 'Winnfield',
    'Butch'            => 'Coolidge',
    'Honey'            => 'Bee',
];

// SQL-statement met parameters.
$sql_persons_insert
    = 'INSERT INTO `persons` ('
    .     '`person_givenname`, '
    .     '`person_familyname`'
    . ') VALUES ('
    .     ':givenname, '
    .     ':familyname'
    .')'
;
var_dump("Create-statement (CRUD): {$sql_persons_insert}");

// SQL-statement voorbereiden.
$stmt_persons_insert = $db->prepare($sql_persons_insert);

// Als het voorbereiden gelukt is:
if ($stmt_persons_insert) {
    foreach ($persons as $givenname => $familyname) {
        // Bind de waarde van PHP-variabele $givenname  aan de SQL-parameter :givenname
        $stmt_persons_insert->bindValue(':givenname' , $givenname);  
        
        // Bind de waarde van PHP-variabele $familyname aan de SQL-parameter :familyname
        $stmt_persons_insert->bindValue(':familyname', $familyname); 
        
        // Voer het prepared statement uit.
        $stmt_persons_insert->execute(); 

        // ID van de laatst ingevoerde rij opvragen.
        $person_id = $db->lastInsertId();
        var_dump("Persoon toegevoegd met `person_id`: {$person_id}");
    }
}
