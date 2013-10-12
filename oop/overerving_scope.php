<?php
class ParentKlasse
{
    /**
     * @var string
     */
    public $mijnMember = 'iedereen';

    /**
     * @var string
     */
    protected $_mijnMember = 'familie';

    /**
     * @var string
     */
    private $_mijnMemberPrivate = 'van parent';


    public function hallo($wie = null)
    {
        if (!$wie) {
            $wie = $this->mijnMember;
        }
        $this->zegHallo($wie);
    }

    public function halloPrivate()
    {
        $test = static::_getMijnMemberPrivate();
        $this->zegHallo($test);
    }

    public function zegHallo($wie)
    {
        echo get_called_class() . ' → ' . get_class() .  " → Hallo {$wie}!" . PHP_EOL;
    }

    protected function _getMijnMemberPrivate()
    {
        return $this->_mijnMemberPrivate;
    }
}

class ChildKlasse extends ParentKlasse
{
    /**
     * @var string
     */
    public $mijnMember = 'wereld';

    /**
     * @var string
     */
    private $_mijnMemberPrivate = 'van child';

    public function hallo($wie = null)
    {
        if (!$wie) {
            $wie = $this->mijnMember;
        }
        parent::hallo($wie);
    }

    public function halloProtected()
    {
        self::hallo($this->_mijnMember);
    }

    protected function _getMijnMemberPrivate()
    {
        return $this->_mijnMemberPrivate;
    }
}

echo '<pre>';
$parent = new ParentKlasse();
$child  = new ChildKlasse();
$parent->hallo();                      // output: ParentKlasse → ParentKlasse → Hallo iedereen!
$parent->halloPrivate();               // output: ParentKlasse → ParentKlasse → Hallo van parent!
$parent->zegHallo($child->mijnMember); // output: ParentKlasse → ParentKlasse → Hallo wereld!
$child->hallo();                       // output: ChildKlasse → ParentKlasse → Hallo wereld!
$child->halloProtected();              // output: ChildKlasse → ParentKlasse → Hallo familie!
$child->halloPrivate();                // output: ChildKlasse → ParentKlasse → Hallo van child!
$child->zegHallo($parent->mijnMember); // output: ChildKlasse → ParentKlasse → Hallo iedereen!
