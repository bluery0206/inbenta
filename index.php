<?php
    include('database.php');

    $err = "";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $sql="SELECT * FROM inbenta_users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if(!empty($row = mysqli_fetch_assoc($result))){
            $db_password = $row['password'];

            if(password_verify($password, $db_password)){
                session_start();
                $_SESSION['logged-in'] = $username;
                header('Location: home.php' );
            }
            else{
                $err = "Wrong password.";
            }
        }
        else{
            $err = "User not registered.";
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
    <title>InBenta | Login Page</title>
</head>
<body>
    <div class="shadow index_container">
        <div class="welcome_container">
            <h1 class="logo">Welcome to InBenta!</h1>
            <p>View, add, edit, and search store in your browser!</p>
        </div>
        <div class="shadow form_container">
            <h2>Login</h2>
            <form method="PoST">
                <input class="shadow hover" type="text" name="username" placeholder="Username" required autocomplete="off"><br>
                <input class="shadow hover" type="password" name="password" placeholder="Password" required autocomplete="off"><br>

                <p class="err"><?php echo $err?></p>
                <input class="shadow hover btn_primary" type="submit" name="login" value="Login">
            </form>
            <p>Don't have an account? <a href="register.php">Register</a></p>
            <a href="store_list.php" class="shadow btn_primary hover">Login as Guest</a>
        </div>
    </div>
</body>
</html>