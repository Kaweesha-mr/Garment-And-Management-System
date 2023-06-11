<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- insert g-icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- insert css -->
    <link rel="stylesheet" href="css/style.css">


</head>
<body>
    <!---------------------------------------- SIDEBAR BEGINING ------------------------------------------>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <!-- logo -->
                <img src="images/logo.jpeg" alt="company_logo" class="logoimg">
                <span>ABC Clothings</span>
            </div>
            <!-- menu btn -->
            <span class="material-symbols-rounded" id="btn">menu</span>
        </div>
        <div class="user">
            <img src="images/userIMG.jpg" alt="user_pic" class="userimg">
            <div>
                <p class="bold">
                <?php
                echo $_SESSION['ADNuserid']
                
                ?>
                </p>
                <p><?php
                    echo $_SESSION['ADNEmail'];
                ?></p>
            </div>
        </div>
        <ul>
            <li>
                <a href="dashboard.php">
                    <span class="material-symbols-rounded">grid_view</span>
                    <span class="nav_item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>
            <li>
                <a href="Empdashboard.php">
                    <span class="material-symbols-rounded">badge</span>
                    <span class="nav_item">Employeee</span>
                </a>
                <span class="tooltip">Employeee</span>
            </li>
            <li>
                <a href="orderpanal.php">
                    <span class="material-symbols-rounded">order_approve</span>
                    <span class="nav_item">Orders</span>
                </a>
                <span class="tooltip">Orders</span>
            </li>
            <li>
                <a href="#">
                    <span class="material-symbols-rounded">local_shipping</span>
                    <span class="nav_item">Transport</span>
                </a>
                <span class="tooltip">Transport</span>
            </li>
            <li>
                
            </li>
        </ul>
        <div class="logout">
            <a href="logout.php">
                <span class="material-symbols-rounded">logout</span>
                <span class="nav_item">Logout Now</span>
            </a>
            <span class="tooltip">Logout</span>
        </div>
    </div>
<!------------------------------------------- SIDEBAR END ------------------------------------------>

