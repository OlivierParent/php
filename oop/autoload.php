<?php
/**
 * Globale functie die aangeroepen wordt als de klassedeclaratie nog niet
 * bestaat.
 *
 * @param string $klasse
 */
function __autoload($klasse)
{
    // require_once voor in geval de klassedeclaratie toch niet in het bestand zit
    require_once "{$klasse}.php";
}

echo '<pre>';
new DemoKlasse(); // output: DemoKlasse zegt: 'Hallo wereld!'
