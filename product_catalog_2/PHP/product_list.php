<?php

// Include db_connect file
require "db.php";
//connection to database
$pdo = Connection::connectToDB();

//reading data from tables
$discs = ReadData::readDiscs($pdo);
$books = ReadData::readBooks($pdo);
$furniture = ReadData::readFurniture($pdo);


// Close statement
unset($stmt);

//mass delete function
if(isset($_POST["submit"])){//to run PHP script on submit
    //loop through values of individual checked checkboxes and delete them from their tables
    if(!empty($_POST["check_list_discs"])){
        foreach($_POST["check_list_discs"] as $selected){
            $sql = "DELETE FROM discs WHERE sku = '$selected'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            unset($stmt);
        }
    }

    if(!empty($_POST["check_list_books"])){
        foreach($_POST["check_list_books"] as $selected){
            $sql = "DELETE FROM books WHERE sku = '$selected'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            unset($stmt);
        }
    }

    if(!empty($_POST["check_list_furniture"])){
        foreach($_POST["check_list_furniture"] as $selected){
            $sql = "DELETE FROM furniture WHERE sku = '$selected'";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            unset($stmt);
        }
    }

    header("location: index.php"); //refresh page
}

// Close connection
unset($pdo);