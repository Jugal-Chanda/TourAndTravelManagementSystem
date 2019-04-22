<?php

include 'connection.php';
$p_id = $_GET['id'];

$sql = "SELECT tourist_place.place_cover_photo,tourist_place.place_name,tourist_place.city_town AS p_l_1,tourist_place.country AS p_l_2,catagory.catagory_name,pakages.travel_cost,pakages.person,pakages.duration,pakages.pakage_name,hotels.hotel_name,hotels.cover_photo,hotels.sub_location,hotels.city_town AS h_l_1,hotels.country AS h_l_2 FROM tourist_place,catagory,pakages,hotels WHERE pakages.place_id = tourist_place.p_id AND pakages.catagory_id = catagory.c_id AND pakages.hotel_id = hotels.h_id AND pakages.pakage_id = '$p_id';";

$result = $conn->query($sql);
$row = $result->fetch_assoc();

$place_image = "tourist_place/".$row['place_cover_photo'];
$hotel_image = "hotel_images/".$row['cover_photo'];
$place_name = $row['place_name'];
$place_location = $row['p_l_1'].', '.$row['p_l_2'];


$hotel_name = $row['hotel_name'];
$hotel_location = $row['h_l_1'].', '.$row['h_l_2'];
$travel_cost = $row['travel_cost'];
$duration = $row['duration'];
$person = $row['person'];
$pakage_name = $row['pakage_name']; 

$tourist_place  = array($place_image,$hotel_image,$place_name,$place_location,$hotel_name,$hotel_location,$travel_cost,$duration,$person,$pakage_name);

$tourist_place_json = json_encode($tourist_place);

echo $tourist_place_json;

?>