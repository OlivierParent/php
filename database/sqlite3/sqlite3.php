<?php
// Maak of open een database met de bestandsnaam MijnDatabase.sqlite
$db = new SQLite3('MijnDatabase.sqlite');
$sql = 'CREATE TABLE mijntabel ('
     . 'mijntabel_id   INTEGER PRIMARY KEY, '
     . 'mijntabel_date DATE'
     . ')';
$db->exec($sql); // Query uitvoeren waarvan geen resultaat verwacht wordt
$db->close();    // Databaseconnectie sluiten
