<?php
// Include php file with "add product" funcionality
require "../PHP/product_add.php";

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
    <link rel="stylesheet" type="text/css" href="../styles.css">
</head>


<body>
<main class="container-fluid">
    <header>
        <div class="row">
            <div class="col-md-6">
                <h1>Product Add</h1>
            </div>
            <div class="col-md-6">
                <a href="../index.php" class="btn btn-success float_right">Back to product list</a>
                <button type="submit" form="add_product_form" value="Save" class="btn btn-primary float_right" id="save">Add product</button>
            </div>
        </div>
    </header>

    <hr>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form-horizontal" id="add_product_form">
        <section>
            <div class="form-group <?php echo (!empty($sku_err)) ? 'has-error' : ''; ?>">
                <label for="sku" class="col-sm-1 control-label">SKU</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="sku" id="sku"><br>
                </div>
                <span class="help-block"><?php echo $sku_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                <label for="name" class="col-sm-1 control-label">Name</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="name" id="name"><br>
                </div>
                <span class="help-block"><?php echo $name_err; ?></span>
            </div>

            <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                <label for="name" class="col-sm-1 control-label">Price</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="price" id="price"><br>
                </div>
                <span class="help-block"><?php echo $price_err; ?></span>
            </div>

            <div class="form-group">
                <label for="type_switcher" class="col-sm-1 control-label">Type Switcher</label>
                <div class="col-sm-3">
                    <select name="type_switcher" class="form-control" id="type_switcher">
                        <option value="disc">DVD-disc</option>
                        <option value="book">Book</option>
                        <option value="furniture">Furniture</option>
                    </select>
                </div>
            </div>
        </section>

        <section class="type_disc">
            <div class="form-group <?php echo (!empty($size_err)) ? 'has-error' : ''; ?>">
                <label for="size" class="col-sm-1 control-label">Size</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="size" id="size"><br>
                </div>
                <p>Please provide size in MB.</p>
                <span class="help-block"><?php echo $size_err; ?></span>
            </div>
        </section>

        <section class="type_book">
            <div class="form-group <?php echo (!empty($weight_err)) ? 'has-error' : ''; ?>">
                <label for="weight" class="col-sm-1 control-label">Weight</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="weight" id="weight"><br>
                </div>
                <p>Please provide weight in kg.</p>
                <span class="help-block col-sm-3"><?php echo $weight_err; ?></span>
            </div>
        </section>

        <section class="type_furniture">
            <div class="form-group <?php echo (!empty($height_err)) ? 'has-error' : ''; ?>">
                <label for="height" class="col-sm-1 control-label">Height</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="height" id="height"><br>
                </div>
                <span class="help-block"><?php echo $height_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($width_err)) ? 'has-error' : ''; ?>">
                <label for="width" class="col-sm-1 control-label">Width</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="width" id="width"><br>
                </div>
                <span class="help-block"><?php echo $width_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($length_err)) ? 'has-error' : ''; ?>">
                <label for="length" class="col-sm-1 control-label">Length</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="length" id="length"><br>
                </div>
                <p>Please provide dimensions in HxWxL format (cm).</p>
                <span class="help-block"><?php echo $length_err; ?></span>
            </div>
        </section>

        <section>
            <div class="form-group type_disc <?php echo (!empty($save_err)) ? 'has-error' : ''; ?>">
                <span class="help-block"><?php echo $save_err; ?></span>
            </div>
            <span id="success"><?php echo $success_msg; ?></span>
        </section>

    </form>
</main>


<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
<script src="../script.js"></script>
</body>
</html>