<?php
session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login_Register</title>
</head>
<body>
    <header>
     <img id="logo" src="logo.png">
        
       <?php
            echo"<div style='display:flex; gap:1rem;'>
           <h1 style=' text-align: center; color: black'> $_SESSION[username_register]</h1>
           </div>";     
       ?>
        
    </header>

    <?php echo" <h1 style='   text-align: center; background-color:white; color:red ; margin-bottom: 5px;'>Application No- $_SESSION[aplication_no]</h1>";
    ?>

    <h1 style="margin-left:400px;">you are verfied user at <b style="background-color:#FF9800;">TRADEWITHSAHIL24X7</b></h1>
  <script src="login.js"> </script>
</body>
</html>