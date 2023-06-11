<?php

require 'connection.php';

// Get the payment id from the URL
$id = $_GET['id'];

// Delete the payment from the database
$sql = "DELETE FROM cart WHERE id = $id";
$result = $conn->query($sql);

if ($result) {
    echo "<script> alert('payment details deleted successfully !!!!')</script>";
    header("location:display.php");
} else {
    echo "<script> alert('ERROR: could not able to delete payment details. ')</script>";
    echo $sql;
}

?>