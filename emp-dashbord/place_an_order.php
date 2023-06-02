
<?php
  
  require "../Landing/db_connect.php";

  //get values from form
  if($_SERVER['REQUEST_METHOD'] == "POST"){

    $order_type = $_POST['order-type'];
    $material_type_1 = $_POST['$material_type_1'];
    $material_type_2 = $_POST['$material_type_2'];
    $material_type_3 = $_POST['$material_type_3'];
    $color_code_1 = $_POST['color_code_1'];
    $color_code_2 = $_POST['color_code_2'];
    $color_code_3 = $_POST['color_code_3'];
    $collar = $_POST['collar'];
    $quantity = $_POST['quantity'];
    $order_deadline = $_POST['order-deadline'];
    $description = $_POST['description'];

    //insert data into database

    $sql = "INSERT INTO order_details (Order_Type, Type1, Type3, Type2, Color_1, Color_2, Color_3, collar, Quantity, Delivery_date, Description ) VALUES ('$order_type', '$material_type_1', '$material_type_2', '$material_type_3', '$color_code_1', '$color_code_2', '$color_code_3', '$collar', '$quantity', '$order_deadline', '$description')";

    //run sql command

    if($conn->query($sql) == TRUE){
      
      //write a script to alert the user that the order has been placed successfully
      echo "<script>alert('Order Placed Successfully!')</script>";
    }
    else{

      //write a script to altert user that the order has not been placed successfully
      echo "<script>alert('Order Not Placed Successfully!')</script>";
    }

    $conn->close();




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
    <link rel="stylesheet" href="./update_details.css">


    <style>
        #clock {
  text-align: center;
  font-family: "Oswald", sans-serif;
  font-weight: 300;
  font-size: 1.5rem;
  padding-top: 5vh;
  display: flex;
  justify-content:center;
  align-items:start;
  background-color: #ffffff;
  height: 2vh;;
}

.form-container {
              padding: 20px;
              border-radius: 50px;
              margin: 0 auto;
              width: 80rem;
              display: flex;
              flex-wrap: wrap;
              justify-content: space-between;
              box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.9);
              margin-top: 2rem;
              height: 32rem;
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

            .view-order-details{

              padding: 20px;
            }

            .view-order-details h3{
              padding: 20px;
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
            <div class="sidebar" >
              <a href="#">
                  <span class="material-icons-sharp">grid_view</span>
                  <h3>Dashboard</h3>
              </a>
              <a href="./place_an_order.html" >
                  <span class="material-icons-sharp">person_outline </span>
                  <h3>Place Order</h3>
              </a>
              <a href="./update_details.html">
                  <span class="material-icons-sharp">receipt_long</span>
                  <h3>Update Details</h3>
              </a>
              <a href="#">
                  <span class="material-icons-sharp">insights</span>
                  <h3>Review Us</h3>
              </a>
              <a href="#">
                  <span class="material-icons-sharp">logout </span>
                  <h3>logout</h3>
              </a>

          </div>
        </aside>
        <!---------------- END OF ASIDE---------------->
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
                        <p>Hey, <b>Daniel</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="./images/profile-1.jpg">
                    </div>
                </div>
            </div>
            
          <h2 class="form-heading" >Place your order here</h2>
          
          <div class="form-container">
            <div class="left-align">
              <form method="POST">
                
                
                  <label for="order-type">Select Order Type:</label>
                  <select id="order-type" name="order-type">
                  <option value="standard">Standard</option>
                  <option value="express">Express</option>
                  <option value="custom">Custom</option>
                  </select>
          
                  <br><br>
          
                  <label for="material-type">Select Material Type:</label>
                  <select id="material-type" name="material-type-1">
                  <option value="cotton">Cotton</option>
                  <option value="silk">Silk</option>
                  <option value="polyester">Polyester</option>
                  <option value="wool">Wool</option>
                  </select>
                
                  <label for="material-type">Select Material Type:</label>
                  <select id="material-type" name="material-type-2">
                  <option value="cotton">Cotton</option>
                  <option value="silk">Silk</option>
                  <option value="polyester">Polyester</option>
                  <option value="wool">Wool</option>
                  </select>

                  <label for="material-type">Select Material Type:</label>
                  <select id="material-type" name="material-type-3">
                  <option value="cotton">Cotton</option>
                  <option value="silk">Silk</option>
                  <option value="polyester">Polyester</option>
                  <option value="wool">Wool</option>
                  </select>
          
                  <br><br>
          
                  <label for="color-code">Color Code 1:</label>
                  <input type="color" id="color-code" name="color-code-1">
          
                  <br><br>

                  <label for="color-code">Color Code:</label>
                  <input type="color" id="color-code" name="color-code2">
          
                  <br><br>

                  <label for="color-code">Color Code:</label>
                  <input type="color" id="color-code" name="color-code3">
          
                  <br><br>

          
                  <br><br>
                     
                  <label for="embroidered">Embroidered:</label>
                  <input type="radio" id="embroidered-yes" name="embroidered" value="yes">
                  <label for="embroidered-yes">Yes</label>
                  <input type="radio" id="embroidered-no" name="embroidered" value="no">
                  <label for="embroidered-no">No</label>

                  <label for="collar">Collar:</label>
                  <select id="collar" name="collar">
                  <option value="round">Round</option>
                  <option value="v-neck">V-neck</option>
                  <option value="polo">Polo</option>
                  <option value="button-down">Button-down</option>
                  </select>

                  <label for="qty">Quantity</label>
                  <input type="text" name = "quantity">
                
                  <label for="order-deadline">Order Deadline:</label>
                  <input type="date" id="order-deadline" name="order-deadline">
          
                  <br><br>
          
                  <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" cols="50"></textarea>
                <br><br>
              <input type="submit" value="Place Order">
            </form>
          </div>
          </div>

            
          



          <div class="view-order-details">

            <h3> <a href="./display_order.html"> <span class="material-icons-sharp">arrow_back</span>View Previous orders</a></h3>

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