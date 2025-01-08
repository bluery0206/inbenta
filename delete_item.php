<?php
    include('database.php');

    session_start();
    $id = $_GET['id'];
    $username = $_SESSION['logged-in'];
    
    $sql="DELETE FROM inventory_$username WHERE id = $id;";
    mysqli_query($conn, $sql);
    header("Location: home.php");
?>