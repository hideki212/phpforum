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
							} else {
								echo '<form action="forgotpassword.php" method="post">
								<div class="form-group">
										<label for="username">Username :</label><br><input class="form-control" type="text" name="username" id="username">
										</div>
										<div class="g-recaptcha" data-sitekey="6LdakFUUAAAAAKhIrniyOdpm9Jo_EIfdZRntvJ2E">
									
										</div>    
									<br><input class="btn btn-primary btn-xl" type="submit" value="Recover" name="submit">
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
    <?php include 'ads.php' ?>
  </div>
</div>
</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
//Load Composer's autoloader
require 'vendor/autoload.php';
include 'connect.php';
include 'content-function.php';
if (isset($_POST['submit'])) {
	$captcha = $_POST['g-recaptcha-response'];
	$success = recapture($captcha);
	if ($success) {
		$username = $_POST['username'];
		if ($username) {
			if (strlen($username) >= 5 && strlen($username) <= 50) {
				$check = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
				$rows = mysqli_num_rows($check);
				if ($rows != 0) {
					//Create a new PHPMailer instance
					$mail = new PHPMailer;
	//Tell PHPMailer to use SMTP
					$mail->isSMTP();
	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
					while ($row = mysqli_fetch_assoc($check)) {
						$db_username = $row['username'];
						$db_password = $row['password'];
						$db_id = $row['id'];
						$db_email = $row['email'];
					}
					$mail->SMTPDebug = 2;
	//Set the hostname of the mail server
					$mail->Host = 'server53.web-hosting.com';
	//Set the SMTP port number 
					$mail->Port = 465;
	//Set mailing mode 
					$mail->SMTPSecure = 'ssl';
	//Whether to use SMTP authentication
					$mail->SMTPAuth = true;
	//Username to use for SMTP authentication
					$mail->Username = 'admin@winw99.com';
	//Password to use for SMTP authentication
					$mail->Password = 'kopioice33';
	//Set who the message is to be sent from
					$mail->setFrom('admin@winw99.com', 'Admin');
	//Set an alternative reply-to address
					//$mail->addReplyTo('replyto@example.com', 'First Last');
	//Set who the message is to be sent to
					$mail->addAddress($db_email, $db_username);
	//Set the subject line
					$mail->Subject = 'PHPMailer SMTP test';
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
					//$mail->msgHTML(file_get_contents('contents.html'), __DIR__);

					$mail->msgHTML('<a href="https://www.winw99.com/resetpassword.php?token=' . $db_password . '">click here to reset password</a>');
	//Replace the plain text body with one created manually
					$mail->AltBody = 'This is a plain-text message body';
	//Attach an image file
					//$mail->addAttachment('images/phpmailer_mini.png');
	//send the message, check for errors
					if (!$mail->send()) {
						echo 'Mailer Error: ' . $mail->ErrorInfo;
					} else {
						echo 'Message sent!';
					}
				} else {
					echo 'username not found';
				}
			} else {
				echo 'username must be between 5 and 50 characters';
			}
		}
		$connect->close();
	} else {
		echo "<script>alert('recaptcha failed try again')</script>";
	}

}
?>
<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

?>