<?php

include 'connection.php';
$cookie_name = "admin";
if(!isset($_COOKIE[$cookie_name])){
    header("Location: login.php");
}

$admin_id = $_COOKIE[$cookie_name];

$name = $_POST['name'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$status = 0;

$sql = "UPDATE information_admin SET name = '$name',user_name = '$user_name',email = '$email',phone_number = '$phone_number' WHERE information_admin.admin_id = '$admin_id';";

if ($conn->query($sql) === TRUE) {
    $status = 1;
} else {
    $status = 0;
}
$profile  = array($name,$user_name,$email,$phone_number,$status);
$profile_json = json_encode($profile);
echo $profile_json;


?>