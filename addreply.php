<?php
    session_start();
    include 'connect.php';
    include 'content-function.php';
    $comment = nl2br(addslashes($_POST['comment']));
    $cid = $_GET['cid'];
    $scid = $_GET['scid'];
    $tid = $_GET['tid'];
    $user = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');
    $insert = "INSERT INTO replies(CategoryId, SubcategoryId, TopicId, Author, Reply, Date_Posted) 
    VALUES ('$cid','$scid','$tid','$user','$comment','$date')";
    $query = mysqli_query($connect, $insert);
    echo $query;
    if($query){
        addreply($cid, $scid,$tid);
        header("Location: /readtopic.php?cid=$cid&scid=$scid&tid=$tid");
        
    }
?>