<?php
// Functies binnen een functie
function parentFunctie()
{
    function childFunctie()
    {
        return 'Hallo wereld!';
    }
    return 'Hallo iedereen!';
}
#echo childFunctie();  // output: foutmelding (childFunctie bestaat niet)
echo parentFunctie();  // output: Hallo iedereen!
#echo parentFunctie(); // output: foutmelding (childFunctie bestaat reeds)
echo childFunctie();   // output: Hallo wereld!
echo childFunctie();   // output: Hallo wereld!
