<?php
class ParentKlasse
{
    /**
     * @staticvar string
     */
    public static $mijnMember = "Hallo heelal!\n";

    /**
     * @static
     * @return string
     */
    public static function getMijnMemberStatic()
    {
        return static::$mijnMember;
    }
}

class ChildKlasse extends ParentKlasse
{
    const MIJNMEMBER = "Hallo melkweg!\n";

    /**
     * @staticvar string
     */
    public static $mijnMember = "Hallo wereld!\n";

    /**
     * @static
     * @return string
     */
    public static function mijnMethode()
    {
        return self::_getMijnMember();
    }

    /**
     * @static
     * @return string
     */
    private static function _getMijnMember()
    {
        return parent::$mijnMember;
    }
}

echo '<pre>';
echo ParentKlasse::$mijnMember;           // output: Hallo heelal!
echo ChildKlasse::MIJNMEMBER;             // output: Hallo melkweg!
echo ChildKlasse::$mijnMember;            // output: Hallo wereld!
echo ChildKlasse::mijnMethode();          // output: Hallo heelal!
echo ParentKlasse::getMijnMemberStatic(); // output: Hallo heelal!
echo ChildKlasse::getMijnMemberStatic();  // output: Hallo wereld!
