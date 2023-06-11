<?php require_once('include/connection.php')?>

<?php include('include/sidebar.php')?>

<div class="main-content-employee">

<?php 

    $errors = array();
    $emp ='';

	if (isset($_POST['submit'])) {
		
            $emp = $_POST['em_id'];
            
            // $first_name = $_POST['first_name'];
            // $last_name = $_POST['last_name'];
            // $email = $_POST['email'];
            // $password = $_POST['password'];
            // $DOB = $_POST['DOB'];
        
            //check email address exist
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $query = "SELECT * FROM employee WHERE email = '{$email}' LIMIT 1";

            $result_set = mysqli_query($conn, $query);

            if ($result_set) 
            {
                if (mysqli_num_rows($result_set) == 1) {
                    $errors[] = 'Email address already exists';
                }
            }

            //if ther was no errors then submit the form
            if(empty($errors))
            {

                // no errors found... adding new record
                $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
                $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
                $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
                $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $password = mysqli_real_escape_string($conn, $_POST['password']);
                $hashed_password = sha1($password);

                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
                $zone = mysqli_real_escape_string($conn, $_POST['zone']);
                $insure = mysqli_real_escape_string($conn, $_POST['insure']);

            
            
                $query = "INSERT INTO employee ( first_name, last_name, DOB, mobile_no, gender, email, password, address, job_title, join_date, zone, insure ) VALUES ( '{$first_name}', '{$last_name}', '{$DOB}', '{$mobile_no}', '{$gender}', '{$email}', '{$hashed_password}', '{$address}', '{$title}', '{$join_date}', '{$zone}', '{$insure}')";
                

                $result = mysqli_query($conn, $query);

                if ($result) {
                    // query successful... redirecting to users page
                    header('Location: Empdashboard.php?user_added=true');
                } else {
                    $errors[] = 'Failed to add the new record.';
                }

            }

        


	}

?>




<div class="popup">
    
    <h2>Add a new employee</h2>

        <?php 

			if (!empty($errors)) 
            {
				// display_errors($errors);

                // format and displays form errors
                echo '<div class="errmsg">';
                echo '<b>There were error(s) on your form.</b><br>';
                foreach ($errors as $error) {
                    $error = ucfirst(str_replace("_", " ", $error));
                    echo '- ' . $error . '<br>';
                }
                echo '</div>';
			}

    	?>

    <form method="post" class="userform">

        <div class="field">

            <span class="title">Personal Details</span>

            <input type="hidden" name="em_id" value="<?php echo $emp; ?>">

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

                    <a href="Empdashboard.php" class="cancel">
                        <span class="btn-text">Cancel</span>
                        <span class="material-symbols-rounded">close</span>
                    </a>

                    <!-- <button >
                        
                    </button> -->
                </div>

                



            </form>

        </div>  <!--inside form field class closing tag-->
			
</div>	<!--popup closing tag-->		
                       


    
</body>
</html>