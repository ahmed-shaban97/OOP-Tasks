<?php
class User {
    public $name;
    public $role;

    public function __construct($name) {
        echo "Constructor work <br>";
        $this->name = $name;
        $this->role = "User"; 
    }

    public function __clone() {
        echo "Clone Work <br>";
        $this->role = "Guest";
    }
}

$user1 = new User("Ahmed"); 
$user2 = clone $user1;      

echo $user1->role; // User
echo "<br>";
echo $user2->role; // Guest
