<?php
$servername="localhost";
$username = "root";
$password=" ";
$db_name="login";
$conn = new mysqli($servername, $username, $password, $db_name, 3307);
if($conn->connect_error){
  die("connection failed".$connect_error);
}
echo "";
?>