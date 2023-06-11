<?php
            require 'connection.php';
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            
            $fname = $_POST["FirstName"];
            $lname = $_POST["LastName"];
            $address = $_POST["Address"];
            $city = $_POST["City"];
            $state = $_POST["State"];
            $code = $_POST["ZipCode"];
            $crd = $_POST["CRD"];
            $ex = $_POST["EXmonth"];
            $exy = $_POST["EXyear"];
            $cvv = $_POST["CVV"];

            $sql = "UPDATE cart SET FirstName = '$fname', LastName = '$lname', Address = '$address' , City = '$city' , 
            State = '$state' , ZipCode = '$code' , CRD = '$crd' , EXmonth = '$ex' , EXyear = '$exy' , CVV = '$cvv' WHERE id = $id";


            if ($conn -> query($sql))
            {

                echo "<script> alert('Record updated successfully !')</script>";
                header("location:display.php");
            }
            else{
                echo "<script> alert('ERROR: could not able to execute the query. ')</script>";
                echo $sql;
            }
?>