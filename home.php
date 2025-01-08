<?php
include('header.php');
include('database.php');
$empty="";

$username = $_SESSION['logged-in'];
include('redirect.php');

$sql = "SELECT * FROM inbenta_users WHERE username = '$username'";
$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
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
    <main class="shadow">
        <div class="search_container">
            <h1><?php echo $row['store_name']; ?></h1>
            <form method="GET">
                <input class="shadow hover" type="search" name="search_item" placeholder="Search Item">
                <input class="hover shadow btn_primary" type="submit" name="search" value="Search">
            </form>
        </div>
        <a class="shadow hover btn_primary" href="add_item.php">Add Item</a>
        <div class="table_container ">
            <table>
                <thead>
                    <tr>
                        <th style="width: 40px;">ID</th>
                        <th>Product Name</th>
                        <th style="width: 120px">Availability</th>
                        <th colspan="3" style="width: 120px">Price</th>
                        <th style="width: 100px">Operation</th>
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
                                <td style="text-align:center"><?php echo $row['id'] ?></td>
                                <td style="padding-left: 20px;"><?php echo $row['product_name'] ?></td>
                                <td style="text-align: center;"><?php echo $row['product_availability'] ?></td>
                                <td style="text-align:center; width: 100px"><?php echo $row['product_price_1'] . $row['product_price_1_per'] ?></td>
                                <td style="text-align:center;width: 100px"><?php echo $row['product_price_2'] . $row['product_price_2_per'] ?></td>
                                <td style="text-align:center;width: 100px"><?php echo $row['product_price_3'] . $row['product_price_3_per'] ?></td>
                                <td class="operation">
                                    <a class="shadow hover btn_primary" href="edit_item.php?id=<?php echo $row['id'] ?>">Edit</a>
                                    <a class="shadow hover btn_danger" href="delete_item.php?id=<?php echo $row['id'] ?>">Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    else { $empty = "<h1 style='text-align: center'>No items found.</h1>"; }
                    ?>
                </tbody>
            </table>
            <?php echo $empty?>
        </div>
        <a class="shadow hover btn_danger" href="delete_all.php">Delete All</a>
    </main>
</body>

</html>
<?php include("footer.html") ?>