<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "amandaklinik";
$port = "3306";

$conn =mysqli_connect($hostname,$username,$password,$database_name,$port);

if($conn->connect_error){
    echo "koneksi database rusak";
    die("error!!");

}

?>


<!-- http://localhost/amanda/index.php -->