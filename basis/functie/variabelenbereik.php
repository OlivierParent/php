<?php
$hallo = 'Hallo wereld!';                   // $hallo is gedefinieerd in het globaal variabelenbereik

function halloWereld1()
{
    return $hallo;                         // $hallo bestaat niet binnen de locale context van de functie
}
echo halloWereld1();                        // geen output

function halloWereld2()
{
    global $hallo;                         // $hallo bestaat nu wel binnen de locale context van de functie 

    return $hallo;
}
echo halloWereld2();                        // output: Hallo wereld!

function halloWereld3()
{
    global $hallo;                          // $hallo bestaat nu wel binnen de locale context van de functie 

    $hallo = 'Hallo iedereen!';
    return $hallo;
}
echo halloWereld3();                        // output: Hallo iedereen!
echo $hallo;                                // output: Hallo iedereen!

function halloWereld4()
{
    $hallo = 'Hallo wereld!';
    return $hallo;
}
echo halloWereld4();                        // output: Hallo Wereld!
echo $hallo;                                // output: Hallo iedereen!
