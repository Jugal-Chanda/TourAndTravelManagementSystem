<?php
$cookie_name = "user";
if(!isset($_COOKIE[$cookie_name])){
    header("Location: login.php");
}
$user_id = $_COOKIE[$cookie_name];


include 'connection.php';
$admin_id = $_COOKIE[$cookie_name];
$sql = "SELECT * FROM information WHERE user_id = '$user_id';";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$image = $row['profile_image'];
$name = $row['name'];
$user_name = $row['user_name'];
$email = $row['email'];
$age = $row['age'];
$payment_type = $row['payment_type'];
$ac_no = $row['account_number'];

$profile  = array($name,$user_name,$email,$payment_type,$ac_no,$image);
$profile_json = json_encode($profile);
echo $profile_json;


?>