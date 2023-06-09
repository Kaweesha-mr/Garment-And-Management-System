<?php require_once('include/connection.php')?>

<?php

    // Perform the database query
    $query = "SELECT COUNT(*) AS total_rows FROM order_table";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $totalRows = $row['total_rows'];

    $query = "SELECT COUNT(*) AS total_rows_emp FROM employee";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $totalRowsEmp = $row['total_rows_emp'];

      

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
                            <p class="card-top">Orders</p>
                            <p class="card-Qnt"><?php echo $totalRows ; ?> New Orders</p> <!--How many Sales-->
                            <p class="card-time">Last 2hrs</p> <!--last time system has updated-->
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
                            <p class="card-time">Last 2hrs</p> <!--last time system has updated-->
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
                            <p class="card-Qnt">354 Sales</p> <!--How many Sales-->
                            <p class="card-time">Last 2hrs</p> <!--last time system has updated-->
                        </div>
                        <!-- <div class="progress">
                            <p class="card-Qnt">figur</p> 
                        </div> -->
                    
                </div>
                
            </div>

            <div class="charts">
                <div class="chart-card">
                    <p>sadf</p>
                    <table>
                        <thead>
                            <tr>
                                <th>column</th>
                                <th>column</th>
                                <th>column</th>
                                <th>column</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>name</td>
                                <td>miss</td>
                                <td>call</td>
                                <td>function</td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td>miss</td>
                                <td>call</td>
                                <td>function</td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td>miss</td>
                                <td>call</td>
                                <td>function</td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td>miss</td>
                                <td>call</td>
                                <td>function</td>
                            </tr>
                            <tr>
                                <td>name</td>
                                <td>miss</td>
                                <td>call</td>
                                <td>function</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="chart-card">
                    <p>ads</p>
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
                                <p class="card-time">Last 2hrs</p> <!--last time system has updated-->
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