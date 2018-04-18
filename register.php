<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:Regeister Your Account Here</title>
    <?php
    include 'header.php';
    ?>
</head>
<body>
<?php
include 'nav.php';
?>
<div class='content'>
<div class='row'>
    <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <center>
                <div class="panel panel-default fix-panel">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <?php 
                            if(isset($_SESSION['username'])){
                                echo 'already logged in';
                            }else{
                                echo '<form action="register.php" method="post">
                                <div class="form-group">
                                <label for="username">Username :</label><br><input class="form-control" type="text" name="username" id="username">
                                </div>
                                <div class="form-group">
                                <label for="password">Password :</label><br><input class="form-control" type="password" name="password" id="password">
                                </div>
                                <div class="form-group">
                                <label for="passwordconfirm">Retype Password :</label><br><input class="form-control" type="password" name="passwordconfirm" id="passwordconfirm">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label><br><input class="form-control" type="email" name="email" id="email">
                                </div>
                                <br><input class="btn btn-primary btn-xl" type="submit" value="Register" name="submit"> or <a href="register.php">Login</a>
                            </form>';
                            }
                        ?>
                    </div>
                    <div class="col-sm-4">
                    </div>
                        
                    </div>
                </div>        
            </center>
        </div>
        <div class="col-sm-2"></div>
    </div>
    <?php include 'ads.php'?>
  </div>
</div>
</body>
</html>
<?php
include 'connect.php';
if (isset($_GET['error'])) {
    $error = $_GET['error'];
    if (strpos($error, 'email')) {
        echo 'Email Aready exists';
    } else if (strpos($error, 'username')) {
        echo 'username exists';
    } else {
        echo 'something went worng please try again';
    }
}
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordconfirm = $_POST['passwordconfirm'];
    $email = $_POST['email'];
    $date = date('Y-m-d H:i:s');
    if ($username && $password && $passwordconfirm && $email) {
        if (strlen($username) >= 5 && strlen($username) <= 50) {
            if (strlen($password) >= 5 && strlen($password) <= 50) {
                if ($password != $passwordconfirm) {
                    echo "<p>Passwords do not match</p>";
                } else {
                    $shapass = sha1($password);
                    $insert = "INSERT INTO users(username, password, email, date) 
                    VALUES('$username','$shapass','$email', '$date')";
                    if ($connect->query($insert) === true) {
                        header('Location: /index.php/reg-success');
                        //echo "New record created successfully<br> ". "<a style='text-decoration:underline;' href='/index.html' >Go to Login</a>";
                    } else {
                        header('Location: /register.php/reg-failed/' . $connect->error);
                        //echo "Error: " . $insert . "<br>" . $connect->error . 
                        //"<a style='text-decoration:underline;' href='/register.html' >Go Back to register page</a>";
                    }
                }
            } else {
                echo 'password must be between 5 and 50 characters';
            }

        } else {
            echo 'username must be between 5 and 50 characters';
        }
    }
    $connect->close();
}
?>