<?php

    //create connection object
    $conn = new mysqli("localhost", "root", "", "garmnet_management_system");

    //check connection
    if($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        //create a script alert success
        
    }
    
?>