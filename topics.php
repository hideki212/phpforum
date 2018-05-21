<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'header.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:Welcome to the home page</title>
</head>
<body>
<?php
include 'nav.php';
?>
<div class="containern-fluid text-center">    
    <div class="content">
        <div class="row">

            <div class="col-sm-10 text-left "> 
            <?php
            if (isset($_SESSION['username'])) {
                echo '<div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2">
                    <a class="btn btn-primary" href="addtopic.php?cid=' . $_GET["cid"] . '&scid=' . $_GET["scid"] . '">Add Topic</a>
                </div>
                </div><br>';
            } else {
                echo '<div class="row"><div class="col-sm-12"><div class="col-sm-offset-3"><h2>You must be logged in to post a topic</h2>
                <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p><br></div></div></div><br>';
            }

            ?>
                <?php
                include 'content-function.php';
				if(isset($_POST['replyId'])){
					echo $_POST['replyId'];
					confirmDelete($_POST['replyId']);
				}
				disptopics($_GET['cid'], $_GET['scid']);
                ?>
                <br>
                <hr>
                <?php include 'ads.php' ?>
            </div>
            <?php include 'adsside.php' ?>
        </div>

    </div>
</div>

<footer class="container-fluid text-center">
  <p></p>
</footer>
    
</body>
</html>