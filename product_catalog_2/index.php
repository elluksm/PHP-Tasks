
<?php
// Include php files
require "PHP/product_classes.php";
require "PHP/product_list.php";

?>


<DOCTYPE! html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scandiweb</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <main class="container-fluid">
        <header>
            <div class="row">
                <div class="col-md-3">
                    <h1>Product List</h1>
                </div>
                <div class="col-md-5">
                    <a href="views/product_add_view.php" class="btn btn-success">Add product</a>
                </div>
                <div class="col-md-3">
                    <select name="action" class="form-control" id="action" class="form-control">
                        <option value="delete" >Mass Delete Action</option>
                    </select>
                </div>
                <div class="col-md-1">
                    <button type="submit" form="products" name = "submit" class="btn btn-primary float_right" value="delete">Apply</button>
                </div>
            </div>
        </header>


        <section>
            <div class="row">
                <hr>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="products">
                <?php

                //function for displaying products
                function displayProducts ($product_table, $table_name){
                    foreach($product_table as $product){
                        //loop through all products in table
                        //  save attributes for each product
                        $sku = $product->getSku();
                        $name = $product->getName();
                        $price = $product->getPrice();
                        if($table_name == "discs"){
                            $attribute = $product->getSize();
                        }
                        else if($table_name == "books"){
                            $attribute = $product->getWeight();
                        }
                        else {
                            $attribute = $product->getDimension();
                        }
                         ?>

                        <div class="col-md-3 col-sm-4">
                                    <div class="product_list">
                                        <input type="checkbox" name="check_list_<?= $table_name ?>[]" value="<?= $sku ?>"><br>
                                        <p><?= $sku ?></p>
                                        <p><?= $name ?></p>
                                        <p><?= $price ?></p>
                                        <p><?= $attribute ?></p>
                                    </div>
                                </div>
                <?php } }

                //display products from all tables
                displayProducts ($discs, "discs");
                displayProducts ($books, "books");
                displayProducts ($furniture, "furniture"); ?>

                </form>
            </div>
        </section>
    </main>

</body>
</html>


