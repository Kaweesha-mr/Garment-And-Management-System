

<?php require_once('include/connection.php')?>

<!-- connecting form php -->

<?php

    if(isset($_POST['submit']))
    {
        $first_name = mysqli_real_escape_string($conn, $_POST['FirstName']);
        $last_name = mysqli_real_escape_string($conn, $_POST['LastName']);
        $DOB = mysqli_real_escape_string($conn, $_POST['DOB']);
        // $NIC = mysqli_real_escape_string($conn, $_POST['NIC']);
        $mobile_no = mysqli_real_escape_string($conn, $_POST['mobile_no']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        // $age = mysqli_real_escape_string($conn, $_POST['age']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashed_pasword = sha1($password);

        $street_add = mysqli_real_escape_string($conn, $_POST['street_add']);
        // $district = mysqli_real_escape_string($conn, $_POST['district']);
        // $province = mysqli_real_escape_string($conn, $_POST['province']);
        // $postal_code = mysqli_real_escape_string($conn, $_POST['postal_code']);
        $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
        // $zone = mysqli_real_escape_string($conn, $_POST['zone']);
        $join_date = mysqli_real_escape_string($conn, $_POST['join_date']);
        $insure = mysqli_real_escape_string($conn, $_POST['insure']);



        $query = "INSERT INTO employee (first_name, last_name, DOB, mobile_no, gender, email, password, street_add, job_title, join_date, insure)";
        $query .= " VALUES ('{$first_name}', '{$last_name}', '{$DOB}', '{$mobile_no}', '{$gender}', '{$email}', '{$hashed_password}', '{street_add}', '{$job_title}', '{$join_date}', '{$insure}')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // query successful... redirecting to users page
            header('Location: employeeAdmin.php?user_added=true');
        } else {
          //  $errors[] = 'Failed to add the new record.';
        }



    }


?>


<!-- end connecting form php -->


<!---------------------------------------- SIDEBAR BEGINING ------------------------------------------>
<?php include('include/sidebar.php')?>

    <div class="main-content-employee">

        <!-- greetings -->
        <div class="greetings">
            <h1>Employee</h1>
        </div>
        <!-- greetings end -->

        <!--table begin-->
        <div class="table-outer">
            <div class="tablewrap-employee">
            <table class="emp">
                        
                                <thead>
                                <tr>
                                    <th>Employee Id</th>
                                    <th>Employee Name</th>
                                    <th>Job Title</th>
                                    <th>Zone</th>
                                    <th>Joining Date</th>
                                    <th>Mobile No.</th>
                                    <th> Action  </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td>
                                        <a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>    
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td><a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a>  
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td><a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td><a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td><a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td><a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a> 
                                    </td>
                                </tr>
                                <tr>
                                    <td>USR4324</td>
                                    <td>Noman</td>
                                    <td>co-worker</td>
                                    <td>Quantity sector</td>
                                    <td>2001-04-23</td>
                                    <td>0773214589</td>
                                    <td><a href=""><span class="material-symbols-rounded" id="delete">delete</span></a>
                                        <a href=""><span class="material-symbols-rounded" id="update">update</span></a> 
                                    </td>
                                </tr>
                                
                            </tbody>
                        </table>


            </div>
        </div>

        <!--table end-->

        <div class="add-emp">

            <button id="addEmp">
                <span class="btn-text">Add a new employee</span>
                <span class="material-symbols-rounded">person_add</span>
            </button>

            <div class="popup">
                <div class="form-first">
                    <div class="form-personal">
                        <h2>Add a new employee</h2>
                        
                        <!-- Form begin--------->

                            <form action="employeeAdmin.php" method="post">
                                
                                <span class="title">Personal Details</span>
                                    <div class="field">
                                        <div class="input-field-address">
                                            <label>First Name</label>
                                            <input type="text" placeholder="Enter your first name" name="FirstName" maxlength="50" required>
                                        </div>
                                        <div class="input-field-address">
                                            <label>Last Name</label>
                                            <input type="text" placeholder="Enter your last name" name="LastName" maxlength="100" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Birth Day</label>
                                            <input type="Date" placeholder="Enter your Birthday" name="DOB"  required>
                                        </div>
                                        <!-- <div class="input-field">
                                            <label>NIC No.</label>
                                            <input type="text" placeholder="Enter your national Id no." name="NIC" maxlength="15" required>
                                        </div> -->
                                        <div class="input-field">
                                            <label>Mobile No.</label>
                                            <input type="text" placeholder="Enter Phone number" name="mobile_no" maxlength="10" required>
                                        </div>
                                        <div class="input-field">
                                            <label>Gender</label>
                                            <input type="text" placeholder="Enter gender" name="gender" maxlength="10" required>
                                            <!-- <select name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select> -->
                                        </div>
                                        <!-- <div class="input-field">
                                            <label>Age</label>
                                            <input type="number" placeholder="Enter age" name="age" maxlength="4" required>
                                        </div> -->
                                        <div class="input-field-address">
                                            <label>Email</label>
                                            <input type="text" placeholder="Enter your E-mail" name="email" maxlength="100" required>
                                        </div>
                                        <div class="input-field-address">
                                            <label>Password</label>
                                            <input type="text" placeholder="enter password" name="password" maxlength="40" required>
                                        </div>
                                        <div class="input-field-address">
                                            <label>Home Address</label>
                                            <input type="text" placeholder="Street address" name="street_add" maxlength="200" required>
                                            <!-- <input type="text" placeholder="District" name="district" maxlength="50" required>
                                            <input type="text" placeholder="Province" name="province" maxlength="50" required> -->
                                        </div>
                                        <!-- <div class="input-field-address">
                                            <label>Postal Code</label>
                                            <input type="text" placeholder="Enter postal code" name="postal_code" maxlength="20" required>
                                        </div> -->
                                    </div>

                                    <span class="title">Working Details</span>
                                    <div class="field">
                                        <div class="input-field-address">
                                            <label>Job title</label>
                                            <input type="text" placeholder="Enter job title" name="job_title" maxlength="100" required>
                                        </div>
                                        <!-- <div class="input-field-address">
                                            <label>Working zone</label>
                                            <input type="text" placeholder="Enter working zone" name="zone" maxlength="100" required>
                                        </div> -->
                                        <div class="input-field-address">
                                            <label>Joining Date</label>
                                            <input type="Date"  name="join_date" required>
                                        </div>
                                        
                                        <div class="input-field-address">
                                            <label>Insured</label>
                                            <input type="text" placeholder="Enter insre" name="insure" maxlength="50" required>
                                            <!-- <select name="insure">
                                                <option value="yes">Yes</option>
                                                <option value="no">No</option>
                                            </select> -->
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <button class="submit">
                                        <span type="submit" name="submit" class="btn-text">Submit</span>
                                        <span class="material-symbols-rounded">arrow_outward</span>
                                        </button>
                                        <button class="cancel">
                                            <span class="btn-text">Cancel</span>
                                            <span class="material-symbols-rounded">close</span>
                                        </button>
                                    </div>

                     </form>
                        

                    </div>
                </div>

                
                    
                        
                    
                
            </div>

        </div>


    </div> <!--main content cloase tag-->

    <!---------------------- insert Javscript here ----------------------->
    <script src="js/form.js"></script>
    <script src="js/index.js"></script>
    
</body>
</html>