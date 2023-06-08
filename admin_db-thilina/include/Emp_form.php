<!-- Form begin--------->

<form action="Emp_form.php" method="post">
                    
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
                            <div class="input-field">
                                <label>NIC No.</label>
                                <input type="text" placeholder="Enter your national Id no." name="NIC" maxlength="15" required>
                            </div>
                            <div class="input-field">
                                <label>Mobile No.</label>
                                <input type="text" placeholder="Enter Phone number" name="mobile_no" maxlength="10" required>
                            </div>
                            <div class="input-field">
                                <label>Gender</label>
                                <select name="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="input-field">
                                <label>Age</label>
                                <input type="number" placeholder="Enter age" name="age" maxlength="4" required>
                            </div>
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
                                <input type="text" placeholder="District" name="district" maxlength="50" required>
                                <input type="text" placeholder="Province" name="province" maxlength="50" required>
                            </div>
                            <div class="input-field-address">
                                <label>Postal Code</label>
                                <input type="text" placeholder="Enter postal code" name="postal_code" maxlength="20" required>
                            </div>
                        </div>

                        <span class="title">Working Details</span>
                        <div class="field">
                            <div class="input-field-address">
                                <label>Job title</label>
                                <input type="text" placeholder="Enter job title" name="job_title" maxlength="100" required>
                            </div>
                            <div class="input-field-address">
                                <label>Working zone</label>
                                <input type="text" placeholder="Enter working zone" name="zone" maxlength="100" required>
                            </div>
                            <div class="input-field-address">
                                <label>Joining Date</label>
                                <input type="Date"  name="join_date" required>
                            </div>
                            
                            <div class="input-field-address">
                                <label>Insured</label>
                                <select name="insure">
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
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