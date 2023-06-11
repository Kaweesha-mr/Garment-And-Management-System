<?php
        //connect database
        include_once('config.php');
        session_start();

        //check session userid and username set 
        if(!isset($_SESSION['userid']) && !isset($_SESSION['username'])){
            header("Location: index.php");
        }


        //check submit button is clicked

       




?>