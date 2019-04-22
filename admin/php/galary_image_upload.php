<?php
include 'connection.php';

$sql = "SELECT max(g_i_id) as max FROM galary_images";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$max_id = 0;
if (is_null($row["max"])) {
    $max_id = 0+1;
}
else{
    $max_id = $row["max"]+1;
}

if(!empty($_POST['place']) || !empty($_POST['email']) || !empty($_FILES['image_file']['name'])){
    $uploadedFile = '';

    if(!empty($_FILES["image_file"]["type"])){
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["image_file"]["name"]);
        $file_extension = end($temporary);
        $fileName = "galary_image".$max_id.".".$file_extension;
        if((($_FILES["image_file"]["type"] == "image/png") || ($_FILES["image_file"]["type"] == "image/jpg") || ($_FILES["image_file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['image_file']['tmp_name'];
            $targetPath = "../../galary_images/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    
    $place = $_POST['place'];
 
    
    //include database configuration file
    
    //insert form data in the database
    $sql = "INSERT INTO galary_images (g_i_id, image_name, place) VALUES ('$max_id', '$uploadedFile','$place');";
    $insert =$conn->query($sql);
    
    echo $insert?'ok':'Something Wrong ';
}
?>