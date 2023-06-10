
<?php

  //start session
  session_start();
  
  require "../Landing/db_connect.php";
  //auto logout when user is inactive
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 30)) {
  // last request was more than 30 minutes ago
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
  header("location: ../Landing/login.php");
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


  //check if user is logged in
  if(!isset($_SESSION['userid'])){
    header("Location: ../Landing/login.php");
    exit();
  }

  //update values of database when button is clicked

  if(isset($_POST['submit'])){

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

    if($result){
      echo "<script>alert('Details Updated Successfully')</script>";
    }
    else{
      echo "<script>alert('Details Not Updated')</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

    <!---------CSS ----------->
    <link rel="stylesheet" href="place_order.css">


    <style>
        #clock {
  text-align: center;
  font-family: "Oswald", sans-serif;
  font-weight: 300;
  font-size: 1.5rem;
  padding-top: 5vh;
  display: flex;
  justify-content:flex-start;
  align-items:start;
  background-color: #ffffff;
  height: 2vh;;
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
              height: 35rem;
            }
          
            .form-container > div {
              width: calc(50% - 10px);
            }

            .form-container > form{
              
            }
          
            .left-align {
              text-align: left;
            }
          
            .right-align {
              text-align: right;
            }
          

            
            form{

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

            .view-order-details{

              padding: 20px;
            }

            .view-order-details h3{
              padding: 20px;
            }

            .btn-submit{

              /* get this button to center inside form tag */
              margin-left: 26rem;

            }
            h2 {
              text-align: center;
              margin-top: 0;
              font-family: Georgia, Arial, Helvetica;
              font-size: 1.4rem;
              font-weight: bold;
              color: #333;
            }

    </style>


</head>

<body>



    <div class="container">

        <aside>
        <div class="top">
                <div class="logo">
                    <img src="./images/logo.png">
                    <h2>Fashion<span class="danger"></span>Treak</h2>
                </div>
            </div>
            <div class="sidebar" >
              <a href="dashboard.php">
                  <span class="material-icons-sharp">grid_view</span>
                  <h3>Dashboard</h3>
              </a>
              <a href="./place_an_order.php" >
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
        <!---------------- END OF ASIDE---------------->
        <main>
            
          <h2 class="form-heading" >Update Details</h2>
          
          <div class="form-container">
            <div class="left-align">
              <form method="POST">
                
                  <?php

                    $sql = "SELECT * FROM register_user WHERE User_id = '$_SESSION[userid]'";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                  ?>

                  <label for="Username">Username</label>
                  <input type="text" name="username" value= <?php 
                    echo $row['username'];
                  ?>
          
                  <br><br>
          
                  <label for="Email" required>Email</label>
                  <input type="text" name="email" value= <?php
                    echo $row['email'];
                  
                  ?>
                
                  <label for="DOB">Date of Birth</label>
                  <input type="date" name="DOB" value= <?php 
                    echo $row['DOB'];
                  ?>

                  <label for="Phone Number">Phone Number</label>
                  <input type="text" name="Phone"value= <?php 
                    echo $row['Phone'];
                  ?>

                  <br><br>
          
                  <label for="Home Address" >Home Address</label>
                  <!-- for home address -->
                  <input type="text" name="home-address" id="home-address" cols="30" rows="5" value="<?php 
                    echo $row['HAddress_lane'];
                  ?>"></input>
                  
                  <label for="delivary Address" >Delivery Address</label>
                  <!-- for home address -->
                  <input type="text" name="delivary-address" id="Delivery Address" cols="30" rows="5" value=
                  <?php
                    echo $row['D_address_lane'];
                  ?>
                  >
                </input>
                <br><br>
                <input type="submit" name="submit" value="Update" class="btn-submit">
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
                    <span class="material-icons-sharp dark" onclick="darkmode()" >dark_mode</span>
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
            <!---------END OF RIGHT TOP---------->

            <!-- !if somthing needed for right side add here -->
        </div>

            <!-- !if somthing needed for right side add here -->
        </div>

    </div>

<script src="script.js"></script>
<SCript>
  function lightmode(){
    //remove class active
    document.querySelector('.light').classList.add('active');
    document.querySelector('.dark').classList.remove('active');
}
function darkmode(){
    //remove class active
    document.querySelector('.dark').classList.add('active');
    document.querySelector('.light').classList.remove('active');
  }
</SCript>
</body>

</html>