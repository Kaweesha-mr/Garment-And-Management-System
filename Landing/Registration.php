<?php

session_start();

//include db_connect.php file for database connection
 require 'db_connect.php';
 


if($_SERVER['REQUEST_METHOD'] == "POST"){

  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $dob = $_POST['dob'];
  $Haddress = $_POST['Haddress'];
  $Daddress = $_POST['Daddress'];
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];

    //hash password and store in a new variable
    $password = md5($password);

    //Hash rePassword and store in a new variable
    $rePassword = md5($rePassword);


   //check if password and repassword are same

  if($password != $rePassword){
    //create a js alert to say password and repassword are not same
     echo '<script>alert("Password and Re-Password are not same")</script>';

     //delete connection
      die();
 }


    //send query if email,fullname,password,repassword are not empty
    $sql = "INSERT INTO `register_user` (`username`, `email`, `Passwords`, `DOB`, `HAddress_lane`, `D_address_lane`) VALUES (' $fullName', '$email', '$password', '$dob','$Haddress', '$Daddress')";

    if($conn->query($sql)) {

      //create a js alert to say successfully registered
      echo '<script>alert("Successfully Registered")</script>';
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
    <title>Registration</title>

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
            <input type="date" placeholder="Enter birth date" required name="dob" />
          </div>

        </div>

        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" value="male"  />
              <label for="check-male">male</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" value="female" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-other" name="gender" value="no said"/>
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>

        
        <div class="input-box address">
          <label>Home Address</label>
          <input type="text" name="Haddress" placeholder="Enter Home address" required />
          <label> delivery Address</label>
          <input type="text" name="Daddress" placeholder="Enter dilivary address" />
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