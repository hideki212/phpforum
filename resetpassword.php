<?php
include 'connect.php';
include 'content-function.php';
if (isset($_POST['submit'])) {
    $captcha = $_POST['g-recaptcha-response'];
    $success = recapture($captcha);
    if ($success) {
        $token = $_GET['token'];
        $check = mysqli_query($connect, "SELECT * FROM users WHERE password = '$token'");
        $rows = mysqli_num_rows($check);
        if ($rows != 0) {
            while ($row = mysqli_fetch_assoc($check)) {
                $db_username = $row['username'];
                $db_password = $row['password'];
                $db_id = $row['id'];
                $db_email = $row['email'];
            }
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $encrypted = sha1($password);
            if ($password2 == $password) {
                $update = "UPDATE users SET password = '$encrypted'  WHERE id = $db_id";
                if ($connect->query($update) === true) {
                    echo "Reset Successful <a href='login.php'>click here to login</a>";
                } else {
                    echo "Error updating record: " . $connect->error;
                }
            }
        }
    } else {
        echo "<script>alert('recaptcha failed try again')</script>";
    }
}
?>

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
                    <div class="panel-heading">Forgot Password</div>
                    <div class="panel-body">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <?php 
                        if (isset($_SESSION['username'])) {
                            echo 'already logged in';
                        } else if (isset($_GET['token'])) {
                            $token = $_GET['token'];
                            echo '<form action="resetpassword.php?token=' . $token . '" method="post">
									<div class="form-group">
									<label for="password">New Password :</label><br><input class="form-control" type="text" name="password" id="password">
                                    </div>
                                    <div class="form-group">
									<label for="password2">Re-enter Password :</label><br><input class="form-control" type="text" name="password2" id="password2">
                                    </div>
                                    <div class="g-recaptcha" data-sitekey="6LdakFUUAAAAAKhIrniyOdpm9Jo_EIfdZRntvJ2E">
                                
                                    </div>
                                <br><input class="btn btn-primary btn-xl" type="submit" value="Reset" name="submit">
                            </form>';
                        } else {
                            echo 'what are your doing here';
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
    <?php include 'ads.php' ?>
  </div>
</div>
</body>
</html>