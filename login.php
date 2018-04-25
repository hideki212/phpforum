<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:User Login</title>
    <?php
    include 'header.php';
    ?>
    <style>
        .center_div{
            margin: 0 auto;
            width:80% /* value of your choice which suits your alignment */
        }
    </style>
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
                        <div class="panel-heading">Login</div>
                            <div class="panel-body">
                                <div class="col-sm-4">
                            </div>
                                <div class="col-sm-4">
                                        <?php
                                        if(isset($_SESSION['username'])){
                                            echo "already logged in";
                                        }else{
                                            echo '<form action="login.php" method="post">
                                            <div class="form-group">
                                                <label for="username">Username :</label>
                                                <input class="form-control" type="text" name="username" id="username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password :</label>
                                                <input class="form-control" type="password" name="password" id="password">
                                            </div>
                                            <input class="form-control" type="submit" class="btn btn-default" value="Login" name="submit">
                                        </form><br>
                                            <a href="forgotpassword.php"><p>Forgot password</p></a>';
                                        
                                        }
                                    ?>

                                </div>
                                <div class="col-sm-4">
                                </div>
                            </div>
                        </div>  
                    </div>      
                </center>
        </div>
        <div class="col-sm-2"></div>
        </div>
    </div>

<?php //include 'ads.php'?>


</body>
</html>
<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username && $password) {
        $check = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
        $rows = mysqli_num_rows($check);
        if ($rows != 0) {
            while ($row = mysqli_fetch_assoc($check)) {
                $db_username = $row['username'];
                $db_password = $row['password'];
                $db_id = $row['id'];
            }
            if ($username == $db_username && sha1($password) == $db_password) {
                echo 'logged in';
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $db_id;
                header('Location: index.php');
            } else {
                echo 'Incorrect password';
            }
        } else {
            die('user not found');
        }
    } else {
        echo 'Please fill in fields';
    }
}
?>