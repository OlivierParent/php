<?php
/**
 * Een eerste eenvoudige trait
 */
trait MijnTraitEen
{
    /**
     * @return string
     */
    public function mijnMethodeEen()
    {
        return 'Hallo wereld!' . PHP_EOL;
    }

    /**
     * @return string
     */
    public function mijnMethodeTwee()
    {
        return 'Hallo universum!' . PHP_EOL;
    }
}

/**
 * Een tweede eenvoudige trait
 */
trait MijnTraitTwee
{
    /**
     * @return string
     */
    public function mijnMethodeDrie()
    {
        return 'Hallo mars!' . PHP_EOL;
    }
}

/**
 * Een eenvoudige klasse
 */
class MijnKlasse
{
    use MijnTraitEen,
        MijnTraitTwee;

    /**
     * @return string
     */
    /**
     * @return string
     */
    public function mijnMethodeVier()
    {
        return 'Hallo venus!' . PHP_EOL;
    }
}

echo '<pre>';
$mijnInstantie = new MijnKlasse();
echo $mijnInstantie->mijnMethodeEen();  // output: Hallo wereld!
echo $mijnInstantie->mijnMethodeTwee(); // output: Hallo universum!
echo $mijnInstantie->mijnMethodeDrie(); // output: Hallo mars!
echo $mijnInstantie->mijnMethodeVier(); // output: Hallo venus!
