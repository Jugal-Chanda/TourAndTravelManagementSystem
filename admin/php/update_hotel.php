<?php

include 'connection.php';

$hotel_name = $_POST['hotel_name'];
$hotel_id = $_POST['id'];
$cost = $_POST['cost'];
$hotel_city_town = $_POST['hotel_city_town'];
$hotel_country = $_POST['hotel_country'];

$sql = "UPDATE hotels SET hotel_name = '$hotel_name',cost = '$cost',city_town='$hotel_city_town',country='$hotel_country' WHERE h_id = '$hotel_id';";
if ($conn->query($sql) === TRUE) {
    echo 1;
} else {
    echo 0;
}

?>