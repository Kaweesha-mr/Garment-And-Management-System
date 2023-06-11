<!DOCTYPE html>
<html>
<head>
    <title>Payment Details</title>
    

<body>
<div class="background1">
    <h1><b></b></h1><br>
</div>
<hr class="newhr">

        <?php
            require 'connection.php';
            $id = $_GET['id'];
            
            $sql = "SELECT * FROM cart WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) 
            {
                while ($row = $result->fetch_assoc()) 
                {
                    $fname = $row["FirstName"];
                    $lname = $row["LastName"];
                    $address = $row["Address"];
                    $city = $row["City"];
                    $state = $row["State"];
                    $code = $row["ZipCode"];
                    $crd = $row["CRD"];
                    $ex = $row["EXmonth"];
                    $exy = $row["EXyear"];
                    $cvv = $row["CVV"]; 

                }
            }
            
        ?>

<div class="container">
    <form action="update.php" method="post" >               
    <div class="row">
                   
                <div class="row">
                    <div class="col-25">
                        <label for="customername"><B>First Name</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="FirstName" name="FirstName" value="<?php echo $fname; ?>" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customername"><B>Last Name</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="LastName" name="LastName" value="<?php echo $lname; ?>" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customeraddress"><B>Address</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="Address" name="Address" value="<?php echo $address; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customercity"><B>City</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="City" name="City" value="<?php echo $city; ?>" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customerstate"><B>State</b></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="State" name="State" value="<?php echo $state; ?>" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>
                </div>
               
                <div class="row">
                    <div class="col-25">
                        <label for="customercode"><B>ZipCode</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="ZipCode" name="ZipCode" value="<?php echo $code; ?>" >
                        <input type="hidden" name="id" pattern="[0-9]{4}"  value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customercrd"><B>CRD</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="CRD" name="CRD" value="<?php echo $crd; ?>" >
                        <input type="hidden" name="id"   value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customerexmonth"><B>ExpireMonth</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="EXmonth" name="EXmonth" value="<?php echo $ex; ?>" >
                        <input type="hidden" name="id"  value="<?php echo $id; ?>">

                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="customerexyear"><B>ExpireYear</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="EXyear" name="EXyear" value="<?php echo $exy; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        "[0-9]{10}"
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-25">
                        <label for="customercvv"><B>CVV</B></label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="CVV" name="CVV" value="<?php echo $cvv; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">

                    </div>
                </div>
                

                <br>
                <div class="row">
                    <input type="submit" value="Update">
                </div>      
            
        
        
         </form>
    </div>

</body>
</html>