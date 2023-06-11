<!DOCTYPE html>
<html>
<head>
	<title>Payment getway </title>
	<link rel="stylesheet" type="text/css" href="payment.css">
</head>
<body>
<header>
	<div class="container">
		<form action="payment.php" method="POST">
			<div class="left">
				<h3>BILLING ADDRESS</h3>
	
				First Name
				<input type="text" name="FirstName" placeholder="Enter First name" required>
	
				Last Name
				<input type="text" name="LastName" placeholder="Enter Last name" required>
	
				Address
				<input type="text" name="Address" placeholder="Enter address" required>
	
				City
				<input type="text" name="City" placeholder="Enter City" required>
	
				State 
				<input type="text" name="State" placeholder="State" required>
	
				Zip code
				<input type="text" name="ZipCode" placeholder="Zip code" pattern = "[0-9]{5}" required>
			</div>
	
			<div class="right">
				<h3>PAYMENT</h3>
	
				Accepted Card <br>
				<img src="image/card1.png" width="100">
				<img src="image/card2.png" width="50">
				<br><br>
	
				Credit card number
				<input type="text" name="CRD" placeholder="Enter card number" pattern = "[0-9]{16}" required><br/><br/>
	
				Exp month
				<input type="text" name="EXmonth" placeholder="Enter Month" pattern = "[0-9]{2}" required><br/><br/>
	
				Exp year
				<input type="text" name="EXyear" placeholder="Enter Year" pattern = "[0-9]{4}" required><br/><br/>
	
				CVV
				<input type="text" name="CVV" placeholder="CVV" pattern = "[0-9]{3}" required><br/><br/>
	
				<input type="submit" name="submitpayment" value="Submit">
			</div>
		</form>
	</div>

	<script> 

function validateForm() {
  // Get form inputs
  var firstName = document.forms["paymentForm"]["FirstName"].value;
  var lastName = document.forms["paymentForm"]["LastName"].value;
  var address = document.forms["paymentForm"]["Address"].value;
  var city = document.forms["paymentForm"]["City"].value;
  var state = document.forms["paymentForm"]["State"].value;
  var zipCode = document.forms["paymentForm"]["ZipCode"].value;
  var cardNumber = document.forms["paymentForm"]["CRD"].value;
  var expMonth = document.forms["paymentForm"]["EXmonth"].value;
  var expYear = document.forms["paymentForm"]["EXyear"].value;
  var cvv = document.forms["paymentForm"]["CVV"].value;

  // Validate each field
  if (firstName === "") {
    alert("First name must be filled out");
    return false;
  }

  if (lastName === "") {
    alert("Last name must be filled out");
    return false;
  }

  if (address === "") {
    alert("Address must be filled out");
    return false;
  }

  if (city === "") {
    alert("City must be filled out");
    return false;
  }

  if (state === "") {
    alert("State must be filled out");
    return false;
  }

  if (zipCode === "") {
    alert("Zip code must be filled out");
    return false;
  }

  if (cardNumber === "") {
    alert("Card number must be filled out");
    return false;
  }

  if (expMonth === "") {
    alert("Expiration month must be filled out");
    return false;
  }

  if (expYear === "") {
    alert("Expiration year must be filled out");
    return false;
  }

  if (cvv === "") {
    alert("CVV must be filled out");
    return false;
  }

  // Additional validation logic can be added here

  return true; // Form is valid
}

// Add event listener to the form submit button
document.getElementById("submitpayment").addEventListener("click", function(event) {
  // Prevent form submission if validation fails
  if (!validateForm()) {
    event.preventDefault();
  }
});

</script>

    <?php
require 'connection.php';

if (isset($_POST['submitpayment'])) {


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

    
    

    $sql = "INSERT INTO payment (FirstName, LastName, Address, City, State, ZipCode, CRD, EXmonth, EXyear, CVV)
	 VALUES ('$fname', '$lname', '$address','$city', '$state', '$code', '$crd', '$ex', '$exy', '$cvv' )";

    if ($conn->query($sql)) {
        echo "<script> alert('Records added successfully !!!!')</script>";
        header("location:display.php");
    } else {
        echo "<script> alert('ERROR: could not able to execute the query. ')</script>";
        echo $sql;
    }
}
?>

</header>


</body>
</html>