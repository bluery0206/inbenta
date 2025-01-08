<?php
    include('database.php');
    session_start();
    $buttons = "";

    if(isset($_SESSION['logged-in'])){
        $buttons = "<a href='store_list.php' class=' hover btn_secondary'>Store List</a>
                    <a href='home.php' class='hover btn_secondary'>Home</a>
                    <form action='logout.php' method='get'>
                        <input class='hover btn_secondary' type='submit' name='logout' value='Logout'>
                    </form>
                    ";
    }
    else {
        $buttons = "<a href='store_list.php' class='hover btn_secondary'>Home</a>
                    <a href='index.php' class='hover btn_secondary'>Login</a>";
    }
?>
<header class="shadow">
    <h2 class="logo">InBenta</h2>
    <div class="navright">
        
        <?php echo $buttons; ?>
        
    </div>
</header>