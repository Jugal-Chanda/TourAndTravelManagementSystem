<?php


include 'connection.php';
$p_id = $_GET['id'];

$sql = "SELECT * FROM tourist_place WHERE p_id = '$p_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$image = "../tourist_place/".$row['place_cover_photo'];
$place = $row['place_name'];
$city_town = $row['city_town'];
$country = $row['country'];
$travel_cost = $row['travel_cost'];

$tourist_place  = array($image,$place,$city_town,$country,$travel_cost);

$tourist_place_json = json_encode($tourist_place);

echo $tourist_place_json;

?>