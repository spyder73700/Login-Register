 <?php require('connection.php');
 require('login_register.php');
 
 ?>
 
 
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
        if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
           echo"<div style='display:flex; gap:1rem;'>
           
           <h1 style=' text-align: center; color: black'> $_SESSION[username]</h1>
           <a style='background-color:white;  padding: 10px; height: 20px; ' href='logout.php'>LOGOUT</a>
           </div>";
        }
        else if(isset($_SESSION['register']) && $_SESSION['register']==true){
            echo"<div style='display:flex; gap:1rem;'>
           
           <h1 style=' text-align: center; color: black'> $_SESSION[username_register]</h1>
           <a style='background-color:white;  padding: 10px; height: 20px; ' href='logout.php'>Back</a>
           </div>";
           
        }
        else{
         echo"<div>
         <button type='button' onclick=\"popup('userpopup' , 'registerpopup')\">Login</button>
         <button type='button' onclick=\"popup('registerpopup' , 'userpopup')\">Register</button>
         </div>";
         

        }       
       ?>
        
    </header>
      <div class="container">
  <div class="pop-container" id="userpopup">
    <div class="popup" >
        <form method="post" action="login_register.php">
            <h2>
            <span>Login</span>
            <button type="reset" id="reset"  >X</button>
            </h2>
            <span id="email-error"></span>
            <input type="Email" name="loginemail" id="email" spellcheck="false" placeholder="Email" onkeyup="validemail()" onblur="removeerror('email' , 'email-error')">
            <input type="password" name="loginpass" placeholder="Password">
           <div class="last">
               <button type="submit" name="login" id="LOGIN-button">LOGIN</button>
               <a href="#" style="color:red;">Forget Password!</a>   
           </div>
           <br>
           <button onclick="display('registerpopup' , 'userpopup')" id="dontaccount">I don’t have account</button>
           
        </form>
    </div>

  </div>
  </div>
  <div class="container">
  <div class="pop-container" id="registerpopup">
    <div class="popup" >
        <form action="login_register.php" method="post">
            <h2>
            <span>MAKE ONE</span>
            <button type="reset" id="reset" onclick="diablebutton()">X</button>
            </h2>
            <input type="text" id="name2" name="name" placeholder="Username">

            <span id="email-error2"></span>

            <input type="Email" name="mail" id="email2"  placeholder="Email" spellcheck="false" onkeyup="validemail2()" onblur="removeerror('email2','email-error2')">
           
            <span id="outbox"></span>
           
            <input type="password" name="pass" placeholder="Password" id="passwordcheck" onkeyup="strength()" onblur="removeerror('passwordcheck','outbox')" >
           
            <span id="confirm"></span>
           
            <input type="password" id="passwordcheck2" placeholder="Confirm Password" onblur="confirmpassword('passwordcheck','passwordcheck2'),removeerror('passwordcheck2','confirm')"> 
           
            <button disabled type="submit" id="Register-button" name="register" >REGISTER</button>
        </form>
    </div>
  </div>
  </div>
  <?php
   if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
    
    //echo "<script>document.getElementById(userpopup).style.display='none';</script>";
    
    echo"<h1 style='   text-align: center; background-color:white; color:red ; margin-bottom: 5px;'>Application No- $_SESSION[apli_no]</h1>";
   // echo"<h1 style=' margin-top:220px; text-align: center; background-color:white;height:100px;  color:red;'>Welcome Back!😉 </h1>"; 
    $_SESSION['logged_in']==false;
   }

    if(isset($_SESSION['register']) && $_SESSION['register']==true){
         
        echo "<script>
                window.location.href='emailsender.php';

           </script>";
        echo"<h1 style='   text-align: center; background-color:white; color:red ; margin-bottom: 5px;'>Application No- $_SESSION[aplication_no]</h1>";
       // echo"<h1 style=' margin-top:220px; text-align: center; background-color:white;height:100px;  color:red;'>Welcome Back!😉 </h1>";
       echo"<div class='otp'>
       <h1>Verify Your Email</h1>
       <br><br>
       <h3>Enter Otp sent to your Gmail</h3>
       <form method='post' >
           <input name='otpsender' id='otp_number' type='text' placeholder='OTP'>
           
           <button type='submit' id='otp_button' name='sendotp'>Verfiy</button>
       </form> 
    </div>";

        $_SESSION['register'] = false;
       
   }

  ?>


 
  <script src="login.js"> </script>
</body>
</html>


