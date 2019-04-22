<?php

include 'connection.php';

$booked_id = $_POST['booked_id'];
$hotel_id = $_POST['hotel_id'];


$sql = "SELECT travel_cost FROM booking WHERE booking_id = '$booked_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$cost = $row['travel_cost'];


$sql = "SELECT cost FROM hotels WHERE h_id = '$hotel_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$cost = $cost + $row['cost'];



$sql = "UPDATE booking SET booking_hotel_id='$hotel_id',travel_cost = '$cost' WHERE booking_id='$booked_id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

?>