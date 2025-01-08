<?php
    include("database.php");

    session_start();
    $username=$_SESSION['logged-in'];

    if(isset($_GET['delete_all'])){
        $sql="TRUNCATE inventory_$username";
        mysqli_query($conn, $sql);
        header("Location: home.php");
    }elseif(isset($_GET['cancel'])){
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
    <div class="shadow confirm_container">
        <h1>Are you sure?</h1>
        <form method="get">
            <input type="submit" name="delete_all" value="Delete All" class="shadow hover btn_danger">
            <input type="submit" name="cancel" value="Cancel" class="hover shadow btn_primary">
        </form>
    </div>
</body>
</html>