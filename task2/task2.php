<?php
class Product{
    public $name;
    public $price;
    public $description;
    public $image;
    function __construct($name, $price, $description, $image){
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = $image;
    }

    function uploadImage(){
        return $this->image;
    }
    function calcPrice(){
        return $this->price;
    }
}

class Book extends Product{
    private $publisher;
    public $writer;
    public $color;
    public $supplier;
    
    function __construct($name, $price, $description, $image, $writer, $color, $supplier){
        parent::__construct($name, $price, $description, $image);
        $this->writer = $writer;
        $this->color = $color;
        $this->supplier = $supplier;
    }

    function setPublisher(){
        $this->publisher = ['Ahmed', 'Islam', 'Omar', 'Balsam'];
    }

    function choosePublisher(){
        return $this->publisher[array_rand($this->publisher, 1)];
    }
}

class BabyCar extends Product {
    public $age;
    public $weight;
    private $materials;
    public $specialTax;

    function __construct($name, $price, $description, $image, $age, $weight, $specialTax){
        parent::__construct($name, $price, $description, $image);
        $this->age = $age;
        $this->weight = $weight;
        $this->materials = ["Plastic", "Rubber", "Steel"];
        $this->specialTax = $specialTax;
    }

    function displayMaterials(){
        $output = "<ul class='list-unstyled'>";
        foreach($this->materials as $mat){
            $output .= "<li> " . "- " . $mat . "</li>";
        }
        $output .= "</ul>";
        return $output;
    }

    function getFinalPrice(){
        return $this->price + $this->specialTax;
    }
}


// ---------- Objects ----------
$car_image1 = "https://imgs.search.brave.com/F_BWaJHL4BQ31-2nYf3vhAvzOS1mx_-cyF1kxbRidLI/rs:fit:500:0:1:0/g:ce/aHR0cHM6Ly9iYWJ5/bW9vLmluL2Nkbi9z/aG9wL2ZpbGVzLzAy/X0hXLTUzODgtUE5L/LV8xLnBuZz92PTE3/MTg0MzQxMzImd2lk/dGg9MTUwMA";
$car_image2 = "https://imgs.search.brave.com/PEY1cNs_mxFZwAYbvLaFAAwEqqoLOScKsl3dlLP_Jz4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9iYWJ5/bW9vLmluL2Nkbi9z/aG9wL2ZpbGVzL0hX/LTUzODgtUkVEXzku/anBnP3Y9MTcxNDQ3/MTIxNyZ3aWR0aD0x/MDAw";
$babyCars = [
    new BabyCar("BabyCar1", 500, "This is baby car 1", $car_image1, 3, 15, 50),
    new BabyCar("BabyCar2", 600, "This is baby car 2", $car_image2, 4, 18, 60)
];


$book_image1 = "https://imgs.search.brave.com/fyoKshcKVkukw5L2Pt7eRsQywuOLBNDVU8n_DttogBw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9sZWFy/bnRvY29kZXdpdGgu/bWUvd3AtY29udGVu/dC91cGxvYWRzLzIw/MjAvMDEvbW9kZXJu/LXBocC0xMDI0eDc2/OS5qcGVn";
$book_image2 = "https://imgs.search.brave.com/cni8ByjFUg9EwfXYfQp9L79DFPZ4UyHMK8NULMy7Xw0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWFn/ZXMtcGxhdGZvcm0u/OTlzdGF0aWMuY29t/Ly9xOEJHSjNlcWRf/SkVWeGlrcnd2NU9m/clBab2M9LzI5M3gw/OjE2Mzh4MTM0NS9m/aXQtaW4vNTAweDUw/MC85OWRlc2lnbnMt/Y29udGVzdHMtYXR0/YWNobWVudHMvODkv/ODk5MTIvYXR0YWNo/bWVudF84OTkxMjU0/MQ";
$books = [
    new Book("Book1", 200, "This is programming book 1", $book_image1, "Smear", "Blue", "Supplier1"),
    new Book("Book2", 250, "This is programming book 2", $book_image2 , "Ali", "Red", "Supplier2")
];

foreach($books as $b){ $b->setPublisher(); }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Products Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-4">

        <!-- Baby Cars -->
        <h1 class="text-center text-primary mb-4">Baby Cars</h1>
        <div class="row g-4">
            <?php foreach($babyCars as $car): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $car->uploadImage() ?>" class="card-img-top" alt="<?= $car->name ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $car->name ?></h5>
                        <p class="card-text"><?= $car->description ?></p>
                        <p><strong>Age:</strong> <?= $car->age ?> years</p>
                        <p><strong>Weight:</strong> <?= $car->weight ?> kg</p>
                        <p><strong>Materials:</strong> <?= $car->displayMaterials() ?></p>
                        <p><strong>Price:</strong> <?= $car->calcPrice() ?> $</p>
                        <p><strong>Final Price (with tax):</strong> <?= $car->getFinalPrice() ?> $</p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Books -->
        <h1 class="text-center text-success my-5"> Books</h1>
        <div class="row g-4">
            <?php foreach($books as $b): ?>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= $b->uploadImage() ?>" class="card-img-top" alt="<?= $b->name ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $b->name ?></h5>
                        <p class="card-text"><?= $b->description ?></p>
                        <p><strong>Writer:</strong> <?= $b->writer ?></p>
                        <p><strong>Color:</strong> <?= $b->color ?></p>
                        <p><strong>Supplier:</strong> <?= $b->supplier ?></p>
                        <p><strong>Price:</strong> <?= $b->calcPrice() ?> $</p>
                        <p><strong>Publisher:</strong> <?= $b->choosePublisher() ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

</body>

</html>