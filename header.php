<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="styles/css/freelancer.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="js/bootstrap.js"></script>
<!-- <script src="js/custom.js"></script>
<script src="js/freelancer.js"></script> -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/styles/main.css">
<meta name="exoclick-site-verification" content="2891f28d79f0d85f18fbf7dfc6ed15b1">
<script>
function confirmDelete(ReplyId){
	var a = confirm("asdas");
	if(a == true){
		alert(ReplyId);
		$.ajax({
			url: "forum/topics.php",
			type: "",
			dataType: "json",
			data: {
				'replyId' : ReplyId
			},
			success: function(response){
				alert(response);
			},
			error: function(jqXHR, textStatus,errorThrown){
				console.log(textStatus, errorThrown);
			}
		});
	}
}

</script>
<?php 
ob_start();

?>