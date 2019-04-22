<?php

include 'connection.php';
$h_id = $_GET['id'];

$sql = "SELECT * FROM hotels WHERE h_id = '$h_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$image = "hotel_images/".$row['cover_photo'];
$hotel_name = $row['hotel_name'];
$city_town = $row['city_town'];
$country = $row['country'];
$cost = $row['cost'];

$tourist_place  = array($image,$hotel_name,$city_town,$country,$cost);

$tourist_place_json = json_encode($tourist_place);

echo $tourist_place_json;

?>