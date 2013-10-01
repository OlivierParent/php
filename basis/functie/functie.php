<?php
// Eenvoudige zelfgedefinieerde functie
function halloWereld()
{
    return 'Hallo wereld!';
}
echo halloWereld();                       // output: Hallo wereld!


// Functies met parameters
function hallo($naam) // 1 verplicht argument
{
    return "Hallo {$naam}!";
}
#echo hallo();                            // output: foutmelding
echo hallo('wereld');                     // output: Hallo wereld!

function halloOptioneel($naam = 'wereld') // 1 optioneel argument
{
    return "Hallo {$naam}!";
}
echo halloOptioneel();                    // output: Hallo wereld!
echo halloOptioneel('iedereen');          // output: Hallo iedereen!


// Functie zonder parameters maar met argumentenlijst
function mijnFunctie()
{
    return func_get_args();
}
print_r( mijnFunctie(1, 'twee', 3) );
// output: Array ( [0] => 1 [1] => twee [2] => 3 )
