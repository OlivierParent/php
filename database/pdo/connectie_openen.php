<?php

// Gebruik de SQLite configuratie.
$isSQLite = true;

if ($isSQLite) {
    // SQLite
    
    // Data Source Name samenstellen.
    $dsn = 'sqlite:'
         . ':memory:'; // Sla de database tijdelijk op in het RAM geheugen.
    
    $dbconfig = [
        'dsn'      => $dsn,
        'user'     => null,
        'password' => null,
        'options'  => null,
    ];

} else {
    // MySQL

    $dsn_properties = [
        'dbname'  => 'mijndb',    // Naam van het Database Schema.
        'host'    => 'localhost',
        'port'    => 3306,        // 3306 is de standaardpoort voor MySQL.
        'charset' => 'utf8',      // Zorgt ervoor dat de verbinding tussen PHP en MySQL in UTF-8 tekencodering gebeurt.
    ];

    // Data Source Name samestellen.
    $dsn = 'mysql:';
    foreach ($dsn_properties as $property => $value) {
        $dsn .= "{$property}={$value};";
    }

    $dbconfig  = [
        'dsn'      => $dsn,
        'user'     => 'root', // Naam van de databasegebruiker.
        'password' => '',     // Wachtwoord voor de databasegebruiker.
        'options'  =>  null,
    ];

}

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
    die('Databaseverbinding mislukt: ' . $e->getMessage() );
}

/**
 * Alle foutmeldingen weer aanzetten, inclusief die van PDO.
 * Gebruik deze opties NOOIT op een productieserver, want dit is een schat aan informatie voor hackers!
 */
error_reporting(E_ALL);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
