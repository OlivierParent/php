<?php
$db = new SQLite3(':memory:'); // Maak een database in het werkgeheugen
$sql = 'CREATE TABLE users ('
     . 'user_id         INTEGER PRIMARY KEY , '
     . 'user_givenname  VARCHAR(255), '
     . 'user_familyname VARCHAR(255), '
     . 'user_password   CHARACTER(40)'
     . ')';
$db->exec($sql);

// Functie om het wachtwoord te encrypteren
function encryptPHP($wachtwoord)
{
    return sha1($wachtwoord); // Secure Hash Algorithm 1.
}

// SQL-functie encryptSQL aanmaken die de PHP-functie encryptPHP 
$db->createFunction('encryptSQL', 'encryptPHP');

$sql = 'INSERT INTO users '
     . '(user_givenname, user_familyname, user_password)'
     . 'VALUES (:givenname, :familyname, encryptSQL(:password))';

$a = array('Vincent' => 'Vega',
           'Mia'     => 'Walace',
           'Jules'   => 'Winnfield',
           'Butch'   => 'Coolidge',
           'Honey'   => 'Bunny');
           
$stmt = $db->prepare($sql);
$stmt->bindParam(':givenname' , $voornaam); // Waarde bij uitvoeren statement
$stmt->bindParam(':familyname', $naam);     // Waarde bij uitvoeren statement
foreach ($a as $voornaam => $naam) {
    // maak een wachtwoord op basis van de voornaam en naam
    $stmt->bindValue(':password', "{$voornaam} {$naam}"); // Waarde nu
    $stmt->execute();
    echo "id({$db->lastInsertRowID()}) "; // Id laatst ingevoegde rij
}
echo $stmt->paramCount(); // Aantal parameters in het statement (3)
$stmt->close();

$sql = 'SELECT *'
     . 'FROM users';
$res = $db->query($sql); // Result set opvangen
while ($row = $res->fetchArray()) { // Alle rijen uit result set overlopen
    echo '<pre>';
    var_dump($row);
}
$res->finalize(); // Result set vrijgeven

$db->close();     // Databaseconnectie sluiten
