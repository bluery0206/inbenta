<?php
include('header.php');
include('database.php');
$empty = "";
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
            <h1>Store List</h1>
            <form method="get">
                <input class="shadow hover" type="search" name="search_store" placeholder="Search Store">
                <input class="shadow hover btn_primary" type="submit" name="search_store_btn" value="Search Store">
            </form>
        </div>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Store Name</th>
                        <th>Email</th>
                        <th>Reg Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, store_name, email, reg_date FROM inbenta_users;";

                    if (!empty($_GET['search_store'])) {
                        $search_store = filter_input(INPUT_GET, 'search_store', FILTER_SANITIZE_SPECIAL_CHARS);

                        $sql = "SELECT id, store_name, email, reg_date FROM inbenta_users WHERE store_name LIKE '$search_store%';";
                    }

                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><a href="store_info.php?id=<?php echo $row['id'] ?>"><?php echo $row['store_name'] ?></a></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['reg_date'] ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        $empty = "<h1 style='text-align: center'>No items found.</h1>";
                    }
                    ?>
                </tbody>
            </table>
            <h1><?php echo $empty ?></h1>
        </div>
    </main>
</body>

</html>
<?php include("footer.html"); ?>