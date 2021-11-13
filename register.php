<?php

include('config.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register Form</title>
<link rel="stylesheet" href="style.css">
</head>
<form method="POST">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="fname"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="fname" id="fname" required>

    <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="password" required>



    <label for="psw-repeat"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" required>
     
    <label for="mobile"><b>Mobile</b></label>
     <input type="text" placeholder="Enter Your Mobile" name="mobile" id="mobile" required>

    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="submit" value="register" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="login.php">Sign in</a>.</p>
  </div>
</form>
</body>
</html>

<?php

if(isset($_POST['submit']))
 {
     $fname=$_POST['fname'];
     $lname=$_POST['lname'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $cpassword=$_POST['cpassword'];
     $mobile=$_POST['mobile'];
     
    if($password==$cpassword)
     {
         $query="SELECT * FROM details WHERE email = '$email'";
         $result=mysqli_query($conn,$query);

       if(mysqli_num_rows($result)>0)
       {
           echo "<script>alert('Email Id already exists')</script>";
       }else
       {
           $query="INSERT INTO details (`fname`,`lname`,`email`,`password`,`cpassword`,`mobile`) VALUES ('$fname', '$lname', '$email', '$password', '$cpassword', '$mobile')";
           $result=mysqli_query($conn,$query);
         
          if($result) 
          {
              echo "<script>alert('You have successfully Registered');
              window.location='login.php';
              </script>";
             
          }else
           {
               echo "<script>alert('Registration Failed')</script>";
           }

       }

     }else
     {
         echo "<script>alert('Password And Confirm Password Donot Match')</script>";
     }
    
 }


?>