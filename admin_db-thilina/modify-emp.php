<?php require_once('include/connection.php')?>

<?php include('include/sidebar.php')?>

<div class="main-content-employee">

<?php

    // $first_name = '';
    // $last_name  = '';
    // $DOB        = '';
    // $mobile_no  = '';
    // $gender     = '';
    // $email      = '';
    // $password   = '';
    // $address    = '';
    // $title      = '';
    // $join_date  = '';
    // $zone       = '';
    // $insure     = '';

    $errors = array();
    $emp ='';


    if(isset($_GET['em_id'])){
        
        //getting infomation from employee table
        $emp = mysqli_real_escape_string($conn, $_GET['em_id']);
        $query = "SELECT * FROM employee WHERE emp_id = {$emp} LIMIT 1";

        //excute query
        $result_set = mysqli_query($conn, $query);

        //check query successful
        if($result_set)
        {
            if(mysqli_num_rows($result_set) == 1)
            {
                //user found
                $result = mysqli_fetch_assoc($result_set);
                $first_name = $result['first_name'];    //after result  column names on database
                $last_name  = $result['last_name'];
                $DOB        = $result['DOB'];
                $mobile_no  = $result['mobile_no'];
                $gender     = $result['gender'];
                $email      = $result['email'];
                //$password   = $result['password'];
                $address    = $result['address'];
                $title      = $result['job_title'];
                $join_date  = $result['join_date'];
                $zone       = $result['zone'];
                $insure     = $result['insure'];

                

            }
            else
            {
                //user not found
                header('Location: Empdashboard.php?err=user_not_found');
            }
        }
        else
        {
            //no records. redirect emp_dashboard
            header('Location: Empdashboard.php?err=query_failed');
        }
    }

	

	if (isset($_POST['submit'])) {

            $emp = $_POST['em_id'];
		
        
            //check email address exist
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $query = "SELECT * FROM employee WHERE email = '{$email}' AND emp_id != {$emp} LIMIT 1";

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
                $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);   //after post -> names of inpput field in form
                $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
                $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
                $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
                $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                

                $address = mysqli_real_escape_string($conn, $_POST['address']);
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
                $zone = mysqli_real_escape_string($conn, $_POST['zone']);
                $insure = mysqli_real_escape_string($conn, $_POST['insure']);

            
            
                $query = "UPDATE employee SET first_name = '{$first_name}', last_name = '{$last_name}', DOB = '{$DOB}', mobile_no = '{$mobile_no}', gender = '{$gender}', email = '{$email}', address = '{$address}', job_title = '{$title}', join_date = '{$join_date}', zone = '{$zone}', insure = '{$insure}' WHERE emp_id = '{$emp}' LIMIT 1";

                

                $result = mysqli_query($conn, $query);

                if ($result) {
                    // query successful... redirecting to users page
                    header('Location: Empdashboard.php?emmployee_modified=true');
                } else {
                    $errors[] = 'Failed to modify record.';
                }

            }


            


	}

?>




<div class="popup">
    
    <h2>Update employee detail</h2>

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
                    <input type="text" name="first_name" maxlength="50" required <?php echo 'value="' . $first_name . '"'; ?>>
                </p>

                <p class="input-field-address">
                    <label for="">Last Name:</label>
                    <input type="text" name="last_name" maxlength="100" required <?php echo 'value="' . $last_name . '"'; ?>>
                </p>

                <p class="input-field">
                    <label for="">birthday:</label>
                    <input type="date" name="DOB" <?php echo 'value="' . $DOB . '"'; ?>>
                </p>

                <p class="input-field">
                    <label for="">mobile_no:</label>
                    <input type="text" name="mobile_no" maxlength="10" required <?php echo 'value="' . $mobile_no . '"'; ?>>
                </p>

                <p class="input-field">
                    <label for="">gender:</label>
                    <input type="text" name="gender" maxlength="10" required <?php echo 'value="' . $gender . '"'; ?>>
                </p>

                <p class="input-field-address">
                    <label for="">Email Address:</label>
                    <input type="text" name="email" maxlength="100" required <?php echo 'value="' . $email . '"'; ?>>
                </p>

                <p class="input-field-address">
                    <label for="">Password:</label>
                    <span>******</span>
                    <a href="change-password.php" class="cancel">Change Password</a>
                </p>

                <p class="input-field-address">
                    <label for="">Address:</label>
                    <input type="text" name="address" maxlength="200" required <?php echo 'value="' . $address . '"'; ?>>
                </p>

            <span class="title">Working Details</span>

                <p class="input-field-address">
                    <label for="">Job title:</label>
                    <input type="text" name="title" maxlength="100" required <?php echo 'value="' . $title . '"'; ?>>
                </p>

                <p class="input-field-address">
                    <label for="">Join_date:</label>
                    <input type="date" name="join_date" <?php echo 'value="' . $join_date . '"'; ?>>
                </p>

                <p class="input-field-address">
                    <label for="">Insure:</label>
                    <input type="text" name="insure" maxlength="100" required <?php echo 'value="' . $insure . '"'; ?>>
                </p>

                <p class="input-field-address">
                    <label for="">Working Zone:</label>
                    <input type="text" name="zone" maxlength="20" required <?php echo 'value="' . $zone . '"'; ?>>
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