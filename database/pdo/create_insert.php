<?php

require_once 'connectie.php';
require_once 'create_table.php';

echo '<pre>CREATE (INSERT)</pre>';

// Array met gegevens die we aan de tabel `personas` gaan toevoegen.
$personas = [
    // Givenname (key) => Familyname (value)
    'Vincent'          => 'Vega',
    'Mia'              => 'Walace',
    'Jules'            => 'Winnfield',
    'Butch'            => 'Coolidge',
    'Honey'            => 'Bunny',
];

// SQL-statement met parameters.
$sql_personas_insert
    = 'INSERT INTO `personas` ('
    .     '`persona_givenname`, '
    .     '`persona_familyname`'
    . ') VALUES ('
    .     ':givenname, '
    .     ':familyname'
    .')'
;
var_dump($sql_personas_insert);

// SQL-statement voorbereiden.
$stmt_users_insert = $db->prepare($sql_users_insert);

// Als het voorbereiden gelukt is:
if ($stmt_users_insert) {
    foreach ($personas as $givenname => $familyname) {
        // Bind de waarde van PHP-variabele $givenname  aan de SQL-parameter :givenname
        $stmt_users_insert->bindValue(':givenname' , $givenname);  
        
        // Bind de waarde van PHP-variabele $familyname aan de SQL-parameter :familyname
        $stmt_users_insert->bindValue(':familyname', $familyname); 
        
        // Voer het prepared statement uit.
        $stmt_users_insert->execute(); 

        // ID van de laatst ingevoerde rij opvragen.
        $id = $db->lastInsertId();
        var_dump("id {$id}");
    }
}
