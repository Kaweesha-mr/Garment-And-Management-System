<?php

//start session
session_start();

require "../Landing/db_connect.php";

if (!isset($_SESSION['userid']) && !isset($_SESSION['username'])) {
  header("location: ../Landing/login.php");
}

//auto logout when user is inactive
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
  // last request was more than 30 minutes ago
  session_unset(); // unset $_SESSION variable for the run-time 
  session_destroy(); // destroy session data in storage
  header("location: ../Landing/login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


//check if user is logged in
if (!isset($_SESSION['userid'])) {
  header("Location: ../Landing/login.php");
  exit();
}

//update values of database when button is clicked

if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $DOB = $_POST['DOB'];
  $phone = $_POST['Phone'];
  //home address
  $Haddress = $_POST['home-address'];
  $Daddress = $_POST['delivary-address'];

  $_SESSION['username'] = $username;


  //sql query to update values 
  $sql = "UPDATE register_user SET username = '$username', email = '$email', DOB = '$DOB', Phone = '$phone', HAddress_lane = '$Haddress', D_address_lane = '$Daddress' WHERE User_id = '$_SESSION[userid]'";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script>alert('Details Updated Successfully')</script>";
  } else {
    echo "<script>alert('Details Not Updated')</script>";
  }
}




if (isset($_POST['update-pw'])) {
  $oldpassword = $_POST['oldpassword'];
  //get password from database
  $sql = "SELECT * FROM register_user WHERE User_id = '$_SESSION[userid]'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $password = $row['Passwords'];

  //check oldpassword and password is same
  if (password_verify($oldpassword, $password)) {

    $newpassword = $_POST['new-password'];
    $confirmpassword = $_POST['confirm-password'];

    //check new password and confirm password is same
    if ($newpassword == $confirmpassword) {
      //hash new password using password hash
      $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
      $sql = "UPDATE register_user SET Passwords = '$newpassword' WHERE User_id = '$_SESSION[userid]'";
      $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('Password Updated Successfully')</script>";
      } else {
        echo "<script>alert('Password Update Failed')</script>";
      }
    } else {
      echo "<script>alert('New Password and Confirm Password is not same')</script>";
    }

  } else {
    echo "<script>alert('Old Password is Wrong')</script>";
  }

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update your Details</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

  <!---------CSS ----------->
  <link rel="stylesheet" href="place_order.css">

  <!-- import poppins font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">


  <style>
    #clock {
      text-align: center;
      font-family: "Oswald", sans-serif;
      font-weight: 300;
      font-size: 1.5rem;
      padding-top: 5vh;
      display: flex;
      justify-content: flex-start;
      align-items: start;
      background-color: #ffffff;
      height: 2vh;
      ;
    }

    .form-container {
      padding: 20px;
      border-radius: 50px;
      margin: 0 auto;
      width: fit-content;
      display: flex;
      flex-wrap: wrap;
      justify-content: flex-start;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.9);
      margin-top: 2rem;
      height: 38rem;
    }

    .form-container>div {
      width: calc(50% - 10px);
    }

    .form-container>form {}

    .left-align {
      text-align: left;
    }

    .right-align {
      text-align: right;
    }



    form {

      width: 60rem;
      padding-left: 0;
    }

    select,
    input[type="text"],
    input[type="date"],
    textarea {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 13px;
      box-sizing: border-box;
      font-size: 14px;
      margin-bottom: 10px;
    }

    input[type="radio"] {
      margin-right: 5px;
    }

    input[type="submit"] {
      font-family: "Poppins", sans-serif;
      background-color: #2a972e;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 14px;
    }

    input[type="submit"]:hover {
      background-color: purple;
    }

    .view-order-details {

      padding: 20px;
    }

    .view-order-details h3 {
      padding: 20px;
    }

    .btn-submit {
      /* get this button to center inside form tag */
      margin-left: 3rem;

    }

    h2 {

      text-align: center;
      margin-top: 0;
      font-family: 'Poppins', sans-serif;
      font-size: 1.4rem;
      font-weight: bold;
      color: #333;
    }

    main>.popup>.hide-resetpassword>form {

      width: 25rem;
      border-radius: 20px;
      padding: 30px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      /* !Glass effect is added here */
      background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
      backdrop-filter: blur(10px);
      -webkit-backdrop-filter: blur(10px);
      border-radius: 20px;
      border: 1px solid rgba(255, 255, 255, 0.18);
      box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
    }

    main>.popup>.hide-resetpassword>form>label {
      font-size: 1.2rem;
      font-weight: 500;
      color: #333;
      margin: 2px;
    }

    main>.popup>.hide-resetpassword>form>input {
      height: 2rem;
      border-radius: 10px;
      margin: 1px;
      width: 20rem;
      background-color: rgba(1, 1, 1, 0.14);
      border: 1px solid black;
      font-size: 20px;

    }

    main>.popup>.hide-resetpassword>form>button {

      font-family: 'Poppins', sans-serif;
      font-size: 1.2rem;
      height: 4rem;
      border-radius: 30px;
      margin: 7px;
      width: 20rem;
      background-color: black;
      border: 1px solid black;
      color: white;
    }

    main>.popup>.hide-resetpassword>form>button:hover {
      background-color: #333;
      border: 1px solid #333;
      color: white;
    }

    /* add class blur */
    .blur {
      filter: blur(5px);
      transition: all 0.5s ease-in-out;
    }

    main>.popup {

      z-index: 20;
      position: absolute;
      top: 10rem;
      left: 40rem;
      margin-left: 120px;
      opacity: 0.9;
      transition: all 1s ease-in-out;
    }

    main>.blur {
      filter: blur(5px);
    }

    main>.hide {
      display: none;
    }

    .show {
      display: block;
    }

    .material-icons-sharp {
      font-weight: bolder;
    }

    main>.popup {

      display: none;
    }

    main>.popup>.hide-resetpassword>form>.close {

      margin-left: 20rem;
      cursor: pointer;
      transition: all 1s ease-in-out;
    }

    main>.form-container>form>.buttons {
      display: flex;
    }

    .btn-update {
      border: 1px solid transparent;
      border-radius: 10px;
      padding: 10px;
      background-color: forestgreen;
      color: white;
      font: 1rem 'Poppins', sans-serif;
      cursor: pointer;
    }
  </style>


</head>

<body>



  <div class="container">

    <aside>
      <div class="top">
        <div class="logo">
          <img src="./images/Logo.png">
          <h2>Fashion<span class="danger"></span>Treak</h2>
        </div>
      </div>
      <div class="sidebar">
        <a href="dashboard.php">
          <span class="material-icons-sharp">grid_view</span>
          <h3>Dashboard</h3>
        </a>
        <a href="./place_an_order.php">
          <span class="material-icons-sharp">person_outline </span>
          <h3>Place Order</h3>
        </a>
        <a href="./update_details.php">
          <span class="material-icons-sharp">receipt_long</span>
          <h3>Update Details</h3>
        </a>
        <a href="./review_page/review.html">
          <span class="material-icons-sharp">insights</span>
          <h3>Review Us</h3>
        </a>
        <a href="../Landing/login.php">
          <span class="material-icons-sharp">logout </span>
          <h3>logout</h3>
        </a>

      </div>
    </aside>
    <!---------------- END OF ASIDE---------------->
    <main>

      <h2 class="form-heading">Update Details</h2>

      <div class="form-container">
        <div class="left-align">
          <form method="POST">

            <?php

            $sql = "SELECT * FROM register_user WHERE User_id = '$_SESSION[userid]'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <label for="Username">Username</label>
            <input type="text" name="username" value=<?php
            echo $row['username'];
            ?>>

            <br><br>

            <label for="Email" required>Email</label>
            <input type="text" name="email" value=<?php
            echo $row['email'];

            ?>>

            <label for="DOB">Date of Birth</label>
            <input type="date" name="DOB" value=<?php
            echo $row['DOB'];
            ?>>

            <label for="Phone Number">Phone Number</label>
            <input type="text" name="Phone" value=<?php
            echo $row['Phone'];
            ?>>

            <br><br>

            <label for="Home Address">Home Address</label>
            <!-- for home address -->
            <input type="text" name="home-address" id="home-address" cols="30" rows="5" value="<?php
            echo $row['HAddress_lane'];
            ?>"></input>

            <label for="delivary Address">Delivery Address</label>
            <!-- for home address -->
            <input type="text" name="delivary-address" id="Delivery Address" cols="30" rows="5" value=<?php
            echo $row['D_address_lane'];
            ?>>
            </input>
            <br><br>
            <span class="buttons" style="display:flex; justify-content:space-evenly;">

              <input type="submit" name="submit" value="Update" class="btn-submit"></input>

              <input type="button" class="btn-update" onclick="pop_up()" value="Update_Password"></input>

            </span>

          </form>
        </div>
      </div>


      <div id="popup" class="popup">
        <div class="hide-resetpassword">
          <form method="post">

            <span class="material-icons-sharp close" onclick="close_UP()">close</span>
            <h2>Update Password</h2>
            <!-- icon to close -->

            <label for="Current-Password">Current Password</label>
            <input type="password" name="oldpassword" value="">
            <br><br>
            <label for="New-Password">New Password</label>
            <input type="password" name="new-password" value="">
            <br><br>
            <label for="Confirm-Password">Confirm Password</label>
            <input type="password" name="confirm-password" value="">
            <br><br>

            <button type="submit" name="update-pw" value="update-pw">Update Password</button>
          </form>

        </div>
      </div>
    </main>
    <!-------------------------------------- END OF MAIN---------------------------------------->

    <div class="right">
      <div class="top">
        <button id="menu-btn">
          <span class="material-icons-sharp">menu</span>
        </button>
        <div class="theme-toggler">
          <span class="material-icons-sharp light active" onclick="lightmode()">light_mode</span>
          <span class="material-icons-sharp dark" onclick="darkmode()">dark_mode</span>
        </div>
        <div class="profile">
          <div class="info">
            <p>Hey, <b>
                <?php
                echo $_SESSION['username'];
                ?>
              </b></p>
            <small class="text-muted">
              <?php
              echo $_SESSION['userid'];
              ?>
            </small>
          </div>
          <div class="profile-photo">

            <?php

            //this is used to add a user male user photo for gender male users and female photo for gender female users
            $sql = "SELECT * FROM register_user where User_id = '$_SESSION[userid]';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {

              if ($row['Gender'] == 'male') {
                echo "<img src='./images/male.png'>";
              } else {
                echo "<img src='./images/female.jpg'>";
              }
            }

            ?>
          </div>
        </div>
      </div>
      <!---------END OF RIGHT TOP---------->

      <!-- !if somthing needed for right side add here -->
    </div>

    <!-- !if somthing needed for right side add here -->
  </div>

  </div>

  <script src="script.js"></script>
  <SCript>
    function lightmode() {
      //remove class active
      document.querySelector('.light').classList.add('active');
      document.querySelector('.dark').classList.remove('active');
    }
    function darkmode() {
      //remove class active
      document.querySelector('.dark').classList.add('active');
      document.querySelector('.light').classList.remove('active');
    }

    function close_UP() {
      document.getElementById("popup").style.display = "none";
      document.querySelector('.form-container').classList.remove('blur');
    }

    function pop_up() {
      //add hide class
      document.getElementById("popup").style.display = "block";
      //add class to body execpt popup
      document.querySelector('.form-container').classList.add('blur');
      //remove blur from popup
    }

  </SCript>
</body>

</html>