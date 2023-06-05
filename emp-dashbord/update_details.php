<?php
//start session
session_start();
require "../Landing/db_connect.php";

//send data to database when button is clicked

if (isset($_POST['submit'])) {

  $fullName = $_POST['FullName'];
  $email = $_POST['Email'];
  $Gender = $_POST["Gender"];
  $Haddress = $_POST['HomeAddress'];
  $Daddress = $_POST['DeliveryAddress'];
  $phone = $_POST['PhoneNumber'];


  $sql = "UPDATE `register_user` SET `username`='$fullName',`email`='$email',`Gender`='$Gender',`HAddress_lane``='$Haddress',`D_address_lane`='$Daddress',`Emp_Phone`='$phone' WHERE `User_id` = '$_session[userid]'";

  //run sql query
  $result = mysqli_query($conn, $sql);

  //check if query ran successfully
  if ($result) {
    echo "<script>alert('Details Updated Successfully')</script>";
    header("location: ../emp-dashbord/dashboard.php");
  } else {
    echo "<script>alert('Details Update Failed')</script>";
  }

}

?>

<!-- // $password = $_POST['Password'];
// //hash this password using md5
// $password = md5($password);

// $newpassword = $_POST['new-password'];
// //hash this password using md5
// $newpassword = md5($newpassword);

// $cpassword = $_POST['re-new-password'];
// //hash this password using md5
// $cpassword = md5($cpassword);

// //check if current password is correct
// $sql = "SELECT * FROM `register_user` WHERE `User_id` = '$_session[userid]' AND `Passwords` = '$password'";
// $result = mysqli_query($conn, $sql);
// $resultCheck = mysqli_num_rows($result);

// if($resultCheck < 1){
//   echo "<script>alert('Incorrect Password')</script>";
//   exit();
// }

// //check if new password and confirm password match
// if($newpassword != $cpassword){
//   echo "<script>alert('Password does not match')</script>";
//   exit();
// } -->




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

  <!---------CSS ----------->
  <link rel="stylesheet" href="update_details.css">




  <style>
    #clock {
      text-align: center;
      font-family: "Oswald", sans-serif;
      font-weight: 300;
      font-size: 1.5rem;
      padding-top: 5vh;
      display: flex;
      justify-content: center;
      align-items: start;
      background-color: #ffffff;
      height: 2vh;
      ;
    }

    .form-container {
      padding: 20px;
      border-radius: 50px;
      margin: 0 auto;
      width: 60rem;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.9);
      margin-top: 2rem;
      height: 42rem;
    }

    .form-container>div {
      width: calc(50% - 10px);
    }

    .left-align {
      text-align: left;
    }

    .right-align {
      text-align: right;
    }

    h2 {
      text-align: center;
      margin-top: 0;
      font-family: Georgia, Arial, Helvetica;
      font-size: 45px;
      font-weight: bold;
      color: #333;
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
      background-color: #2a972e;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 14px;
    }

    input[type="submit"]:hover {
      background-color: #2a972e;
    }
  </style>


</head>

<body>


  <div class="container">

    <aside>
      <div class="top">
        <div class="logo">
          <img src="./images/logo.png">
          <h2 class="title">Fashion<span class="danger"></span>Treak</h2>
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
        <a href="#">
          <span class="material-icons-sharp">insights</span>
          <h3>Review Us</h3>
        </a>
        <a href="../Landing/login.php">
          <span class="material-icons-sharp">logout </span>
          <h3>logout</h3>
        </a>

      </div>
    </aside>





    <main>
      <div class="right">
        <div class="top">
          <button id="menu-btn">
            <span class="material-icons-sharp">menu</span>
          </button>
          <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
          </div>
          <div class="profile">
            <div class="info">
              <p>Hey, <b>
                  <?php
                  echo $_SESSION['username'];
                  ?>
                </b></p>
              <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
              <img src="./images/profile-1.jpg">
            </div>
          </div>
        </div>
      </div>
      <!---------------- END OF ASIDE---------------->



    <h2 class="form-heading">Update Details</h2>

      <div class="form-container">


        <form method="POST">

          <d class="left-align">

            <!-- get data from database as a array from register_user-->
            <?php
            $sql = "SELECT * FROM register_user WHERE User_id = $_SESSION[userid]";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <label for="Full name">Full Name</label>
            <input type="text" name="FullName" <?php
            echo "value = $row[username]";
            ?>>


            <br>

            <label for="Email">Email</label>
            <input type="text" name="Email" <?php
            echo "value = $row[email]";
            ?>>

            <label for="DOB">Date Of Birth</label>
            <input type="date" name="DOB" <?php
            echo "value = $row[DOB]";
            ?>>

            <label for="Gender">Gender</label>
            <input type="radio" name="Gender" value="Male"> Male
            <input type="radio" name="Gender" value="Female"> Female

            <br><br>

            <label for="Home address">Home Address</label>
            <input type="text" name="HomeAddress" <?php
            echo "value = $row[HAddress_lane]";
            ?>>

            <br><br>

            <label for="color-code">delivery Address</label>
            <input type="text" name="DeliveryAddress" <?php
            echo "value = $row[D_address_lane]";
            ?>>

            <br><br>

            <label for="Phone_Number">Phone Number</label>
            <input type="text" name="PhoneNumber" <?php
            echo "value = $row[Phone]";
            ?>>

            <br><br>
            <br><br>
            <input style="margin-left: 15rem;" type="submit" value="Update Details">
        </form>
      </div>
  </div>

  </main>
  <!-------------------------------------- END OF MAIN---------------------------------------->



  <!---------END OF RIGHT TOP---------->

  <!-- !if somthing needed for right side add here -->
  </div>

  </div>

  <script src="script.js"></script>
</body>

</html>