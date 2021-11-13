<?php

session_start();
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
    <title>Login and Logout In PHP</title>
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


        }

    </style>
</head>
<body>
   
    <div class="header">
        <h1>Welcome!!!! - <?php echo $_SESSION["fname"];   ?> </h1>
        
        <button type="button"><a href="passwordchange.php">Change Password</a></button>
        <button type="button" value="logout" name="logout"><a href="logout.php">LOGOUT</a></button>
        
    </div>
   
  
   
   

</body>
</html>