<?php

include 'connection.php';

$place_name = $_POST['place_name'];
$place_id = $_POST['id'];
$travel_cost = $_POST['travel_cost'];
$place_city_town = $_POST['place_city_town'];
$place_country = $_POST['place_country'];

$sql = "UPDATE tourist_place SET place_name = '$place_name',travel_cost = '$travel_cost',city_town='$place_city_town',country='$place_country' WHERE p_id = '$place_id';";
if ($conn->query($sql) === TRUE) {
    echo 1;
} else {
    echo 0;
}

?>