<?php require_once('include/connection.php')?>

<?php 
	// checking if a user is logged in
	

	if (isset($_GET['or_id'])) {
		// getting the user information
		$emp = mysqli_real_escape_string($conn, $_GET['or_id']);

		if ( $emp == $_SESSION['or_id'] ) {
			// should not delete current user
			header('Location: orderpanal.php?err=cannot_delete_current_user');
		} else {
			// deleting the user
			$query = "UPDATE order_tbl SET is_approved = 1 WHERE Order_Id = {$emp} LIMIT 1";

			$result = mysqli_query($conn, $query);

			if ($result) {
				// user deleted
				header('Location: orderpanal.php?msg=user_deleted');
			} else {
				header('Location: orderpanal.php?err=delete_failed');
			}
		}
		
	} else {
		header('Location: orderpanal.php');
	}
?>