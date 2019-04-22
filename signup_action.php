<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ttm";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if(isset($_POST['submit'])){
	$name=($_POST['ename']);
	$username=($_POST['uname']);
	$email=($_POST['email']);
	$age=($_POST['age']);
	$payment=($_POST['payment']);
	$account=($_POST['ac']);
	$password=($_POST['psw']);
	$password2=($_POST['psw-repeat']);

	if($password == $password2)
	{
		//$password = md5($password);
		$sql="INSERT IGNORE INTO information(name,user_name,email,age,payment_type,account_number,password) VALUES ('$name','$username','$email','$age','$payment','$account','$password')";
    $esql= "SELECT * FROM information WHERE user_name= '$username' OR email='$email'" ;
	$result= mysqli_query($conn,$esql);
   
	if(mysqli_num_rows($result) == 1)
	{
		echo "username or email is incorrect";

	}
	else
	{
		echo "you are successfully signed up";
		if (mysqli_query($conn, $sql)) {
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

		
	}


$conn->close();
	}
	else
	{
      echo "your password do not match or user name is used before" ;
	}
}

?>
