<?php

require_once 'connectie.php';
require_once 'create_table.php';
require_once 'create_insert.php';

echo '<pre>READ</pre>';

$sql_personas_read
    = 'SELECT * '
    . 'FROM personas'
;

// Resultaat (result set) van de query opvragen.
$res_personas_read = $db->query($sql_personas_read)
if ($res_personas_read) {
    // Rijen één voor één opvragen uit het resultaat.
    while ($row_personas_read = $res->fetch()) {
        var_dump($row_personas_read);
    }
}
