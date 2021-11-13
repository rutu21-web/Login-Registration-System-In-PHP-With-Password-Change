<?php

include('config.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login Form</title>
<link rel="stylesheet" href="style.css">
<script>

function validate(){

    var fname = document.getElementById('fname').value;

   var password = document.getElementById('password').value;  

if(fname == "" || fname == "null")
 {
     alert('Name cannot be blank or null');
 }

 if(password == "")
  {
      alert('Password Cannot be blank');
  }else if(password == "password")
   {
       alert('Password cannot be Password');
   }

}

</script>
<style>
    body {
        background-color: white;
    }
</style>
</head>
<form method="POST" onsubmit="return validate()">
  <div class="container">
    <h1>Login Here</h1>
    <p>Please Enter The Credentials to Login</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>

  

  </div>
  
  <div class="container signin">
    <button type="submit" name="submit" value="login" class="loginbtn">Login</button>
    <div class="container signin">
    <p>Dont have an account? Kindly <a href="register.php">Register</a> First </p>
  </div>
  </div>


</form>

<?php

if(isset($_POST['submit']))
 {
    
    $query = "SELECT * FROM `details` WHERE `fname` = '$_POST[fname]' AND `password` = '$_POST[password]'";
    $result=mysqli_query($conn,$query);

    if(mysqli_num_rows($result)==1)
     { 
         session_start();
         $_SESSION["fname"]=$_POST["fname"];
        header("location: adminpanel.php");

     }else
     {
          echo "<script>alert('Incorrect Password');</script>";
     }


 }


?>


</body>
</html>

