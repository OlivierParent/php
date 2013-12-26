<?php

$db = null; // Databaseconnectie sluiten door het connectieobject null te maken.

var_dump('Databaseverbinding met ' . ($isSQLite ? 'SQLite3' : 'MySQL') . ' gesloten.');
