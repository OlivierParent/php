<?php
$db_sqlite = array('dsn'      => 'sqlite::memory:',                    // Data Source Name
                   'user'     =>  null,
                   'password' =>  null,
                   'options'  =>  null);

$db_mysql  = array('dsn'      => 'mysql:dbname=mijndb;host=localhost;charset=utf8', // Data Source Name
                   'user'     => 'root',
                   'password' => '',
                   'options'  =>  null);

$sqlite = true;
$dbconfig = ($sqlite) ? $db_sqlite : $db_mysql;

// Foutmeldingen
error_reporting(0); // Standaardfoutmelding afzetten
try {               // Eigen foutmelding
    $db = new PDO($dbconfig['dsn'], // Data Source Name
                  $dbconfig['user'],
                  $dbconfig['password'],
                  $dbconfig['options']);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage() );
}

// Alle foutmeldingen weer aanzetten, inclusief die van PDO
error_reporting(E_ALL); // NOOIT VOOR PRODUCTIE GEBRUIKEN!
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Om tabel te verwijderen
$sql = 'DROP TABLE IF EXISTS users';
$db->query($sql);

// Maak een nieuwe tabel als die nog niet bestaat
$sql = 'CREATE TABLE IF NOT EXISTS users ('
     . 'user_id         INTEGER PRIMARY KEY ' . ($sqlite ? 'AUTOINCREMENT' : 'AUTO_INCREMENT') . ',' // SQL-dialect
     . 'user_givenname  VARCHAR(255), '
     . 'user_familyname VARCHAR(255), '
     . 'user_password   ' . ($sqlite ? 'CHARACTER' : 'CHAR') . '(40)' // SQL-dialect
     . ')';
$db->query($sql);

// Prepared statement
$sql = 'INSERT INTO users '
     . '(user_givenname, user_familyname, user_password) '
     . 'VALUES (?, ?, ?)';
if ($stmt = $db->prepare($sql) ) {
    $a = array('Vincent' => 'Vega',
               'Mia'     => 'Walace',
               'Jules'   => 'Winnfield',
               'Butch'   => 'Coolidge',
               'Honey'   => 'Bunny');
    foreach ($a as $voornaam => $naam) {
        $wachtwoord = sha1("{$voornaam} {$naam}"); // Secure Hash Algorithm 1
        $stmt->execute(array($voornaam, $naam, $wachtwoord) );
        echo "id({$db->lastInsertId()}) ";
    }
}

$sql = 'SELECT * '
     . 'FROM users';
if ($res = $db->query($sql) ) {
    echo '<pre>';
    while ($row = $res->fetch() ) {
        print_r($row);
    }
}

// Prepared statements met gebonden parameters en gebonden waarden
$sql = 'SELECT * '
     . 'FROM users '
     . 'WHERE user_password = :password AND '
     . 'user_givenname = ? AND '
     . 'user_familyname = :familyname '
     . 'LIMIT 1';
if ($stmt = $db->prepare($sql) ) {
    $stmt->bindParam(':password', $wachtwoord ); // bind parameter $wachtwoord
    $stmt->bindValue(2, 'Butch'); // bind anonieme waarde op positie 2
    $stmt->bindValue(':familyname', 'Coolidge'); // bind waarde :familyname

    $wachtwoord =  sha1('Butch Coolidge'); // Secure Hash Algorithm 1

    if ($stmt->execute() ) {
        echo '<pre>';
        while ($row = $stmt->fetch() ) {
            print_r($row);
        }
    }
}

$db = null; // Databaseconnectie sluiten
