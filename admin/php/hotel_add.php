<?php
include 'connection.php';

$sql = "SELECT max(h_id) as max FROM hotels";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$max_id = 0;
if (is_null($row["max"])) {
    $max_id = 0+1;
}
else{
    $max_id = $row["max"]+1;
}

if(!empty($_POST['hotel_name']) || !empty($_POST['sub_location']) || !empty($_FILES['hotel_image']['name'] || !empty($_POST['city_town']  || !empty($_POST['country']) ))){

    $uploadedFile = '';

    if(!empty($_FILES["hotel_image"]["type"])){
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["hotel_image"]["name"]);
        $file_extension = end($temporary);
        $fileName = "hotel_cover_image".$max_id.".".$file_extension;
        if((($_FILES["hotel_image"]["type"] == "image/png") || ($_FILES["hotel_image"]["type"] == "image/jpg") || ($_FILES["hotel_image"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){

            $sourcePath = $_FILES['hotel_image']['tmp_name'];
            $targetPath = "../../hotel_images/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    
    $sub_location = $_POST['sub_location'];
    $city_town = $_POST['city_town'];
    $country = $_POST['country'];
    $hotel_name = $_POST['hotel_name'];
 
    
    //include database configuration file
    
    //insert form data in the database
    $sql = "INSERT INTO hotels (h_id,hotel_name,sub_location,city_town,country,cover_photo) VALUES ('$max_id', '$hotel_name','$sub_location','$city_town','$country','$uploadedFile');";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>