<?php
    include('database.php');

    session_start();
    $id = $_GET['id'];
    $username = $_SESSION['logged-in'];
    include('redirect.php');

    $sql = "SELECT * FROM inventory_$username";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $product_name = $row['product_name'];
    $product_price_1 = $row['product_price_1'];
    $product_price_2 = $row['product_price_2'];
    $product_price_3 = $row['product_price_3'];

    if(isset($_POST['edit_item'])){
        $product_name           = filter_input(INPUT_POST, 'product_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $product_availability   = $_POST['product_availability'];
        $product_price_1        = filter_input(INPUT_POST, 'product_price_1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_price_1_per    = $_POST['product_price_1_per'];
        $product_price_2        = filter_input(INPUT_POST, 'product_price_2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $product_price_2_per    = $_POST['product_price_2_per'];
        $product_price_3        = $_POST['product_price_3'];
        $product_price_3_per    = $_POST['product_price_3_per'];

        $sql="UPDATE inventory_$username  
                SET 
                    product_name            = '$product_name',
                    product_availability    = '$product_availability', 
                    product_price_1         = '$product_price_1', 
                    product_price_1_per     = '$product_price_1_per',
                    product_price_2         = '$product_price_2',
                    product_price_2_per     = '$product_price_2_per',
                    product_price_3         = '$product_price_3',
                    product_price_3_per     = '$product_price_3_per'
                WHERE id = $id;
                ";
        mysqli_query($conn, $sql);
        header("Location: home.php");
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
        <h1>Edit Item</h1>
        <form method="POST"> 
            <input class="shadow hover" type="text" name="product_name" placeholder="Product Name" value="<?php echo $product_name?>"><br>
            <select class="shadow hover" name="product_availability">
                <option value="not_available">Not Available</option>
                <option value="available">Available</option>
            </select><br>

            <input class="shadow hover" type="number" step="any" min="0" name="product_price_1" placeholder="Product Price 1" value="<?php echo $product_price_1?>">
            <select class="shadow hover" name="product_price_1_per">
                <option value=" ">N/A</option>
                <option value="/piece">Per Piece</option>
                <option value="/bottle">Per Bottle</option>
                <option value="/stick">Per Stick</option>
                <option value="/meter">Per Meter</option>
            </select><br>

            <input class="shadow hover" type="number" step="any" min="0" name="product_price_2" placeholder="Product Price 2" value="<?php echo $product_price_2?>">
            <select class="shadow hover" name="product_price_2_per">
                <option value=" ">N/A</option>
                <option value="/dozen">Per Dozen</option>
                <option value="/pack">Per Pack</option>
            </select><br>
            
            <input class="shadow hover" type="number" step="any" min="0" name="product_price_3" placeholder="Product Price 3" value="<?php echo $product_price_3?>">
            <select class="shadow hover" name="product_price_3_per">
                <option value=" ">N/A</option>
                <option value="/pack">Per Pack</option>
                <option value="/ream">Per Ream</option>
                <option value="/case">Per Case</option>
                <option value="/roll">Per Roll</option>
                <option value="/box">Per Box</option>
            </select><br>

            <input class="shadow hover btn_primary" type="submit" name="edit_item" value="Edit Item">
            <a class="shadow hover btn_primary" href="home.php">Back</a>
        </form>
    </div>
</body>
</html>