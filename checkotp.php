<?php
      require('connection.php');
     session_start();
     if($_SESSION['otpsent'] == $_POST['otpsender']){
        echo"
          <script>
          window.location.href='finial.php';
          </script>
         ";

     }
     else{
        $queryy =  "DELETE FROM `users_data` WHERE `applicationNo`LIKE'$_SESSION[aplication_no]'";
        if($con->query($queryy)==false){
            echo"query donot run";
        }
        else{echo"
          <script>
          alert('OTP is wrong. please try again');
          window.location.href='index.php';
          </script>
         ";}
     }
  
       ?>