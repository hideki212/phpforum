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
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-10 text-left"> 
        <div class="row">
            <div class="col-sm-12">
            <?php
            include 'content-function.php';
            if (isset($_SESSION['username'])) {
                if(isset($_POST['submit'])){
                    $scid = $_GET['scid'];
                    $cid = $_GET['cid'];
                    $title = $_POST['title'];
                    $content = $_POST['comment'];
                    addtopic($cid, $scid, $title, $content);
                }else{
                    $scid = $_GET['scid'];
                    $cid = $_GET['cid'];
                    echo '<div class="row">
                            <div class="col-12 col-sm-12">
                                <form action="addtopic.php?cid='.$cid.'&scid='.$scid.'" method="post">
                                        <h2>Post Your Reply</h2>
                                        <div class="row">
                                            <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="title">Title:</label>
                                                    <input type="text" class="form-control" name="title" id="title">
                                                </div>
                                                <div class="form-group">
                                                    <label for="comment">Content:</label>
                                                    <textarea class="form-control" name="comment" id="comment" cols="40" rows="5"></textarea>
                                                </div>
                                                <br>
                                                <input class="btn btn-primary" name="submit" type="submit" value="Post">
                                            </div>
                                        </div>
                                </form>                           
                            </div>
                        </div>';
                }

            } else {
                echo '<p>You must be logged in to post a topic</p>
                        <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p>';
            }
                //disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
            <?php
                //include 'content-function.php';
            //disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);
            ?>
            </div>
        </div>

    </div>
    <div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
    
  </div>
  <div class="row">
            <div class="col-sm-12 adplace">
                <div class="well">
                    <p>ADS</p>
                </div>
                <div class="well">
                    <p>ADS</p>
                </div>  
            </div>
        </div> 
</div>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
    
</body>
</html>