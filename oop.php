<?php
abstract class Shape {
    protected $width;
    protected $height;

    public function __construct($width = 0, $height = 0) {
        $this->width = $width;
        $this->height = $height;
    }

    abstract public function getArea();
}

class Rectangle extends Shape {
    public function getArea() {
        return $this->width * $this->height;
    }
}

class Circle extends Shape {
    private $r;
    private $pi = 3.14;

    public function __construct($r) {
        $this->r = $r;
    }

    public function getArea() {
        return $this->pi * ($this->r ** 2);
    }
}

$rect = new Rectangle(10, 5);
echo "Rectangle Area: " . $rect->getArea() . "<br>";

$circle = new Circle(7);
echo "Circle Area: " . $circle->getArea();




?>
<?php
class MagicMethod {
    function __construct() {
        echo "This is the construct magic method";
    }
}

$obj = new MagicMethod();

// Output => This is the construct magic method

class MagicMethod2 {
    function __destruct() {
        echo "This destruct magic method gets called when object destroys";
    }
}

$obj = new MagicMethod2();

// Output => This destruct magic method gets called when object destroys



class MagicMethod3 {
    function __call($name , $parameters){
        echo "Name of method =>" . $name."\n";
        echo "Parameters provided\n";
        print_r($parameters);
    }
}

// Instantiating MagicMethod
$obj = new MagicMethod3();

$obj->hello("Magic" , "Method");

/* Output =>
Name of method =>hello
Parameters provided
Array
(
    [0] => Magic
    [1] => Method
)
*/


class MagicMethod4 {
    function __toString(){
        return "You are using MagicMethod object as a String ";
    }
}

$obj = new MagicMethod4();

echo $obj;

// Output => You are using MagicMethod object as a String 


class MagicMethod5 {
    function __get($name){
        echo "You are trying to get '" . $name . 
          "' which is either inaccessible 
           or non existing member"; 
    }
}

$obj = new MagicMethod5();
$obj->value;

/* Output => You are trying to get 'value' which is either 
inaccessible or non existing member
*/


class MagicMethod6 {
    function __set($name , $value) {
        echo "You are trying to modify '" 
          . $name . "' with '" . $value . 
          "' which is either inaccessible 
          or non-existing member";
    }
}
$obj = new MagicMethod6();
$obj->value = "Hello";

/* Output => You are trying to modify 'value' with 'Hello' which is either inaccessible 
        or non-existing member
*/



class MagicMethod7 {
    function __debugInfo(){
        return array("variable"=> "value");
    }
}

$obj = new MagicMethod7();
var_dump($obj);

/* Output => 
object(MagicMethod)#1 (1) {
["variable"]=>
string(5) "value"
}
*/
?>


