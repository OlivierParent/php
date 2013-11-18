<?php
class MijnKlasse
{
    /**
     * Member-variabele met een booleaanse waarde.
     *
     * @var boolean
     */
    private $_kloon;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->_kloon = false;
    }

    /**
     * Magische methode die uitgevoerd wordt bij het klonen.
     */
    public function __clone()
    {
        $this->_kloon = true;
    }

    /**
     * Toont of een object al dan niet een kloon is.
     *
     * @return boolean
     */
    public function isKloon()
    {
        return 'is ' . ($this->_kloon ? 'gekloond' : 'een orgineel') . PHP_EOL;
    }
}

class MijnAndereKlasse
{
    public function mijnMethode()
    {
        return 'Hallo wereld!' . PHP_EOL;
    }
}

echo '<pre>';
$a = new MijnKlasse(); // $a is een objectidentifier
$b =&      $a;         // $b is een referentie (alias) naar de objectidentifier $a (als de objectidentifier van $a wijzigt in dan wijzigt $b mee)
$c =       $a;         // $c is een kopie van objectidentifier $a (als de objectidentifier van $a wijzigt dan blijft $c ongewijzigd)
$d = clone $a;         // $d is de objectidentifier van het kloonobject
echo '$a ' . $a->isKloon();   // output: $a is een orgineel
echo '$b ' . $b->isKloon();   // output: $b is een orgineel
echo '$c ' . $c->isKloon();   // output: $c is een orgineel
echo '$d ' . $d->isKloon();   // output: $d is gekloond
$c = new MijnAndereKlasse();  // enkel $c gewijzigd, want $c is een kopie van $a
echo '$a ' . $a->isKloon();   // output: $a is een orgineel
$b = new MijnAndereKlasse();  // $a en $b gewijzigd, want $b refereert naar $a
echo $a->mijnMethode();       // output: Hallo wereld!
