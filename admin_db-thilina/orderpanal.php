<?php require_once('include/connection.php')?>

<?php

    $ord_list = '';

    //getting the lists of uses
    $query = "SELECT * FROM order_table WHERE is_approved = 0 ORDER BY ord_id";
    $users = mysqli_query($connection, $query);

    //if query successful
    if($users){
        while($user = mysqli_fetch_assoc($users))
        {
            $ord_list .= "<tr>";
            $ord_list .= "<td>{$user['ord_id']}</td>";
            $ord_list .= "<td>{$user['usrid']}</td>";        
            $ord_list .= "<td>{$user['ord_typ']}</td>";
            $ord_list .= "<td>{$user['Qnt']}</td>";
            $ord_list .= "<td>{$user['delv_date']}</td>";
            $ord_list .= "<td><a href=\"delete-emp.php?em_id={$user['ord_id']}\"onclick=\"return confirm('Are you sure?');\"><span class=\"material-symbols-rounded\" id=\"delete\">edit_attributes</span></a></td>";
            $ord_list .= "</tr>";
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
        <h1>Order Panel</h1>
    </div>
    <!-- greetings end -->

    <!--table begin-->
    <div class="table-outer">
        <div class="tablewrap-order">
        <table class="emp">
                    
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Customer Id</th>
                                <th>Order Type</th>
                                <th>Quantity</th>
                                <th>Delivery Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php echo $ord_list; ?>

                        </tbody>
                    </table>


        </div>
    </div>

    <!--table end-->


</div>    


    <!---------------------- insert Javscript here ----------------------->
    <script src="js/form.js"></script>
    <script src="js/index.js"></script>

</body>