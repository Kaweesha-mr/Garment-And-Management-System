<?php require_once('include/connection.php')?>

<?php

    // Perform the database query
    $query = "SELECT COUNT(*) AS total_rows FROM order_tbl";
    $result = mysqli_query($conn, $query);  //execute the query
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total_rows'];

    $query = "SELECT COUNT(*) AS total_rows_emp FROM employee";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalRowsEmp = $row['total_rows_emp'];

    $query = "SELECT COUNT(*) AS total_rows_app_ord FROM order_tbl WHERE is_approved =  1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $totalRowsAppOrd = $row['total_rows_app_ord'];
  

?>

<?php


    $test = array();

    $count = 0;

    $query = "SELECT * FROM order_tbl";
    $res = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($res))
    {
        $test[$count] ["label"] = $row['Order_Type'];
        $test[$count] ["y"] = $row["Quantity"];

        $count =$count +1;
    }


 
?>

<!---------------------------------------- SIDEBAR BEGINING ------------------------------------------>
<?php include('include/sidebar.php')?>

    <!--------------------------- main contian beginning ------------------------->

    <div class="main-content">

        <!-------------------------- CONTAINER-LEFT ------------------------------>

        <div class="container-left">

            <!-- greetings -->
            <div class="greetings">
                <h1 id="massage"></h1>
            </div>
            <!-- greetings end -->


            <!-- Card begins -->
            <div class="main-card">

                <div class="card">
                    <div class="insights">
                        <span class="material-symbols-rounded">insights</span>
                    </div>
                        <div class="card-inner">
                            <p class="card-top">Lifetime Orders</p>
                            <p class="card-Qnt"><?php echo $totalRows ; ?> Orders</p> <!--How many Sales-->
                        </div>
                        <!-- <div class="progress">
                            <p class="card-Qnt">figur</p> 
                        </div> -->
                    
                </div>
                <div class="card">
                    <div class="monitoring">
                        <span class="material-symbols-rounded">monitoring</span>
                    </div>
                        <div class="card-inner">
                            <p class="card-top">Employees</p>
                            <p class="card-Qnt"><?php echo $totalRowsEmp ; ?> Employees</p> <!--How many Sales-->
                        </div>
                        <!-- <div class="progress">
                            <p class="card-Qnt">figur</p> 
                        </div> -->
                    
                </div>
                <div class="card">
                    <div class="grouped_bar_chart">
                        <span class="material-symbols-rounded">grouped_bar_chart</span>
                    </div>
                        <div class="card-inner">
                            <p class="card-top">Insights</p>
                            <p class="card-Qnt"><?php echo $totalRowsAppOrd ; ?> Sales Completed</p> <!--How many Sales-->
                        </div>
                        <!-- <div class="progress">
                            <p class="card-Qnt">figur</p> 
                        </div> -->
                    
                </div>
                
            </div>

            <div class="charts">

                <div class="chart-card"></div>

                <div class="chart-card">
                    
                    <script>
                        window.onload = function() {
                        
                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            theme: "light2",
                            title:{
                                text: "Sells for types"
                            },
                            axisY: {
                                title: "Quantity"
                            },
                            data: [{
                                type: "column",
                                yValueFormatString: "#,##0.## pices",
                                dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();
                        
                        }
                    </script>



                    <div id="chartContainer"></div>
                    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
                    
                </div>

                

            </div>

        </div>



        <!-------------------------------- CONTAINER-RIGHT ------------------------------------>

        <div class="container-right">


                <div class="main-card-r">

                    <div class="card-r-u">
                            <div class="calendar_month">
                                <span class="material-symbols-rounded">calendar_month</span>
                            </div>
                            <div class="card-inner">
                                <p id="day"></p>
                                <p class="card-Qnt" id="insertdate"></p> 

                            </div>
                            <!-- <div class="progress">
                                <p class="card-Qnt">figur</p> 
                            </div> -->
                    </div>

                    <div class="card-r">
                            <div class="calendar_month">
                                <span class="material-symbols-rounded">mail</span>
                            </div>
                            <div class="card-inner">
                                <p class="card-Qnt">Messages</p>
                                <br>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam repudiandae dolores officia earum doloribus nobis sint quas distinctio veniam rem cumque, iste placeat architecto doloremque quae, quis eaque. Perspiciatis, corrupti!</p>
                            </div>
                            
                    </div>

                </div>


        </div>


        
    </div> <!--main content close tag-->
    
    <!---------------------- insert Javscript here ----------------------->
    <script src="js/index.js"></script>

</body>
</html>