<?php
/**
 * Eenvoudige klasse declareren.
 */
class MijnKlasse
{
    /**
     * Een member-variable declareren.
     *
     * @var string
     */
    private $_mijnMember = 'Hallo wereld!';

    /**
     * Een methode declareren
     *
     * @return string
     */
    public function mijnMethode()
    {
        return $this->_mijnMember;
    }
}

echo '<pre>';
$mijnInstantie = new MijnKlasse();
echo $mijnInstantie->mijnMethode(); // output: Hallo wereld!
