<?php

session_start();
include('config.php');
if(!isset($_SESSION["fname"]))
 {
     header("location.login.php");
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>

    <link rel="stylesheet" href="style.css">
    <style>
        div.header {
         
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 60px;
            background: linear-gradient(to right, rgb(204, 66, 66),grey); 

        }
        
        div.header button {
          
            background-color: aqua;
            font-size: 16px;
            font-weight: 600;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 8px;
        
}

 button a{
     text-decoration: none;
 } 

 input[type="submit"]
   {
            background-color: aqua;
            font-size: 16px;
            font-weight: 600;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 8px;
   }


        }

    </style>
    <script>
       function validate()
       {
   if(document.form.password.value=="")
    {
   alert("Old Password Filed is Empty !!");
   return false;
   }
   else if(document.form.npassword.value=="")
  {
   alert("New Password Filed is Empty !!");
   return false;
   }
  else if(document.form.cpassword.value=="")
    {
   alert("Confirm Password Filed is Empty !!");
   return false;
   }
  else if(document.form.npassword.value!= document.form.cpassword.value)
   {
   alert("Password and Confirm Password Field do not match  !!");
   return false;
   }
    return true;
 }
   </script>
</head>
<body>

<div class="header">
        <h1>Welcome!!!! - <?php echo $_SESSION["fname"];   ?> </h1>
        
        <button type="button"><a href="passwordchange.php">Change Password</a></button>
        <button type="button" value="logout" name="logout"><a href="logout.php">LOGOUT</a></button>
        
    </div>
   

    <div class="container">
        <h2>Change Password</h2>
        <form name="form" method="POST" onsubmit="return validate()">
         
    <label for="password"><b>Old Password</b></label>
    <input type="password" placeholder="Enter Old Password" name="password" id="password" required>
    
    
    <label for="password"><b>New Password</b></label>
    <input type="password" placeholder="Enter New Password" name="npassword" id="npassword" required>

    
    <label for="password"><b>Confirm Password</b></label>
    <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" required>
    
    <input type="submit" name="submit" value="Change Password">

    </form>
       </div>

      
    </div>
   


</body>
</html>


<?php

if(isset($_POST['submit']))
 {
    
   $oldpass=$_POST["password"];
   $fname=$_SESSION["fname"];
   $newpass=$_POST["npassword"];
   $cpass=$_POST["cpassword"];


     $query="UPDATE details SET password='$newpass', cpassword = '$cpass' WHERE fname='$fname'";      
      $result=mysqli_query($conn,$query);
     if($result){
     echo "<script>alert('Password Changed Successfully')</script>";
   }
   else
  {
   echo "<script>alert('Failed to Change Password')</script>";
  }
 
 }


?>