<?php

$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header("Location: ../login.php");
}

$user_id = $_COOKIE[$cookie_name];
include 'connection.php';


$name = $_POST['name'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$acno = $_POST['acno'];
$payment_type = $_POST['payment_type'];
$status = 0;

$sql = "UPDATE information SET name = '$name',user_name = '$user_name',email = '$email',account_number = '$acno',payment_type = '$payment_type' WHERE information.user_id = '$user_id';";

if ($conn->query($sql) === TRUE) {
    $status = 1;
} else {
    $status = 0;
}
$profile  = array($name,$user_name,$email,$acno,$payment_type,$status);
$profile_json = json_encode($profile);
echo $profile_json;


?>