<?php
// Functie met functie als variabele (anonieme functie of closure);
function mijnFunctieMetVar()
{
    $functie = function() {
        return 'Hallo wereld van de variabele!';
    };
    return $functie();
}
echo mijnFunctieMetVar(); // output: Hallo wereld van de variabele!

// Callbackfunctie
$a = array('appel', 'banaan', 'citroen', 'druif');
$filter = array('appel', 'banaan', 'druif', 'framboos');
$result = array_filter(
    $a,
    // Anonieme functie (of closure) als callbackfunctie
    function($element) use ($filter) // gebruik $filter uit bovenliggende scope
    {
        return in_array($element, $filter); // geef element terug als het in de array $filter zit.
    }
);
print_r($result);
