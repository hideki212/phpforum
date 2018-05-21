<?php
session_start();
include 'content-function.php';
header("Content-Type: application/json", true);
header("Access-Control-Allow-Origin: *");
if(isset($_POST['replyId']) && isset($_SESSION['username']) && isset($_SESSION['admin'])){
   echo confirmDelete($_POST['replyId'], null);
}else if(isset($_POST['topicId']) && isset($_SESSION['username']) && isset($_SESSION['admin'])){
    echo confirmDelete(null ,$_POST['topicId']);
}
?>