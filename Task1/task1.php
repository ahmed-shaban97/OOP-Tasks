<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <?php

class Product {
    public $name;
    public $price;
    public $brand;
    public $image;
    public $description;
    public $tax;

    public function getName(){
        return $this->name;
    }

    public function priceAfterDiscount($discount){
        $this->price -= $discount;
        return $this->price;
    }

    public function getFinalPrice(){
        return $this->price + $this->tax;
    }
}

// ===== Product 1 =====
$product1 = new Product();
$product1->name = "MacBook Air M2";
$product1->price = 1200;
$product1->tax = 80;
$product1->brand = "Apple";
$product1->image = "https://m.media-amazon.com/images/I/71jG+e7roXL._AC_SL1500_.jpg";
$product1->description = "13-inch, 8GB RAM, 256GB SSD, Apple M2 chip, Retina Display";
$product1->priceAfterDiscount(150);

// ===== Product 2 =====
$product2 = new Product();
$product2->name = "Samsung Galaxy S23";
$product2->price = 800;
$product2->tax = 30;
$product2->brand = "Samsung";
$product2->image = "https://m.media-amazon.com/images/I/61O45C5qASL._AC_SL1500_.jpg";
$product2->description = "8GB Ram, 256GB Storage, Dynamic AMOLED 2X Display";
$product2->priceAfterDiscount(100);

// ===== Product 3 =====
$product3 = new Product();
$product3->name = "Sony WH-1000XM4";
$product3->price = 200;
$product3->tax = 20;
$product3->brand = "Sony";
$product3->image = "https://m.media-amazon.com/images/I/61D4Z3yKPAL._AC_SL1500_.jpg";
$product3->description = "Noise Cancelling, Wireless, 30h Battery Life";
$product3->priceAfterDiscount(50);

// Array of products
$products = [$product1, $product2, $product3];

?>

    <div class="container py-5">
        <div class="row g-4">
            <?php foreach($products as $product): ?>
            <div class="col-md-4">
                <div class="card card-custom shadow-sm h-100">
                    <img src="<?= $product->image ?>" alt="<?= $product->name ?>">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $product->getName() ?></h5>
                        <h6 class="text-muted mb-3"><?= $product->brand ?></h6>
                        <p class="card-text small text-secondary"><?= $product->description ?></p>
                        <p class="price-discount">After Discount: <?= $product->price ?>$</p>
                        <p class="price-final">Final Price: <?= $product->getFinalPrice() ?>$</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</body>

</html>