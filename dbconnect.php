<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "smile_bot";

$DBConnect = mysqli_connect($host,$user,$password,$database) or die ("Connect Error");
mysqli_query($DBConnect,"SET CHARACTER SET UTF8");

?>