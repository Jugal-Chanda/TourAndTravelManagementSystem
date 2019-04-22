<?php

$user_id = $_POST['user_id'];
$pakage_id = $_POST['pakage_id'];
$new_date = date('Y-m-d', strtotime($_POST['s_date']));
echo $new_date;


include 'connection.php';

$sql = "SELECT * FROM pakages WHERE pakage_id = '$pakage_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$hotel_id = $row['hotel_id'];
$place_id = $row['place_id'];
$person = $row['person'];
$duration = $row['duration'];
$travel_cost = $row['travel_cost'];

$ending_date =  date('Y-m-d', strtotime($new_date. ' + '.$duration.'days'));




$sql = "INSERT INTO booking (user_id,booking_place_id,booking_hotel_id,no_of_person,no_of_days,travel_cost,starting_date,ending_date) VALUES ('$user_id','$place_id','$hotel_id','$person','$duration','$travel_cost','$new_date','$ending_date');";

if ($conn->query($sql) === TRUE) {
    echo "panding";
} else {
    echo "Error";
}


?>