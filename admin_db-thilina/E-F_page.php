<?php require_once('include/connection.php')?>

<?php include('include/sidebar.php')?>

<div class="main-content-employee">

<?php 

	

	if (isset($_POST['submit'])) {
		
		// $first_name = $_POST['first_name'];
		// $last_name = $_POST['last_name'];
		// $email = $_POST['email'];
		// $password = $_POST['password'];
        // $DOB = $_POST['DOB'];

        // no errors found... adding new record
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
            $DOB = mysqli_real_escape_string($connection, $_POST['DOB']);
            $mobile_no = mysqli_real_escape_string($connection, $_POST['mobile_no']);
            $gender = mysqli_real_escape_string($connection, $_POST['gender']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			$hashed_password = sha1($password);

            $address = mysqli_real_escape_string($connection, $_POST['address']);
            $title = mysqli_real_escape_string($connection, $_POST['title']);
            $join_date = mysqli_real_escape_string($connection, $_POST['join_date']);
            $zone = mysqli_real_escape_string($connection, $_POST['zone']);
            $insure = mysqli_real_escape_string($connection, $_POST['insure']);

		
		
            $query = "INSERT INTO employee ( first_name, last_name, DOB, mobile_no, gender, email, password, address, job_title, join_date, zone, insure ) VALUES ( '{$first_name}', '{$last_name}', '{$DOB}', '{$mobile_no}', '{$gender}', '{$email}', '{$hashed_password}', '{$address}', '{$title}', '{$join_date}', '{$zone}', '{$insure}')";
			

			$result = mysqli_query($connection, $query);

            if ($result) {
				// query successful... redirecting to users page
				header('Location: E-F_page.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
			}


	}

?>




<div class="popup">
    
    <h2>Add a new employee</h2>

    <form method="post" class="userform">

        <div class="field">

            <span class="title">Personal Details</span>

                <p class="input-field-address">
                    <label for="">First Name:</label>
                    <input type="text" name="first_name" maxlength="50" required>
                </p>

                <p class="input-field-address">
                    <label for="">Last Name:</label>
                    <input type="text" name="last_name" maxlength="100" required>
                </p>

                <p class="input-field">
                    <label for="">birthday:</label>
                    <input type="date" name="DOB">
                </p>

                <p class="input-field">
                    <label for="">mobile_no:</label>
                    <input type="text" name="mobile_no" maxlength="10" required>
                </p>

                <p class="input-field">
                    <label for="">gender:</label>
                    <input type="text" name="gender" maxlength="10" required>
                </p>

                <p class="input-field-address">
                    <label for="">Email Address:</label>
                    <input type="text" name="email" maxlength="100" required>
                </p>

                <p class="input-field-address">
                    <label for="">New Password:</label>
                    <input type="password" name="password" maxlength="40" required>
                </p>

                <p class="input-field-address">
                    <label for="">Address:</label>
                    <input type="text" name="address" maxlength="200" required>
                </p>

            <span class="title">Working Details</span>

                <p class="input-field-address">
                    <label for="">Job title:</label>
                    <input type="text" name="title" maxlength="100" required>
                </p>

                <p class="input-field-address">
                    <label for="">Join_date:</label>
                    <input type="date" name="join_date">
                </p>

                <p class="input-field-address">
                    <label for="">Insure:</label>
                    <input type="text" name="insure" maxlength="100" required>
                </p>

                <p class="input-field-address">
                    <label for="">Working Zone:</label>
                    <input type="text" name="zone" maxlength="20" required>
                </p>

                <!-- <p class="input-field-address">
                    <label for="">&nbsp;</label>
                    <button type="submit" name="submit">Save</button>
                </p> -->

                <div class="buttons">
                    <button type="submit" name="submit" class="submitbtn">
                        <span class="btn-text">Submit</span>
                        <span class="material-symbols-rounded">arrow_outward</span>
                    </button>

                    <button class="cancel">
                        <span class="btn-text">Cancel</span>
                        <span class="material-symbols-rounded">close</span>
                    </button>
                </div>

                



            </form>

        </div>  <!--inside form field class closing tag-->
			
</div>	<!--popup closing tag-->		
                       


    
</body>
</html>