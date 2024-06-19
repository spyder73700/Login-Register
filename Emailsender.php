<?php
      session_start();
      include('login_register.php');
      
       // To Remove unwanted errors
       error_reporting(0);

       // Add your connection Code
       include "connection.php";

       // Important Files (Please check your file path according to your folder structure)
       require "./PHPMailer-master/src/PHPMailer.php";
       require "./PHPMailer-master/src/SMTP.php";
       require "./PHPMailer-master/src/Exception.php";
       
       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\SMTP;

      

       // Email From Form Input
       $send_to_email = $_SESSION['register_email_to_send_otp'];

       // Generate Random 6-Digit OTP
       $verification_otp = random_int(0000, 9999);
       $_SESSION['otpsent'] = $verification_otp;
       // Full Name of User
       $send_to_name = $_SESSION['username_register'];

       function sendMail($send_to, $otp, $name) {
           $mail = new PHPMailer(true);
           $mail->isSMTP();
           $mail->SMTPAuth = true;
           $mail->SMTPSecure = "tls";
           $mail->Host = "smtp.gmail.com";
           $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
           $mail->Port = 587;

           // Enter your email ID
           $mail->Username = "tradewithsahil24x7@gmail.com";
           $mail->Password = "vpxc sdbp esrx znpz";

           // Your email ID and Email Title
           $mail->setFrom("tradewithsahil24x7@gmail.com", "Tradewithsahil24x7");

           $mail->addAddress($send_to);

           // You can change the subject according to your requirement!
           $mail->Subject = "Account Activation";

           // You can change the Body Message according to your requirement!
           $mail->Body = "Hello, {$name}\nYour account registration is successfully done! Now activate your account with OTP {$otp}.";
           $mail->send();
       
       }
       sendMail($send_to_email, $verification_otp, $send_to_name);

      
      
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
            echo"<div style='display:flex; gap:1rem;'>
           <h1 style=' text-align: center; color: black'> $_SESSION[username_register]</h1>
           <a style='background-color:white;  padding: 10px; height: 20px; ' href='logout.php'>Back</a>
           </div>";     
       ?>
        
    </header>

    <?php echo" <h1 style='   text-align: center; background-color:white; color:red ; margin-bottom: 5px;'>Application No- $_SESSION[aplication_no]</h1>";?>
       <div class='otp'>
       <h1>Verify Your Email</h1>
       <br><br>
       <h3>Enter Otp sent to your Gmail</h3>
       <form method='post' action="checkotp.php">
           <input name='otpsender' id='otp_number' type='text' placeholder='OTP'>
           
           <button type='submit' id='otp_button' name='sendotp'>Verfiy</button>
       </form> 
    </div>
    

 
  <script src="login.js"> </script>
</body>
</html>