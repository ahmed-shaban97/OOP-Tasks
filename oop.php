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