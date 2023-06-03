
<?php

session_start();
require "../Landing/db_connect.php";

$sql = "SELECT Order_Id,Emp_Id,Type1,Type2,Type3,Color_1,Color_2,Color_3,Quantity,Delivery_date,Total FROM `order_tbl`;";

//run sql query and store in result variable
$result = mysqli_query($conn, $sql);


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
    <link rel="stylesheet" href="./display_order.css">


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
              box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.9);
              margin-top: 2rem;
              height: 40rem;
              overflow: hidden;
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


            /* style the table inserted */
            .table-container {
              width: 100%;
              overflow-x: auto;
            }

            table{
              background: var(--color-white);
              width: 100%;
              border-radius: var(--card-border-radius);
              padding: var(--card-padding);
              text-align: center;
              box-shadow: var(--box-shadow);
              border-right: 2px solid #500072;
              border-bottom:2px solid #500072; 
              border-radius: 30px;
              transition: all 300ms ease;
}

            table:hover{
                box-shadow: none;
              }
            table tbody td{
              height: 2.8rem;
              border-bottom: 1px solid var(--color-light);
              color: var(--color-dark-variant);
              transition: all 300ms ease;
            }

            table tbody tr:last-child td{
              border: none;
            }


            .table thead th {
              padding: 15px;
              background-color:#4d2d52;
              color: #fff;
              text-align: center;
              font-weight: 500;
              font-size: 12px;
              text-transform: uppercase;
            }


            .left-corner-top{
                border-radius: 20px 0 0 0;
            }

            .right-corner-top{
                border-radius: 0 20px 0 0;
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
            
          <h2 class="form-heading" >Previous Orders</h2>

          <div class="form-container"> 

            <!-- add modern table with inline css -->

            <div class="table-container">
              <table class="table">
                <thead>
                  <tr>
                    <th class="left-corner-top">Order ID</th>
                    <th>Employee_Id</th>
                    <th>Type #1</th>
                    <th>Type #2</th>
                    <th>Type #3</th>
                    <th>Color #1</th>
                    <th>Color #2</th>
                    <th>Color #3</th>
                    <th>Quantity</th>
                    <th>Delivary date</th>
                    <th>Order Total</th>
                    <th class="right-corner-top">Order Details</th>
                  </tr>
                </thead>
                
                <tbody>
                  <tr>
                  
                  <?php
                    //get data from database to table using fetch assoc
                      while($row = mysqli_fetch_assoc($result)){
                  ?>
                      <td><?php echo $row['Order_Id']; ?></td>
                      <td><?php echo $row['Emp_Id']; ?></td>
                      <td><?php echo $row['Type1']; ?></td>
                      <td><?php echo $row['Type2']; ?></td>
                      <td><?php echo $row['Type3']; ?></td>
                      <td><?php echo $row['Color_1']; ?></td>
                      <td><?php echo $row['Color_2']; ?></td>
                      <td><?php echo $row['Color_3']; ?></td>
                      <td><?php echo $row['Quantity']; ?></td>
                      <td><?php echo $row['Delivery_date']; ?></td>
                      <td><?php echo $row['Total']; ?></td>
                      <td><a href="#"> <span style="color: red;" class="material-icons-sharp">delete</span> </a> <a href="#"> <span style="color: #2a972e;" class="material-icons-sharp">update</span> </a> </td> 
                    </Tr>
                  <?php
                    }
                  
                  ?>
                </tbody>
                </table>
          </div>
          
        </div>
        <div class="view-order-details">

          <h3> <a href="./place_an_order.php"> <span class="material-icons-sharp">arrow_back</span>Back to orders</a></h3>

        </div>
            
        </main>
        <!-------------------------------------- END OF MAIN---------------------------------------->
        </div>

    </div>

<script src="script.js"></script>
</body>

</html>XX