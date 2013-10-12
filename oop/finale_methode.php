<?php
class ParentKlasse
{
    const RELATIE = "parent\n";

    /**
     * @final
     * @return string
     */
    final public function mijnMethode()
    {
        return "parent\n";
    }
}

class ChildKlasse extends MijnParentKlasse
{
    const RELATIE = "child\n";

// Mag niet, mijnMethode() is al als final gedeclareerd!
#   public function mijnMethode()
#   {
#       return "child\n";;
#   }
}

echo '<pre>';
$parent = new ParentKlasse();
$child  = new ChildKlasse();
echo get_class($parent) . "\n"; // output: MijnParentKlasse
echo $parent->mijnMethode();    // output: parent
echo MijnParentKlasse::RELATIE; // output: parent
echo "\n";
echo get_class($child) . "\n";  // output: MijnChildKlasse
echo $child->mijnMethode();     // output: parent
echo MijnChildKlasse::RELATIE;  // output: child
