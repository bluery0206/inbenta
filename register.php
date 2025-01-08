<?php
    include('database.php');
    
    if(isset($_POST['register'])){
        $store_name = filter_input(INPUT_POST, 'store_name', FILTER_SANITIZE_SPECIAL_CHARS);
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
 

        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql="INSERT INTO inbenta_users(store_name, username, email,  password)
                VALUES('$store_name', '$username', '$email', '$hash');";
        mysqli_query($conn, $sql);

        $sql="CREATE TABLE inventory_$username(
            id INT PRIMARY KEY AUTO_INCREMENT,
            product_name VARCHAR(50) UNIQUE NOT NULL,
            product_availability VARCHAR(14) NOT NULL,
            product_price_1 DECIMAL(6,2),
            product_price_1_per VARCHAR(14),
            product_price_2 DECIMAL(6,2),
            product_price_2_per VARCHAR(14),
            product_price_3 DECIMAL(6,2),
            product_price_3_per VARCHAR(14),
            product_add_date DATETIME DEFAULT CURRENT_TIMESTAMP()
        );";
        mysqli_query($conn, $sql);

        session_start();
        $_SESSION['logged-in'] = $username;
        header('Location: home.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>InBenta | Register</title>
</head>
<body>
    <div class="shadow index_container">
        <div class="welcome_container">
            <h1 class="logo">Welcome to InBenta!</h1>
            <p>View, add, edit, and search store in your browser!</p>
        </div>
        <div class="shadow form_container">
            <h2>Register</h2>
            <form method="post">
                <input class="shadow hover" type="text" name="store_name" placeholder="Store Name" required autocomplete="off"><br>
                <input class="shadow hover" type="text" name="username" placeholder="Username" required autocomplete="off"><br>
                <input class="shadow hover" type="email" name="email" placeholder="Email" required autocomplete="off"><br>
                <input class="shadow hover" type="password" name="password" placeholder="Password" required autocomplete="off"><br>

                <input class="shadow btn_primary hover" type="submit" name="register" value="Register">
            </form>
            <p>Already have an account? <a href="index.php">Login</a></p>
            <a href="store_list.php" class="shadow btn_primary hover">Login as Guest</a>
        </div>
    </div>
</body>
</html>