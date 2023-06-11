<?php
//include db_connect.php file for database connection
require 'db_connect.php';

//destroy previous session
unset($_SESSION['username']);
unset($_SESSION['userid']);
$_SESSION['loggedin'] = false;

session_start();


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];


    // todo: multi login system coding

    // get user id for username from database
    $sql = "SELECT `User_id` FROM `register_user` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);
    if ($result[0] == null) {
        //get user id for username from database
        $sql = "SELECT `AdminId` FROM `admin` WHERE `username_ADN` = '$username'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result);
    }

    //check if username 1st 3 letters contain prefix USR
    $prefix = substr($result[0], 0, 3);

    //prinr prefix using script
    echo '<script>alert("' . $prefix . '")</script>';

    //if prefix is USR then login as user
    if ($prefix == "USR") {

    //get the password in the database
    $sql = "SELECT `Passwords` FROM `register_user` WHERE `username` = '$username'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);


    //store result in a variable
    $result = $result[0];

    //verify the password
    $verify = password_verify($password, $result);

    //script to print veriify
    echo '<script>alert("' . $verify . '")</script>';

    //if password is verifyied then login
    if ($verify == 1) {
        //create a js alert to say successfully registered
        echo '<script>alert("Successfully Logged In")</script>';

        //session to login user
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        //get user id from user id
        $sql = "SELECT User_id FROM `register_user` WHERE `username` = '$username'";

        //run the query and print output using script
        $result = mysqli_query($conn, $sql);

        //get the value os result array and store it in a variable
        $result = mysqli_fetch_array($result);

        //store the resluts in session names userid
        $_SESSION['userid'] = $result[0];

        //print the userid using script
        echo '<script>alert("' . $_SESSION['userid'] . '")</script>';

        //redirect to dashboard in emp-dashbord file
        header("location: ../emp-dashbord/dashboard.php");
    }
    else {
        //create a js alert to say error
        echo '<script>alert("Invalid Username or Password")</script>';
    }
    }//if prefix is ADN then login as admin
    else if ($prefix == "ADN") {

        // !thilin's login system

        //get the password in the database
    $sql = "SELECT `Password` FROM `admin` WHERE `username_ADN` = '$username'";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);


    //store result in a variable
    $result = $result[0];

    //verify the password
    $verify = password_verify($password, $result);

    //if password is verifyied then login
    if ($verify == 1) {

        //create a js alert to say successfully registered
        echo '<script>alert("Successfully Logged In")</script>';

        //session to login user
        $_SESSION['ADNloggedin'] = true;
        $_SESSION['ADNusername'] = $username;

        //get user id from user id
        $sql = "SELECT AdminId FROM `admin` WHERE `username_ADN` = '$username'";

        //run the query and print output using script
        $result = mysqli_query($conn, $sql);

        //get the value os result array and store it in a variable
        $result = mysqli_fetch_array($result);

        //store the resluts in session names userid
        $_SESSION['userid'] = $result[0];


        //redirect to dashboard in emp-dashbord file
        header("location: ../admin_db-thilina/dashboard.php");
    }
    else {
        //create a js alert to say error
        echo '<script>alert("Invalid Username or Password")</script>';
    }


        //!thilin's login system ended
    }
    else {
        //create a js alert to say error
        echo '<script>alert("Invalid Username or Password")</script>';
    }


    //todo multi login system coding ended


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
        <header>Login<h2>Login to explore more</h2>
        </header>

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