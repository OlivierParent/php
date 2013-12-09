<?php
// Variabele
$i = 1;
echo $i;
// Output: 1

// Variabele variabelen (kan niet gebruikt worden met superglobals)
$s  = 'Hello';
$$s = 'world';
echo "$s {$$s}!";
// Output: Hello world!

$s  = '123';
$$s = '456';
echo ${'123'}; // $123 is een ongeldige variabelenaam
// Output: 456

// Voorbeeld nuttige toepassing voor variabele variabelen
foreach ($array as $sleutel => $waarde) {
    $$sleutel = $waarde;
}

// Ongeldige variabelenaam toch gebruiken
${'456'} = '789';
echo ${'456'};
// Output: 789

// Variabele verwijderen
$i = null; // $i is wel nog gedefinieerd, maar heeft geen waarde
unset($s); // $s is niet langer gedefinieerd