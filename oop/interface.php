<?php
interface MijnInterface
{
    const MIJNCONSTANTE = 'Hallo wereld!';

    /**
     * Enkel publieke methoden zijn toegelaten!
     */
    public static function mijnMethode($mijnArgument);
}

abstract class MijnAndereKlasse
{
    /**
     * De methode moet compatibel zijn met de gelijknamige methode in de
     * interface en mag niet abstract zijn.
     *
     * @static
     * @param mixed $mijnArgument
     * @return mixed
     */
    public static function mijnMethode($mijnArgument)
    {
        return $mijnArgument;
    }
}

class MijnKlasse extends MijnAndereKlasse implements MijnInterface // moet in deze volgorde
{
    // mijnMethode al geïmplementeerd in MijnAndereKlasse
}

echo '<pre>';
echo MijnKlasse::mijnMethode(MijnKlasse::MIJNCONSTANTE); // output: Hallo wereld!
