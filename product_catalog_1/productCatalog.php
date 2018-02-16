<?php

class Product {
    //product class
    public $id;
    public $title;
    public $price;
    public $size;
    public $attribute;

    //function to get product name
    function getName (){
        return $this->title;
    }

    //function to get product size
    function getSize (){
        return $this->size;
    }

    //function to get product attribute
    function getAttribute ($attribute){
        return $this->{$attribute};
    }
}

class Furniture extends Product {
    public $material;

//function to get all product attributes for furniture
    function getAllAttributes ()
    {
        $allAttributes = "name: ".$this->title."; price: ".$this->price."; size: ".$this->size. "; material: ".$this->material;
        return $allAttributes;
    }
}

class Disc extends Product {
    public $manufacturer;

    //function to get disc name (title + size + " MB" )
    function getName (){
        return $this->title. " ".$this->size. "MB";
    }

    //function to get disc size (size with appended " MB" to it)
    function getSize (){
        return $this->size. "MB";
    }

    //function to get all disc attributes
    function getAllAttributes ()
    {
        $allAttributes = "name: ".$this->title." ".$this->size."MB; price: ".$this->price."; size: ".$this->size. "MB; manufacturer: ".$this->manufacturer;
        return $allAttributes;
    }
    //function to get disc attribute
    function getAttribute ($attribute){
        if ($attribute=="size") {return $this->getSize ();}
        elseif($attribute=="title") {return $this->getName ();}
        else{return $this->{$attribute};}

    }
}


class Connection {

    //function to connect products_catalog database
    public static function connectToDB(){
        try {
            return new PDO ('mysql:host=127.0.0.1; dbname=products_catalog', 'root', 'root');
        } catch
        (PDOException $e) {
            die ($e->getMessage());
        }
    }

    //function to read data from Furniture table
    public static function readFurniture($pdo){
        $statement = $pdo->prepare('select * from furniture');
        $statement->execute();

        $furniture = $statement->fetchAll(PDO::FETCH_CLASS, "Furniture");
        return $furniture;
    }

    //function to read data from cd_dvd_discs table
    public static function readDiscs($pdo){
        $statement = $pdo->prepare('select * from cd_dvd_discs');
        $statement->execute();
        $disc = $statement->fetchAll(PDO::FETCH_CLASS, "Disc");
        return $disc;
    }
}

    //connection to database
    $pdo = Connection::connectToDB();

    //reading data from tables
    $furniture = Connection::readFurniture($pdo);
    $disc = Connection::readDiscs($pdo);

    //see data array
    var_dump($furniture);
    var_dump($disc);

    //testing all functions
    echo $furniture[0]  ->getName()."<br>";
    echo $furniture[1]  ->getName()."<br>";

    echo $furniture[0]  ->getSize()."<br>";
    echo $furniture[1]  ->getSize()."<br>";

    echo $furniture[0]  ->getAllAttributes()."<br>";
    echo $furniture[1]  ->getAllAttributes()."<br>";

    echo $disc[0]  ->getName()."<br>";
    echo $disc[1]  ->getName()."<br>";

    echo $disc[0]  ->getSize()."<br>";
    echo $disc[1]  ->getSize()."<br>";

    echo $disc[0]  ->getAllAttributes()."<br>";
    echo $disc[1]  ->getAllAttributes()."<br>";

    echo $furniture[0] ->getAttribute("title")."<br>";
    echo $furniture[0] ->getAttribute("price")."<br>";
    echo $furniture[0] ->getAttribute("size")."<br>";
    echo $furniture[0] ->getAttribute("material")."<br>";

    echo $disc[1] ->getAttribute("title")."<br>";
    echo $disc[1] ->getAttribute("price")."<br>";
    echo $disc[1] ->getAttribute("size")."<br>";
    echo $disc[1] ->getAttribute("manufacturer")."<br>";

