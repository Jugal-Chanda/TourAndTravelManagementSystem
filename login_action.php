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
	$username=($_POST['uname']);
	$password=($_POST['psw']);

	 // $password=md5($password);
	$sql= "SELECT * FROM information WHERE user_name= '$username' AND password= '$password'" ;
	$result= mysqli_query($conn,$sql);
   
	if(mysqli_num_rows($result) == 1)
	{
		echo "you are successfully logged in";
		$row = mysqli_fetch_assoc($result);
		echo $row['user_id'];
		$cookie_name = "user";
		$cookie_value = $row['user_id'];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		$conn->close();
		header("Location: index.php");
	}
	else
	{
		echo "username or password is incorrect";
		$conn->close();
		
	}
	

}

$conn->close();
?>
