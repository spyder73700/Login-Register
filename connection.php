<?php
$server = "localhost";
$username ="root";
$password = "";
$con = mysqli_connect($server,$username,$password,"registered_user");

if(!$con){
  die("connection fail".mysqli_connect_error());
}
?>