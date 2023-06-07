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
                            <p class="card-top">Insights</p>
                            <p class="card-Qnt">354 Sales</p> <!--How many Sales-->
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
                            <p class="card-top">Insights</p>
                            <p class="card-Qnt">354 Sales</p> <!--How many Sales-->
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
                </div>
                <div class="chart-card">
                    <p>ads</p>
                </div>

            </div>

        </div>



        <!-------------------------------- CONTAINER-RIGHT ------------------------------------>

        <div class="container-right">


            <div class="card">
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
        </div>
    </div>
    
    <!---------------------- insert Javscript here ----------------------->
    <script src="index.js"></script>

</body>
</html>