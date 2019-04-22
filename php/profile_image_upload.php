<?php
include 'connection.php';
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header("Location: login.php");
}
$user_id = $_COOKIE[$cookie_name];


$sql = "SELECT profile_image from information where user_id = '$user_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$image_name = $row['profile_image'];
if($image_name!="blankimage.jpg"){
    unlink("../profile_image/".$image_name);
}

if(!empty($_FILES['image_file']['name'])){
    $uploadedFile = '';

    if(!empty($_FILES["image_file"]["type"])){
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["image_file"]["name"]);
        $file_extension = end($temporary);
        $fileName = "profile_image_user".$user_id.".".$file_extension;
        if((($_FILES["image_file"]["type"] == "image/png") || ($_FILES["image_file"]["type"] == "image/jpg") || ($_FILES["image_file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['image_file']['tmp_name'];
            $targetPath = "../profile_image/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    
 
    
    //include database configuration file
    
    //insert form data in the database
    $sql = "UPDATE information set profile_image = '$fileName' where user_id = '$user_id';";
    $update =$conn->query($sql);
    
    echo $update?'ok':'Something Wrong ';
}
?>