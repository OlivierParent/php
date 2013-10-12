<?php
namespace Planeten\Aarde;

class MijnKlasse
{
    /**
     * @staticvar string
     */
    public static $mijnProperty = "Hallo aarde!\n";
}

namespace Planeten\Mars; // zonder deze nieuwe naamruimte wordt dezelfde klasse voor de 2de maal gedeclareerd!

class MijnKlasse
{
    /**
     * @staticvar string
     */
    public static $mijnProperty = "Hallo mars!\n";
}

echo '<pre>';
echo \Planeten\Aarde\MijnKlasse::$mijnProperty; // output: Hallo aarde!
echo MijnKlasse::$mijnProperty;                 // output: Hallo mars!
echo __NAMESPACE__, PHP_EOL;                    // output: Planeten\Mars
use Planeten\Aarde as Aarde,                    // maak een alias Aarde
    Planeten\Mars;                              // zelfde effect als: Planeten\Mars as Mars
echo __NAMESPACE__, PHP_EOL;                    // output: Planeten\Mars
echo Aarde\MijnKlasse::$mijnProperty;           // output: Hallo aarde!
echo Mars\MijnKlasse::$mijnProperty;            // output: Hallo mars!
