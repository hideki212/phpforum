<?php
$host ="localhost";
$user ="root";
$pass = "";
$db = "forum";
    $connect = mysqli_connect($host, $user, $pass, $db);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }   
?>