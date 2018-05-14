<?php
session_start();
include("dbConn.php");
$username = $_POST['username'];
$password = $_POST['password'];
$select = "SELECT Username, Pwrd FROM users WHERE Username = '$username' AND Pwrd ='$password'";
$result = $conn->query($select);
if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    header("Location: " . $_SERVER['HTTP_REFERER'] . "?status=login-fail");
}
?>