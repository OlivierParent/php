<?php
$a = ['appel', 'banaan', 'citroen', 'druif'];
$filter = ['appel', 'banaan', 'druif', 'framboos'];
$result = array_filter(
    $a,
    // callback functie (hier, anonieme functie of closure)
    function($element) use ($filter) // gebruik $filter uit bovenliggende scope
    {
        return in_array($element, $filter); // geef element terug als het in de array $filter zit.
    }
);
print_r($result);
