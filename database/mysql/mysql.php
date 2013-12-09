<?php
// Instellingen van de MySQL-server (pas aan volgens eigen instellingen!)
$dbconfig = array('host'     => 'localhost', // 127.0.0.1
                  'user'     => 'root',      // Beter andere user dan root!
                  'password' => '',
                  'schema'   => 'mijndb',    // 'schema' betekent database
                  'port'     =>  3306);      // Standaardpoort voor MySQL (MAMP: 8889) 

$db = new mysqli($dbconfig['host'],
                 $dbconfig['user'],
                 $dbconfig['password'],
                 $dbconfig['schema'],
                 $dbconfig['port']);

if ($db->connect_error) {
    // Script stoppen als de connectie met de database mislukt
    die("Connection failed ({$db->connect_errno}): {$db->connect_error}");
}

$sql = 'DROP TABLE IF EXISTS users'; // MySQLi: maar 1 statement per query
$db->query($sql);

$sql = 'CREATE TABLE IF NOT EXISTS users ('
     . 'user_id         INTEGER AUTO_INCREMENT PRIMARY KEY, '
     . 'user_givenname  VARCHAR(255), '
     . 'user_familyname VARCHAR(255), '
     . 'user_password   CHAR(40) '
     . ')';
$db->query($sql);

// Gebonden parameters
$sql = 'INSERT INTO users '
     . '(user_givenname, user_familyname, user_password) '
     . 'VALUES (?, ?, ?)';

if ($stmt = $db->prepare($sql) ) {
    // Drie strings als parameter definieren
    $stmt->bind_param('sss', $voornaam, $naam, $wachtwoord);
    /* b: BLOB (Binary Large Object)
     * d: float en double
     * i: integer
     * s: string en andere gegevenstypen, 
     */
    $a = array('Vincent' => 'Vega',
               'Mia'     => 'Walace',
               'Jules'   => 'Winnfield',
               'Butch'   => 'Coolidge',
               'Honey'   => 'Bunny');
    foreach ($a as $voornaam => $naam) {
        $wachtwoord = sha1("{$voornaam} {$naam}");
        $stmt->execute();
        echo "id({$stmt->insert_id})"; // Id laatst ingevoegde rij
    }
    $stmt->close();
}

// Ophalen van result set als associatieve array
$sql = 'SELECT *'
     . 'FROM users';

if ($res = $db->query($sql)) {
    while ($row = $res->fetch_assoc()) {
        echo '<pre>';
        print_r($row);
    }
    $res->close();
}

// Gebonden resultaten
$sql = 'SELECT user_givenname, user_familyname '
     . 'FROM users '
     . 'ORDER BY user_familyname, user_givenname ';

if ($stmt = $db->prepare($sql)) {
    $stmt->execute();
    $stmt->bind_result($voornaam, $naam);
    while ($stmt->fetch()) {
        echo "<br>{$voornaam} {$naam}";
    }
    $stmt->close();
}

// Gebonden parameters en resultaten
$sql = 'SELECT user_givenname, user_familyname '
     . 'FROM users '
     . 'WHERE user_password = ? '
     . 'LIMIT 1 ';
if ($stmt = $db->prepare($sql)) {
    $stmt->bind_result($voornaam, $naam);
    $stmt->bind_param('s', $wachtwoord);
    $wachtwoord = sha1('Vincent Vega');
    $stmt->execute();
    while ($stmt->fetch()) {
        echo "<br>Correct password for user {$voornaam} {$naam}";
    }
    $stmt->close();
}
     
$db->close();
