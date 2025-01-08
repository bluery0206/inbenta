<?php
include('database.php');
include('header.php');
$id = $_GET['id'];

$sql = "SELECT * FROM inbenta_users WHERE id = '$id';";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$username = $row['username'];
$store_name = $row['store_name'];
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
    <main>
        <div class="search_container">
            <h1><?php echo $row['store_name']; ?></h1>
        </div>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Availability</th>
                        <th colspan="3">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['search'])) {
                        $search_item = $_GET['search_item'];
                        $result = mysqli_query($conn, "SELECT * FROM inventory_$username WHERE product_name LIKE '%$search_item%'; ");
                    } else {
                        $result = mysqli_query($conn, "SELECT * FROM inventory_$username");
                    }
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td style="text-align: center"><?php echo $row['id'] ?></td>
                                <td style="padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                <td style="text-align: center"><?php echo $row['is_available'] ?></td>
                                <td style="text-align:center; width: 100px"><?php echo $row['product_price_per_piece'] . $row['per_piece'] ?></td>
                                <td style="text-align:center; width: 100px"><?php echo $row['product_price_per_dozen'] . $row['per_dozen'] ?></td>
                                <td style="text-align:center; width: 100px"><?php echo $row['product_price_per_box'] . $row['per_box'] ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                </tbody>
            </table>
                    <?php echo "<h1 style='text-align: center'>No items found.</h1>";
                    } ?>
        </div>
        <a href="store_list.php" class="btn_primary">> Back</a>
    </main>
</body>

</html>