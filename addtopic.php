<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'header.php';
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>:Welcome to the home page</title>
</head>
<body>
<style>
.image-upload > input
{
    display: none;
}

.image-upload a i
{
    cursor: pointer;
}
ul li {
	list-style-type:none;
}
</style>
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
                if (isset($_POST['submit'])) {
                    $captcha = $_POST['g-recaptcha-response'];
                    $success = recapture($captcha);
                    if ($success) {
                        $scid = $_GET['scid'];
                        $cid = $_GET['cid'];
                        $title = $_POST['title'];
                        $content = $_POST['comment'];
					
	//upload file 
                        $file = $_FILES['file'];

                        $fileName = $_FILES['file']['name'];
                        $fileTmpName = $_FILES['file']['tmp_name'];
                        $fileSize = $_FILES['file']['size'];
                        $fileError = $_FILES['file']['error'];
                        $fileType = $_FILES['file']['type'];

                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));

                        if ($_FILES['file']['name'] == "") {
                            $fileNameNew = null;
                        }
                        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'ogg', 'WebM', 'mp4', 'gif');

                        if (in_array($fileActualExt, $allowed)) {
                            if ($fileError === 0) {
                                if ($fileSize < 10000000) {
                                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                    if ($fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/pdf' || $fileType == 'image/gif') {
                                        $fileDestination = 'uploads/images/' . $fileNameNew;
                                    } else {
                                        $fileDestination = 'uploads/videos/' . $fileNameNew;
                                    }
                                    move_uploaded_file($fileTmpName, $fileDestination);
                                } else {
                                    echo "Your file is too big!";
                                }
                            } else {
                                echo "There was an error uploading your file!";
                            }
                        } else {
                            echo "You cannot upload files of this type!";
                        }
	//--file--
                        addtopic($cid, $scid, $title, $content, $fileNameNew, $fileType);
                    } else {
                        echo "<script>alert('recaptcha failed try again')</script>";
                    }
                } else {
                    $scid = $_GET['scid'];
                    $cid = $_GET['cid'];
                    echo '<div class="row">
                <div class="col-12 col-sm-12">
                    <form action="addtopic.php?cid=' . $cid . '&scid=' . $scid . '" method="post" enctype="multipart/form-data">
                            <h2>Post Your Reply</h2>
                            <div class="row">
                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="title">Title:</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Content:</label>
                                        <label>Upload Image File:</label><br/>
                            <ul>
                                <li><div class="image-upload">
                                <label for="file-input"><a><i class="fa fa-image"></i></a> Photo/Video</label>
                                <input name="file" type="file" class="inputFile" id="file-input"></input>
                                </div></li>
                            </ul>
                                        <textarea class="form-control" name="comment" id="comment" cols="40" rows="5"></textarea>
                                    </div>
                                    <br>
                                    <div class="g-recaptcha" data-sitekey="6LdakFUUAAAAAKhIrniyOdpm9Jo_EIfdZRntvJ2E">
                    
                                    </div>
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
  <p></p>
</footer>

</body>
</html>