<?php
abstract class MijnAbstracteKlasse
{
    public static $mijnVariabele = 'Hallo wereld!';

    protected abstract function _mijnEersteMethode($mijnArgument);

    public abstract function mijnTweedeMethode($mijnArgument);
}

/**
 * De klasse moet ook abstract zijn, omdat niet alle overgeërfde methoden
 * (c.q. mijnTweedeMethode) geïmplementeerd zijn. Hierdoor mag/kan er geen
 * instantie van gemaakt worden.
 */
abstract class MijnAndereAbstracteKlasse extends MijnAbstracteKlasse
{
    /**
     * Deze methode moet compatibel zijn met de abstracte methode.
     *
     * @param mixed $mijnArgument
     * @return mixed
     */
    protected function _mijnEersteMethode($mijnArgument)
    {
        return $mijnArgument;
    }
}

class MijnKlasse extends MijnAndereAbstracteKlasse
{
    /**
     * Deze methode moet compatibel zijn met de abstracte methode.
     *
     * @param mixed $mijnArgument
     * @return mixed
     */
    public function mijnTweedeMethode($mijnArgument)
    {
        return $this->_mijnEersteMethode($mijnArgument);
    }
}

echo '<pre>';
$instantie = new MijnKlasse();
echo $instantie->mijnTweedeMethode(MijnKlasse::$mijnVariabele); // output: Hallo wereld!
