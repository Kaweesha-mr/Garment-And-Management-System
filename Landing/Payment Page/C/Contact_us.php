<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css" />
    
  </head>
  <body>
    <div class="container">
      <div class="content">
        <div class="left-side">
          <div class="address details">
            <i class="fas fa-map-marker-alt"></i>
            <div class="topic">Address</div>
            <div class="text-one">No 34/56</div>
            <div class="text-two"> Janapriya Mawatha , Colombo</div>
          </div>
          <div class="phone details">
            <i class="fas fa-phone-alt"></i>
            <div class="topic">Phone</div>
            <div class="text-one">+9477347822</div>
            <div class="text-two">+9470445777</div>
          </div>
          <div class="email details">
            <i class="fas fa-envelope"></i>
            <div class="topic">Email</div>
            <div class="text-one">codinglab@gmail.com</div>
            <div class="text-two">info.codinglab@gmail.com</div>
          </div>
        </div>
        <div class="right-side">
          <div class="topic-text">CONTACT US</div>
          <p> Send a your massage </p>
          <form action="#">
            <div class="input-box">
              <input type="text" placeholder="Enter your ID" />
            </div>
            <div class="input-box">
              <input type="text" placeholder="Enter your email" />
            </div>
            <div class="input-box message-box">
              <textarea placeholder="Enter your message"></textarea>
            </div>
            <div class="button">
              <input type="button" value="Send Now" />
            </div>
          </form>
        </div>
      </div>
    </div>

     
    <?php
require 'Conn.php';

if (isset($_POST['submitcontactUs'])) {


    $id = $_POST["ID"];
    $email = $_POST["Email"];
    $message = $_POST["Message"];
   
    $sql = "INSERT INTO contact (ID, Email, Message)
	 VALUES ('$id', '$email', '$message')";

    if ($conn->query($sql)) {
        echo "<script> alert('Records added successfully !!!!')</script>";
        header("location:Cdisplay.php");
    } else {
        echo "<script> alert('ERROR: could not able to execute the query. ')</script>";
        echo $sql;
    }
}
?>


  </body>
</html>
