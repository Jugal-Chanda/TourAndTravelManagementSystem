<!DOCTYPE html>
<html>
<head>
<title>login page</title>
<style>
body {font-family: Arial;}
form {border: 3px solid white;}

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid LightGray;
  box-sizing: border-box;
}

.imgcontainer {
  text-align: center;
}

button {
  background-color: MediumSeaGreen;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
  height: 40px;
}

.signup_btn {
	background-color: MediumSeaGreen;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
  height: 40px;
  font-weight: bolder;
}

button:hover {
  opacity: 0.8;
}

.container 
{
  padding: 16px;
}

.cancelbtn {
 
  padding: 10px 18px;
  width:80px;
  background-color: red;
}

</style>
</head>


<body>
<h2>Login page</h2>
<form action="login_action.php" method="POST">
 <div class="imgcontainer">
    <img src="login-image.png" alt="Image"  style="text-align: center;width: 90px;height: 90px;">
  </div>
<div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" id="uname" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <input type="submit" class="signup_btn" style="width: 10%; font-weight: bolder;font-size: 15px;" name="submit" value="Login" />
    <a href="signup.php" class="signup_btn" style="text-decoration: none;padding-right: 20px;">Sign up </a>
  </div>
</form>


</body>
</html>