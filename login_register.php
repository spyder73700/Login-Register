<?php
  require('connection.php');
  $insert=false;
  session_start();
 
  //for login
  if(isset($_POST['login'])){
    $loginemail = $_POST['loginemail'];
    $loginpass = $_POST['loginpass'];
    $query = "SELECT * FROM `users_data` WHERE `email` LIKE '$loginemail' ";
    $logresult = mysqli_query($con , $query);
    if($logresult){
        if(mysqli_num_rows($logresult)==1){
              $result_fetch = mysqli_fetch_assoc($logresult);
              if(password_verify($loginpass , $result_fetch['password'])){
                //pass is correct
                $_SESSION['logged_in']=true;
                $_SESSION['username']= $result_fetch['username'];
                $_SESSION['apli_no']= $result_fetch['applicationNo'];
                echo"
                <script>
                 window.location.href='index.php';
                </script>
                ";
              }      
              
              else{
                echo"
                <script>
                alert('INCORRECT PASSWORD');
                 window.location.href='index.php';
                </script>
                ";
              }
        }  
        else{
          echo"
            <script>
            alert('EMAIL NOT REGISTERED');
            window.location.href='index.php';
            </script>
            ";
        }

      }  
      else{
        echo"
            <script>
            alert('query doesnot run');
            window.location.href='index.php';
            </script>
            ";
      } 
    }
 



  //for registeration
 if(isset($_POST['register'])){ 
  $mail = $_POST['mail'];
  $pass = $_POST['pass'];
  $name = $_POST['name'];
  
  
  $user_exist_query = "SELECT * FROM `users_data` WHERE `username`='$name' OR `email`='$mail' ";
  $result = mysqli_query($con , $user_exist_query);

  if($result){
     if(mysqli_num_rows($result)>0){
      $result_fetch = mysqli_fetch_assoc($result);
      if($result_fetch['username']==$name){
        echo"
          <script>
          alert('USERNAME ALREADY EXIST');
          window.location.href='index.php';
          </script>
         ";
      }
      else{
        echo"
        <script>
        alert('EMAIL ALREADY EXIST');
        window.location.href='index.php';
        </script>
       ";
      }
     }
     else{
      $encypass = password_hash($pass , PASSWORD_BCRYPT);
      $sql="INSERT INTO `users_data` ( `username`, `email`, `password`) VALUES ( '$name', '$mail', '$encypass');";
  
      if($con->query($sql)==true){
        $insert = true;   
        $query = "SELECT * FROM `users_data` WHERE `email` LIKE '$mail' ";
        $regresult = mysqli_query($con , $query);
        $result_fetch_register = mysqli_fetch_assoc($regresult);
        $_SESSION['username_register']= $result_fetch_register['username'];
        $_SESSION['aplication_no']= $result_fetch_register['applicationNo'];
        $_SESSION['register'] = true;    
        $_SESSION['register_email_to_send_otp'] = $result_fetch_register['email'];
        echo "<script>
                window.location.href='emailsender2.php';

           </script>";
      }
      else{
        echo "error : $sql <br> $con->error";  
      }
     }

  }
  else{
    echo"
    <script>
     
     window.location.href='index.php';
    </script>
    ";
  }
  
} 
$con->close(); 
?>










 
