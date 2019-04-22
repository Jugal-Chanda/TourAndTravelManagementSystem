<?php
include 'connection.php';

$sql = "SELECT max(p_id) as max FROM tourist_place";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$max_id = 0;
if (is_null($row["max"])) {
    $max_id = 0+1;
}
else{
    $max_id = $row["max"]+1;
}

if(!empty($_POST['place']) || !empty($_POST['travel_cost']) || !empty($_FILES['tourist_place_image']['name']) || !empty($_POST['city_town']) || !empty($_POST['country'])){
    $uploadedFile = '';

    if(!empty($_FILES["tourist_place_image"]["type"])){
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["tourist_place_image"]["name"]);
        $file_extension = end($temporary);
        $fileName = "tourist_place_cover".$max_id.".".$file_extension;
        if((($_FILES["tourist_place_image"]["type"] == "image/png") || ($_FILES["tourist_place_image"]["type"] == "image/jpg") || ($_FILES["tourist_place_image"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['tourist_place_image']['tmp_name'];
            $targetPath = "../../tourist_place/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
                $place = $_POST['place'];
                $country = $_POST['country'];
                $travel_cost = $_POST['travel_cost'];
                $city_town = $_POST['city_town'];
                $sql = "INSERT INTO tourist_place (p_id, place_name, place_cover_photo,travel_cost,city_town,country) VALUES ('$max_id', '$place','$uploadedFile','$travel_cost','$city_town','$country');";
                $insert =$conn->query($sql);
                
                echo $insert?'ok':'Something Wrong ';
            }
            else {
                echo "file not upload ";
            }
        }
    }
    else{
        echo "file not upload ";
    }
    
    
}
?>