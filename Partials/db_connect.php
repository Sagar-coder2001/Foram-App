<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foram";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
   echo "Sorry we faild to connect " . mysqli_connet_error();
}
?>