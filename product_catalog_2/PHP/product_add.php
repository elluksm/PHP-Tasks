<?php

// Include db_connect file
require "db.php";
//connection to database
$pdo = Connection::connectToDB();

// Define variables and initialize with empty values
$sku = $name = $price = $size = $weight = $height = $width = $length ="";
$sku_err = $name_err = $price_err = $size_err = $weight_err = $height_err = $width_err = $length_err = $save_err = "";
$success_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate product's name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter a Product's name.";
    } else{
        $name = trim($_POST["name"]);
    }

    // Validate product's price
    if(empty(trim($_POST["price"]))){
        $price_err = "Please enter a Product's price.";
    } else{
        $price = trim($_POST["price"]);
        if (!is_numeric($price)){
            $price_err = "Please enter a Product's price in format '5.99'.";
        }
    }

    //check product's type
    if ($_POST["type_switcher"]=="disc"){
        $table_name = "discs";

        // Validate product's size for discs
        if(empty(trim($_POST["size"]))){
            $size_err = "Please enter a Product's size.";
        } else{
            $size = trim($_POST["size"]);
            if (!is_numeric($size)){
                $size_err = "Please enter a Product's size as number.";
            }
        }
    }
    else if($_POST["type_switcher"]=="book"){
        $table_name = "books";

        // Validate product's weight for books
        if(empty(trim($_POST["weight"]))){
            $weight_err = "Please enter a Product's weight.";
        } else{
            $weight = trim($_POST["weight"]);
            if (!is_numeric($weight)){
                $weight_err = "Please enter a Product's weight in format '5.99'.";
            }
        }
    }
    else{
        $table_name = "furniture";

        // Validate product's height for furniture
        if(empty(trim($_POST["height"]))){
            $height_err = "Please enter a Product's height.";
        } else{
            $height = trim($_POST["height"]);
            if (!is_numeric($height)){
                $height_err = "Please enter a Product's height as number.";
            }
        }

        // Validate product's width for furniture
        if(empty(trim($_POST["width"]))){
            $width_err = "Please enter a Product's width.";
        } else{
            $width = trim($_POST["width"]);
            if (!is_numeric($width)){
                $width_err = "Please enter a Product's width as number.";
            }
        }

        // Validate product's length for furniture
        if(empty(trim($_POST["length"]))){
            $length_err = "Please enter a Product's length.";
        } else{
            $length = trim($_POST["length"]);
            if (!is_numeric($length)){
                $length_err = "Please enter a Product's length as number.";
            }
        }
    }

    // Validate sku
    if(empty(trim($_POST["sku"]))){
        $sku_err = "Please enter Product's SKU.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM $table_name WHERE sku = :sku";

        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":sku", $param_sku, PDO::PARAM_STR);

            // Set parameters
            $param_sku = trim($_POST["sku"]);

            // Attempt to execute the prepared statement
            if($stmt->execute()){

                if($stmt->rowCount() == 1){
                    $sku_err = "Product with such SKU already exsists.";
                } else{
                    $sku = trim($_POST["sku"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    //show error message if there is an error in product's attributes
    if(!empty($size_err) || !empty($weight_err) || !empty($height_err) || !empty($width_err) || !empty($length_err)){
        $save_err = "Something was wrong with product attributes. Please try again!";
    }

    // Check input errors before inserting in database
    if(empty($sku_err) && empty($name_err) && empty($price_err) && empty($size_err)&& empty($weight_err) && empty($height_err) && empty($width_err) && empty($length_err) ){

        // Prepare an insert statement
        if ($table_name == "discs"){
            $sql = "INSERT INTO discs (sku, name, price, size) VALUES (:sku, :name, :price, :size)";
        }

        else if ($table_name == "books"){
            $sql = "INSERT INTO books (sku, name, price, weight) VALUES (:sku, :name, :price, :weight)";
        }

        else{
            $sql = "INSERT INTO furniture (sku, name, price, height, width, length) VALUES (:sku, :name, :price, :height, :width, :length)";
        }

            if($stmt = $pdo->prepare($sql)){

                // Bind variables to the prepared statement as parameters
                $stmt->bindParam(':sku', $sku, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':price', $price, PDO::PARAM_STR);

                if ($table_name == "discs"){
                    $stmt->bindParam(':size', $size, PDO::PARAM_STR);
                }
                else if ($table_name == "books"){
                    $stmt->bindParam(':weight', $weight, PDO::PARAM_STR);
                }
                else{
                    $stmt->bindParam(':height', $height, PDO::PARAM_STR);
                    $stmt->bindParam(':width', $width, PDO::PARAM_STR);
                    $stmt->bindParam(':length', $length, PDO::PARAM_STR);
                }

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    $success_msg = "Product successfully saved!";
                } else{
                    $save_err = "Something went wrong. Please try again!";
                }
            }


        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}

?>



