<?php
$servername = "localhost";
$database = "dakota";
$username = "root";
$pass = "";

$konek = mysqli_connect($servername,$username,$pass,$database);
mysqli_select_db($konek,$database);
?>