<?php

class Animal
{
    protected $nama;
    protected $jenis;

    public function __construct($nama, $jenis)
    {
        $this->nama = $nama;
        $this->jenis = $jenis;
    }

    public function getInfo()
    {
        return "Hewan ini bernama {$this->nama} dan jenisnya {$this->jenis}.";
    }
}

class Cat extends Animal
{
    public function __construct($nama)
    {
        parent::__construct($nama, "kucing");
    }

    public function getInfo()
    {
        return parent::getInfo() . " Kucing adalah hewan yang lucu.";
    }
}

class Dog extends Animal
{
    public function __construct($nama)
    {
        parent::__construct($nama, "anjing");
    }

    public function getInfo()
    {
        return parent::getInfo() . " Anjing adalah hewan yang setia.";
    }
}

$animal = new Animal("Harimau", "Karnivora");
$cat = new Cat("Kitty");
$dog = new Dog("Budy");

echo $animal->getInfo() . "<br>";
echo $cat->getInfo() . "<br>";
echo $dog->getInfo() . "<br>";
