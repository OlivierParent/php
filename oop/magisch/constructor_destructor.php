<?php
class MijnKlasse
{
    /**
     * Constructor
     */
    public function __construct()
    {
        echo 'Hallo wereld!', PHP_EOL;
    }

    /**
     * Destructor
     */
    public function __destruct()
    {
        echo 'Vaarwel wereld!', PHP_EOL;
    }
}

echo '<pre>';
$instantie = new MijnKlasse(); // output: Hallo wereld!
unset($instantie);             // output: Vaarwel wereld!
