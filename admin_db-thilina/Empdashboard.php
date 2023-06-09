<?php require_once('include/connection.php')?>

<?php

    $user_list = '';

    //getting the lists of uses
    $query = "SELECT * FROM employee WHERE is_deleted = 0 ORDER BY emp_id";
    $users = mysqli_query($connection, $query);

    //if query successful
    if($users){
        while($user = mysqli_fetch_assoc($users))
        {
            $user_list .= "<tr>";
            $user_list .= "<td>{$user['emp_id']}</td>";
            $user_list .= "<td>{$user['first_name']}</td>";        
            $user_list .= "<td>{$user['job_title']}</td>";
            $user_list .= "<td>{$user['zone']}</td>";
            $user_list .= "<td>{$user['join_date']}</td>";
            $user_list .= "<td>{$user['mobile_no']}</td>";
            $user_list .= "<td><a href=\"modify-user.php?user_id={$user['emp_id']}\"></a></td>";
            $user_list .= "<td><a href=\"delete-user.php?user_id={$user['emp_id']}\"></a></td>";
            $user_list .= "</tr>";
        }
    }
    else
    {
        echo "Database query failed.";
    }

?>


<!---------------------------------------- SIDEBAR BEGINING ------------------------------------------>
<?php include('include/sidebar.php')?>

    <div class="main-content-employee">

        <!-- greetings -->
        <div class="greetings">
            <h1>Employee</h1>
        </div>
        <!-- greetings end -->

        <!--table begin-->
        <div class="table-outer">
            <div class="tablewrap-employee">
            <table class="emp">
                        
                            <thead>
                                <tr>
                                    <th>Employee Id</th>
                                    <th>Employee Name</th>
                                    <th>Job Title</th>
                                    <th>Zone</th>
                                    <th>Joining Date</th>
                                    <th>Mobile No.</th>
                                    <th> Delete </th>
                                    <th> Update </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php echo $user_list; ?>
                                
                            </tbody>
                        </table>


            </div>
        </div>

        <!--table end-->

        <!------------ Add a ne eployee button --------------->

        <div class="add-emp">

            <a href="E-F_page.php" id="addEmp">
                <span class="btn-text">Add a new employee</span>
                <span class="material-symbols-rounded">person_add</span>
            </a>

            <!-- <button id="addEmp">
                <span class="btn-text">Add a new employee</span>
                <span class="material-symbols-rounded">person_add</span>
            </button> -->

            <!-- <div class="popup1">
                <div class="form-first">
                    <div class="form-personal">
                        <h2>Add a new employee</h2>
                        
                        here was the include for from. taken photo at 8:10am
                        

                    </div>
                </div>    
            </div> -->



        </div>


    </div> <!--main content cloase tag-->

    <!---------------------- insert Javscript here ----------------------->
    <script src="js/form.js"></script>
    <script src="js/index.js"></script>
    
</body>
</html>