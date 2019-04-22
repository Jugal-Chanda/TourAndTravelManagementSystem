<?php
$no_of_days = $_POST['no_of_days'];
$No_of_person = $_POST['No_of_person'];
$place_id = $_POST['place_id'];
$user_id = $_POST['user_id'];
$cost = $_POST['cost']*$No_of_person;

$new_date = date('Y-m-d', strtotime($_POST['s_date']));
$ending_date =  date('Y-m-d', strtotime($new_date. ' + '.$no_of_days.'days'));

include 'connection.php';

$sql = "INSERT INTO booking (user_id,booking_place_id,no_of_person,no_of_days,travel_cost,starting_date,ending_date) VALUES ('$user_id','$place_id','$No_of_person','$no_of_days','$cost','$new_date','$ending_date');";

if ($conn->query($sql) === TRUE) {
    $sql = "SELECT max(booking_id) as max from booking";
	$result =  $conn->query($sql);
	$row = $result->fetch_assoc();
	echo $row['max'];
} else {
    echo "Error";
}





?>