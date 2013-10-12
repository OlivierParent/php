<?php
class MijnKlasse
{
    /**
     * @var string
     */
    private $_propertyA = "Ik ben A\n";
    /**
     * @var string
     */
    private $_propertyB = "?\n";

    /**
     * Magische methode voor de generieke getter voor een property.
     *
     * @param string $name
     */
    public function __get($name)
    {
        $method = 'get' . ucfirst($name);
        if (method_exists($this, $method) ) {
            return $this->{$method}();
        } else {
            $property = '_' . lcfirst($name);
            if (property_exists($this, $property) ) {
                return 'Generieke getter: ' . $this->{$property}; // De accolades zijn optioneel.
            } else {
                echo "\${$property} bestaat niet in ", get_called_class(), PHP_EOL;
            }
        }
    }

    /**
     * Magische methode voor de generieke setter voor een property.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        $method = 'set' . ucfirst($name);
        if (method_exists($this, $method) ) {
            $this->{$method}($value);
        } else {
            $property = '_' . lcfirst($name);
            if (property_exists($this, $property) ) {
                $this->{$property} = "{$value} door generieke setter\n"; // De accolades zijn optioneel.
            } else {
                echo "\${$property} bestaat niet in ", get_called_class(), PHP_EOL;
            }
        }
    }

    /**
     * @return string
     */
    public function getPropertyA()
    {
        return "Getter: {$this->_propertyA}";
    }

    public function setPropertyB($value)
    {
       $this->_propertyB = $value . PHP_EOL;
    }
}

echo '<pre>';
$instantie = new MijnKlasse();
echo $instantie->PropertyA,         // output: Getter: Ik ben A
     $instantie->getPropertyA(),    // output: Getter: Ik ben A
     $instantie->PropertyB;         // output: Generieke getter: ?
$instantie->setPropertyB('Ik ben B');
echo $instantie->PropertyB;         // output: Generieke getter: Ik ben B
$instantie->PropertyC = 'Ik ben C'; // output: $_propertyC bestaat niet in MijnKlasse
echo $instantie->PropertyC;         // output: $_propertyC bestaat niet in MijnKlasse
$instantie->PropertyA = 'Ik ben D';
echo $instantie->getPropertyA();    // output: Getter: Ik ben D door generieke setter
