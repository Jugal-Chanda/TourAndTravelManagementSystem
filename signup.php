<!DOCTYPE html>
<html>
<head>
<title>Sign up page</title>
<style>
body {font-family: Arial;}
form {border: 3px solid white;}

input[type=text], input[type=password], input[type=email], input[type=number] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid LightGray;
  box-sizing: border-box;
}

button {
  background-color: MediumSeaGreen;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 80%;
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

.cancelbtn {
 
  padding: 10px 18px;
  width:80px;
  background-color: red;
}

.signupbtn {
 
  padding: 10px 18px;
  width:80px;
  background-color: red;
}

.container 
{
  padding: 16px;
}

hr {
  border: 1px solid LightGray;
  margin-bottom: 25px;
}
</style>
</head>

<body>
<form action="signup_action.php" method="post">
 <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
  
   <label for="ename"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="ename" required>

   <label for="uname"><b>Username</b></label>
   <input type="text" placeholder="Enter Username" name="uname" required>

   <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" required> 

     <label for="age"><b>Age</b></label>
    <input type="number" placeholder="Enter Age" name="age" required>

     <label for="payment"><b>Payment type</b></label>
   <input type="text" placeholder="Enter payment type" name="payment" required>

    <label for="ac"><b>Account number</b></label>
   <input type="number" placeholder="Enter account number" name="ac" required>


    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
     <input type="submit" class="signup_btn" style="width: 10%; font-weight: bolder;font-size: 15px;" name="submit" value="Sign up" />
    
    <br>
    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>
    
 <div class="container" style="background-color:white;width:80% ;margin-left: 10%;">
  <a href="login.php" class="signup_btn" style="text-decoration: none;padding-right: 20px;">Log in </a>
    
  </div>

</form>
</body>
</html>











