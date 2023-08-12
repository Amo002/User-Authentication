<?php 

$serverName = "localhost";
$dBusername = "root";
$dBpassword = "";
$dBname = "users";

$conn = mysqli_connect($serverName,$dBusername,$dBpassword,$dBname);

if(!$conn){
    die("faild".mysqli_connect_error());
}