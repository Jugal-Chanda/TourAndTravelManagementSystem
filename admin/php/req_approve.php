<?php

include 'connection.php';

$id = $_GET['id'];

$sql = "UPDATE booking SET approve='1' WHERE booking_id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}


?>