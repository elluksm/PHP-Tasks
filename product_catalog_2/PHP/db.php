<?php

class Connection
{

    //function to connect products_list database
    public static function connectToDB()
    {
        try {
            return new PDO ("mysql:host=127.0.0.1; dbname=products_list", "root", "root");
        } catch
        (PDOException $e) {
            die ($e->getMessage());
        }
    }
}

class ReadData {

    //function to read data from "discs" table
    public static function readDiscs($pdo)
    {
        $statement = $pdo->prepare("select * from discs");
        $statement->execute();
        $discs = $statement->fetchAll(PDO::FETCH_CLASS, "Disc");
        return $discs;
    }

    //function to read data from "books" table
    public static function readBooks($pdo)
    {
        $statement = $pdo->prepare("select * from books");
        $statement->execute();

        $books = $statement->fetchAll(PDO::FETCH_CLASS, "Book");
        return $books;
    }

    //function to read data from "furniture" table
    public static function readFurniture($pdo)
    {
        $statement = $pdo->prepare("select * from furniture");
        $statement->execute();

        $furniture = $statement->fetchAll(PDO::FETCH_CLASS, "Furniture");
        return $furniture;
    }
}
