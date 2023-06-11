<?php require_once('include/connection.php')?>

<?php 
	// checking if a user is logged in
	

	if (isset($_GET['em_id'])) {
		// getting the user information
		$emp = mysqli_real_escape_string($connection, $_GET['em_id']);

		if ( $emp == $_SESSION['em_id'] ) {
			// should not delete current user
			header('Location: Empdashboard.php?err=cannot_delete_current_user');
		} else {
			// deleting the user
			$query = "DELETE FROM employee WHERE emp_id = {$emp} LIMIT 1";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// user deleted
				header('Location: Empdashboard.php?msg=user_deleted');
			} else {
				header('Location: Empdashboard.php?err=delete_failed');
			}
		}
		
	} else {
		header('Location: Empdashboard.php');
	}
?>