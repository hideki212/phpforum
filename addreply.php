<?php
include 'connect.php';
include 'content-function.php';
session_start();

if (isset($_SESSION['username'])) {
	if (isset($_POST['submit'])) {
		$captcha = $_POST['g-recaptcha-response'];
		$success = recapture($captcha);
		if ($success) {
			$comment = nl2br(addslashes($_POST['comment']));
			$cid = $_GET['cid'];
			$scid = $_GET['scid'];
			$tid = $_GET['tid'];
			if (strlen($comment) < 30) {

				header('Location: ' . $_SERVER['HTTP_REFERER'] . '&error=1');
			} else {
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
				if ($fileNameNew != null) {
					$allowed = array('jpg', 'jpeg', 'png', 'pdf', 'ogg', 'WebM', 'mp4', 'gif');
					if (in_array($fileActualExt, $allowed)) {
						if ($fileError === 0) {
							if ($fileSize < 10000000) {
								$fileNameNew = uniqid('', true) . "." . $fileActualExt;
								if ($fileType == 'image/jpg' || $fileType == 'image/jpeg' || $fileType == 'image/png' || $fileType == 'image/pdf' ||
									$fileType == 'image/gif') {
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
				//--file-
				}
				$user = $_SESSION['username'];
				$date = date('Y-m-d H:i:s');
				$insert = "INSERT INTO replies(CategoryId, SubcategoryId, TopicId, Author, Reply, Date_Posted, name, type) 
					VALUES ('$cid','$scid','$tid','$user','$comment','$date', '$fileNameNew', '$fileType')";
				$query = mysqli_query($connect, $insert);
				if ($query) {
					addreply($cid, $scid, $tid);
					header("Location: /readtopic.php?cid=$cid&scid=$scid&tid=$tid");
				} else {
					echo "<script>alert('something went wrong trying to reply please try again')</script>";
				}
			}
		} else {
			echo "<script>alert('recaptcha failed try again')</script>";
		}
	} else {
		echo "<script>alert('recaptcha failed try again')</script>";
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
} else {
	echo "<script>alert('you must be logged in ')</script>";
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}


?>