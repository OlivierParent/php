<?php
class MijnKlasse
{
    /**
     * @var string
     */
    private $_mijnMember = 'Hallo wereld!';

    /**
     * Magische methode die uitgevoerd wordt bij een typeconversie naar string.
     *
     * @return string
     */
    public function __toString()
    {
        print_r($this); // print readable.
        return ''; // moet altijd een string teruggeven
    }
}

echo '<pre>';
$instantie = new MijnKlasse;
echo $instantie;
// output: MijnKlasse Object ( [_mijnMember:MijnKlasse:private] => Hallo wereld! )
