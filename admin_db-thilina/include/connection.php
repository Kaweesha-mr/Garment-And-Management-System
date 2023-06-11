<?php

    //connect to data base   garment_management_system

    $connection = mysqli_connect('localhost', 'root', '', 'garment_management_system');

    if(mysqli_connect_errno()){
        die('database connetion fail' . mysqli_connect_error());
     }
     else{

        //echo "<script> alert('connected')</script>";
     }


?>