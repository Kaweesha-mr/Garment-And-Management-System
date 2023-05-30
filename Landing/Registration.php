<?php

session_start();

//include db_connect.php file for database connection
 require 'db_connect.php';
 
if($_SERVER['REQUEST_METHOD'] == "POST"){

  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];

  
  //check if password and re-password are same
  if($password != $rePassword){
    echo '<script>alert("Password and Re-Password are not same")</script>';
  }
  else{
    //check if email already exists
    $sql = "SELECT * FROM `register_user` WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      echo '<script>alert("Email already exists")</script>';
    }
  }

  //hash password and store in a new variable
  $password = md5($password);



    //send query if email,fullname,password,repassword are not empty
    $sql = "INSERT INTO `register_user` (`username`, `email`, `gender`, `HAddress_lane`, `password`) VALUES ('$fullName', '$email','$gender', '$address', '$password')";

    if($conn->query($sql)) {

      //create a js alert to say successfully registered
      echo '<script>alert("Successfully Registered")</script>';

      //redirect to login page
      header("Location: login.php");
    }
    else{
      //create a js alert to say error
      echo '<script>alert("Error")</script>';
    }

}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!--<title>Registration Form in HTML CSS</title>-->
    <!---Custom CSS File--->
    <link rel="stylesheet" href="./css/registration.css" />
  </head>
  <body>



    <section class="container">
      <header>FasionTreak Garments <h2>Join with us</h2> </header>
      <form action="" class="Register-form" method=POST>
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" name="fullName" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" name="email" required />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" placeholder="Enter phone number" name="phone" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" placeholder="Enter birth date" required />
          </div>

        </div>

        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender"  />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" />
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>

        
        <div class="input-box address">
          <label>Address</label>
          <input type="text" name="Haddress" placeholder="Enter Home address" required />
          <input type="text" name="Daddress" placeholder="Enter dilivary address" required />
        </div>

        
        <div class="input-box password">
            <label>Enter Password</label>
            <input type="password"  name="password" placeholder="Enter Password" required>
            <label>Re-Enter Password</label>
            <input type="password" name="rePassword" placeholder="Re-Enter Password" required>
        </div>
        
        <button>Register</button>
      
      </form>
    </section>
  </body>
</html>