<?php
$host ="localhost";
$user ="winwfxrd_root";
$pass = "kopioice33";
$db = "winwfxrd_forum";
    $connect = mysqli_connect($host, $user, $pass, $db);
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }   
?>