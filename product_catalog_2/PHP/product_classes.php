<?php

class Product {
    //product class - main class
    protected $sku;
    protected $name;
    protected $price;

    //function to get product sku
    public function getSku (){
        return $this->sku;
    }

    //function to get product name
    public function getName (){
        return $this->name;
    }

    //function to get product price
    public function getPrice (){
        $p = number_format($this->price, 2);
        return $p. " $";
    }
}

class Disc extends Product {
    protected $size;

    //function to get disc size (size with appended "MB" to it)
    public function getSize (){
        return "Size: ".$this->size. " MB";
    }

}

class Book extends Product {
    protected $weight;

    //function to get weight (weight with appended "kg" to it)
    public function getWeight (){
        return "Weight: ".$this->weight. " kg";
    }
}

class Furniture extends Product {
    protected $height;
    protected $width;
    protected $length;

    //function to get dimensions of furniture
    public function getDimension (){
        return "Dimension: ".$this->height. "x". $this->width. "x".$this->length;
    }
}