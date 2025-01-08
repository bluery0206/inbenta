<?php
    include('database.php');

    $err = "";

    session_start();
    $username = $_SESSION['logged-in'];
    include('redirect.php');

    if(isset($_POST['add_item'])){
        $product_name           = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $product_availability   = $_POST['product_availability'];
        $product_price_1        = filter_input(INPUT_POST, 'product_price_1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_price_1_per    = $_POST['product_price_1_per'];
        $product_price_2        = filter_input(INPUT_POST, 'product_price_2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_price_2_per    = $_POST['product_price_2_per'];
        $product_price_3        = filter_input(INPUT_POST, 'product_price_3', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_price_3_per    = $_POST['product_price_3_per'];

        $sql="  INSERT INTO inventory_$username ( product_name, 
                                                product_availability, 
                                                product_price_1, 
                                                product_price_1_per, 
                                                product_price_2, 
                                                product_price_2_per, 
                                                product_price_3, 
                                                product_price_3_per)
                VALUES( '$product_name', 
                        '$product_availability', 
                        '$product_price_1', 
                        '$product_price_1_per', 
                        '$product_price_2', 
                        '$product_price_2_per', 
                        '$product_price_3', 
                        '$product_price_3_per')";
        try{
            mysqli_query($conn, $sql);
            header("Location: home.php");
        }
        catch(mysqli_sql_exception){
            $err = "Product name already exists.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="shadow add_item_container">
        <h1>Add Item</h1>
        <p class="err"><?php echo $err ?></p>
        <form method="POST">
            <input class="shadow hover" type="text" name="product_name" placeholder="Product Name" required autocomplete="off"><br>
            <select class="shadow hover" name="product_availability">
                <option value="not_available">Not Available</option>
                <option value="available">Available</option>
            </select><br>

            <input class="shadow hover" type="number" step="any" min="0" name="product_price_1" placeholder="Product Price 1">
            <select class="shadow hover" name="product_price_1_per">
                <option value=" ">N/A</option>
                <option value="/piece">Per Piece</option>
                <option value="/bottle">Per Bottle</option>
                <option value="/stick">Per Stick</option>
                <option value="/meter">Per Meter</option>
            </select><br>

            <input class="shadow hover" type="number" step="any" min="0" name="product_price_2" placeholder="Product Price 2">
            <select class="shadow hover" name="product_price_2_per">
                <option value=" ">N/A</option>
                <option value="/dozen">Per Dozen</option>
                <option value="/pack">Per Pack</option>
            </select><br>
            
            <input class="shadow hover" type="number" step="any" min="0" name="product_price_3" placeholder="Product Price 3">
            <select class="shadow hover" name="product_price_3_per">
                <option value=" ">N/A</option>
                <option value="/pack">Per Pack</option>
                <option value="/ream">Per Ream</option>
                <option value="/case">Per Case</option>
                <option value="/roll">Per Roll</option>
                <option value="/box">Per Box</option>
            </select><br>

            <input class="hover shadow btn_primary" type="submit" name="add_item" value="Add Item">
            <a class="shadow hover btn_primary" href="home.php">Back</a>
        </form>
    </div>
</body>
</html>