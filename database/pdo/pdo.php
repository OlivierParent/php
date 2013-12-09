<?php
$db_sqlite = [
	// Data Source Name.
	'dsn'      => 'sqlite::memory:',
	'user'     =>  null,
	'password' =>  null,
	'options'  =>  null,
];

$db_mysql  = [
	// Data Source Name.
	'dsn'      => 'mysql:dbname=mijndb;host=localhost;charset=utf8',
	'user'     => 'root',
	'password' => '',
	'options'  =>  null,
];


$sqlite = true;
$dbconfig = ($sqlite) ? $db_sqlite : $db_mysql;

// Foutmeldingen
error_reporting(0); // Standaardfoutmelding afzetten.
try {               // Eigen foutmelding.
    $db = new PDO(
    	$dbconfig['dsn'], // Data Source Name
        $dbconfig['user'],
        $dbconfig['password'],
        $dbconfig['options']
    );
} catch (PDOException $e) {
    die('Database Connection failed: ' . $e->getMessage() );
}

// Alle foutmeldingen weer aanzetten, inclusief die van PDO
error_reporting(E_ALL); // NOOIT VOOR PRODUCTIE GEBRUIKEN!
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// Om de tabel te verwijderen als die bestaat.
$sql = 'DROP TABLE IF EXISTS users';
$db->query($sql);

// Maak een nieuwe tabel als die nog niet bestaat.
$sql = 'CREATE TABLE IF NOT EXISTS users ('
     .     'user_id INTEGER PRIMARY KEY ' . ($sqlite ? 'AUTOINCREMENT' : 'AUTO_INCREMENT') . ', ' // SQL-dialect
     .     'user_givenname  VARCHAR(255), '
     .     'user_familyname VARCHAR(255), '
     .     'user_password   ' . ($sqlite ? 'CHARACTER' : 'CHAR') . '(40)' // SQL-dialect
     . ')';
$db->query($sql);

// Prepared statement met anonieme SQL-parameters.
$sql = 'INSERT INTO users ('
	 . 	   'user_givenname, '
	 .     'user_familyname, '
	 .     'user_password'
	 . ') VALUES (?, ?, ?)';

$stmt = $db->prepare($sql);
if ($stmt) {
	$a = [
		'Vincent' => 'Vega',
		'Mia'     => 'Walace',
		'Jules'   => 'Winnfield',
		'Butch'   => 'Coolidge',
		'Honey'   => 'Bunny'
	];
    foreach ($a as $voornaam => $naam) {
        $wachtwoord = sha1("{$voornaam} {$naam}"); // Secure Hash Algorithm 1 (NIET VEILIG GENOEG, gebruik Blowfish of SHA-512 met random salt!)
        $waarden = [
        	$voornaam,
        	$naam,
        	$wachtwoord,
        ];
        $stmt->execute($waarden);

        // id van de primary key opvragen van de laatst ingevoerde rij.
        $id = $db->lastInsertId();
        var_dump("id({$id})");
    }
}

$sql = 'SELECT * '
     . 'FROM users';

// Resultaat (result set) van de query opvragen.
$res = $db->query($sql)
if ($res) {
	// Rijen één voor één opvragen uit het resultaat.
    while ($row = $res->fetch()) {
        var_dump($row);
    }
}

// Prepared statement dat gebruik maakt van gebonden parameters en gebonden waarden.
$sql = 'SELECT * '
     . 'FROM users '
     . 'WHERE '
     .     'user_password = :password AND '
     . 	   'user_givenname = ? AND '
     .     'user_familyname = :familyname '
     . 'LIMIT 1';

$stmt = $db->prepare($sql);
if ($stmt) {
    $stmt->bindParam(':password', $wachtwoord ); // Bind SQL-parameter :password aan de PHP-parameter $wachtwoord.
    $stmt->bindValue(2, 'Butch');                // Bind anonieme waarde op positie 2.
    $stmt->bindValue(':familyname', 'Coolidge'); // Bind SQL-parameter :familyname aan een waarde.

    $wachtwoord =  sha1('Butch Coolidge'); // Secure Hash Algorithm 1 (NIET VEILIG GENOEG, gebruik Blowfish of SHA-512 met random salt!)

    if ($stmt->execute()) {
        while ($row = $stmt->fetch()) {
            var_dump($row);
        }
    }
}

$db = null; // Databaseconnectie sluiten.
