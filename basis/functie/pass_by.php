<?php
$doelgroep = 'wereld';                  // $doelgroep is gedefinieerd in de globale scope

// pass-by-value
function boodschapWaarde($aan)          // $aan bevat de waarde van het meegegeven argument
{
    $aan = "Hallo {$aan}!";

    return $aan;
}
echo boodschapWaarde($doelgroep);       // output: Hallo wereld!
echo $doelgroep;                        // output: wereld

// pass-by-reference
function boodschapVerwijzing(&$aan)     // $aan verwijst naar de variable die meegegeven werd als argument
{
    $aan = "Hallo {$aan}!";             // hier wordt $doelgroep in de globale scope overschreven met de nieuwe waarde

    return $aan;
}
echo boodschapVerwijzing($doelgroep);   // output: Hallo wereld!
echo $doelgroep;                        // output: Hallo wereld!
