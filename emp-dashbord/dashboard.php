<?php
require "../Landing/db_connect.php";
session_start();
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
    <link rel="stylesheet" href="dashboard.css">


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
    </style>


</head>

<body>

    <div class="container">


        <aside>
            <div class="top">
                <div class="logo">
                    <img src="./images/logo.png">
                    <h2 id="k">Fashion<span class="danger"></span>Treak</h2>
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
            <h1>dashboard</h1>
            <div class="insight">
                <div class="sales">
                    <span class="material-icons-sharp">analytics</span>
                    <div class="middle">
                        <div class="left">
                            <h2>No Of Orders</h2>
                            
                            <?php
                            
                            $sql = "SELECT * FROM order_tbl where User_Id = $_SESSION[userid];";

                            $result = mysqli_query($conn, $sql);

                            $resultCheck = mysqli_num_rows($result);

                            echo "<h1>$resultCheck</h1>";

                            ?>
                        </div>
                    </div>
                </div>
                <!---------------------- END OF SALES---------------->
                <div class="Expenses">
                    <div class="middle">
                        <div class="left">
                            <div id="clock">
                                <h1 id="date-time"></h1>
                            </div>
                        </div>
                    </div>
                </div>
                <!---------------------- END OF EXPENSES---------------->
                <div class="Income">
                    <span class="material-icons-sharp">stacked_line_chart</span>
                    <div class="middle">
                        <div class="left">
                            <h2>To be paid</h2>
                            
                            <?php
                                // //get sum of total value from order_tbl in database for session[userid]
                                $sqll = "SELECT SUM(Total) AS value_sum FROM order_tbl where User_Id = $_SESSION[userid];";

                                $resultt = mysqli_query($conn, $sqll);

                                $roww = mysqli_fetch_assoc($resultt);

                                $summ = $roww['value_sum'];

                                echo "<h1>RS.$summ</h1>";
                            ?>
                            
                        </div>
                    </div>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
                <!---------------------- END OF INCOME---------------->
            </div>
            <!------------------------- END OF INSIGHT----------------------------------->
            <div class="recent-orders">
                <h2>Recent orders</h2>
                <table>
                    <thead>
                        <tr>
                        <th>Order_Id</th>
                        <th>Employee_Id</th>
                        <th>Quantity</th>
                        <th>Delivary date</th>
                        <th>Order Total</th>
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
                      <td><?php echo $row['Quantity']; ?></td>
                      <td><?php echo $row['Delivery_date']; ?></td>
                      <td><?php echo $row['Total']; ?></td>
                    </Tr>
                  <?php
                    }
                  
                  ?>
                    </tbody>
                </table>
                <a href="./display_order.php">Show All</a>
            </div>
        </main>
        <!-------------------------------------- END OF MAIN---------------------------------------->

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
            <!---------END OF RIGHT TOP---------->

            <!-- !if somthing needed for right side add here -->
        </div>

    </div>

<script src="script.js"></script>

<script>
window.addEventListener("load", () => {
  clock();
  function clock() {
    const today = new Date();

    // get time components
    const hours = today.getHours();
    const minutes = today.getMinutes();
    const seconds = today.getSeconds();

    //add '0' to hour, minute & second when they are less 10
    const hour = hours < 10 ? "0" + hours : hours;
    const minute = minutes < 10 ? "0" + minutes : minutes;
    const second = seconds < 10 ? "0" + seconds : seconds;

    //make clock a 12-hour time clock
    const hourTime = hour > 12 ? hour - 12 : hour;

    // if (hour === 0) {
    //   hour = 12;
    // }
    //assigning 'am' or 'pm' to indicate time of the day
    const ampm = hour < 12 ? "AM" : "PM";

    // get date components
    const month = today.getMonth();
    const year = today.getFullYear();
    const day = today.getDate();

    //declaring a list of all months in  a year
    const monthList = [
      "January",
      "February",
      "March",
      "April",
      "May",
      "June",
      "July",
      "August",
      "September",
      "October",
      "November",
      "December"
    ];

    //get current date and time
    const date = monthList[month] + " " + day + ", " + year;
    const time = hourTime + ":" + minute + ":" + second + ampm;

    //combine current date and time
    const dateTime = date + " - " + time;

    //print current date and time to the DOM
    document.getElementById("date-time").innerHTML = dateTime;
    setTimeout(clock, 1000);
  }
});
</script>
</body>

</html>