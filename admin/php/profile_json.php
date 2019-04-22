<?php
$cookie_name = "admin";
if(!isset($_COOKIE[$cookie_name])){
	$profile  = array("no");
	$profile_json = json_encode($profile);
	echo $profile_json;   
}
else{
	include 'connection.php';
	$admin_id = $_COOKIE[$cookie_name];
	$sql = "SELECT * FROM information_admin WHERE admin_id = '$admin_id';";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$image = $row['profile_image'];
	$name = $row['name'];
	$user_name = $row['user_name'];
	$email = $row['email'];
	$age = $row['age'];
	$phone_number = $row['phone_number'];

	$profile  = array($name,$user_name,$email,$age,$phone_number,$image);
	$profile_json = json_encode($profile);
	echo $profile_json;
}

?>