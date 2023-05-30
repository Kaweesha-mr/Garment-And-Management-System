<?php

session_start();
//include db_connect.php file for database connection
 require 'db_connect.php';

 if($_SERVER['REQUEST_METHOD'] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    //!check hashed password inside the database is same with the password user entered
    $password = md5($password);

    //!query to check password and username are correct

    $sql = "SELECT * FROM `register_user` WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);


    if($result->num_rows > 0){
      //create script alert using script tag
        echo '<script>alert("Login Successful")</script>';
    }
    else{
      //!if username and password are incorrect, create a js alert
      echo '<script>alert("Username or Password is incorrect")</script>';
    }
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- connect style -->
    <!-- add icon library  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/Login.css">
</head>
<body>
    

    <div class="container">
        <header>Login<h2>Login to explore more</h2></header>
        
            <form class="login-form" method=POST>

                        <div class="input-box">        
                            <!-- add user icon -->
                            <i class="fas fa-user"></i>
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Enter your username" required>
                        </div>
    
                        <div class="input-box">
                            <!-- add lock icon -->
                            <i class="fas fa-lock"></i>
                            <label>Password</label> 
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        
                        <button>Login</button>

                        <span>If you Don't have an Account <a href="./Registration.php"> Sign Up</a> </span>
            </form>
        </div>
    </div>


</body>
</html>