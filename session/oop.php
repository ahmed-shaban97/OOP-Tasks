<?php
class rectangle{
    public $height;
    public $width;
    private $id = 1;

    public function area(){
        echo "Area: " . $this->height * $this->width;
    }
    public function perimeter(){
       echo "perimeter: " . ($this->height + $this->width) * 2;
    }

    function getId(){
        echo $this->id;
    }
}

// $rec1 = new rectangle();
// $rec1->height = 20;
// $rec1->width = 40;
// $rec1->area();
// echo "<br>";
// $rec1->perimeter();


// echo "<hr>";
// $rec2 = new rectangle();
// $rec2->height = 11;
// $rec2->width = 6;
// $rec2->area();
// echo "<br>";
// $rec2->perimeter();
// echo "<br>";
// $rec2->getId();
class Product{
    public $name;
    public $price;
    private $quantity;
    public function __construct($name, $price, $quantity = 0){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function setQuantity($quantity){
        if($quantity >= 0 ){
            $this->quantity = $quantity;
        }
    }
    public function getQuantity(){
        return "<br> Quantity: " . $this->quantity ;
    }
    public function buy($count){
        if($count >=0 && $count <= $this->quantity){
            $this->quantity -= $count;
            echo "<br> $count pieces bought successfully <br>";
        }else{
            echo "Not Enough";
        }
    }
}
$product = new Product("laptop", 15000, 10);
echo $product->getQuantity();
echo $product->buy(2);
echo $product->buy(11);



class BankAccount {
    public $name;
    public $balance;

    function __construct($name, $balance){
        $this->name = $name;
        $this->balance = $balance;
    }

    function withdraw($amount){
        $this->balance -= $amount;
    }
}

$acc = new BankAccount("Ahmed", 1000);
$acc->withdraw(200);



?>