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
<script type="text/javascript">
function confirmDelete(ReplyId, TopicId){
	var a = confirm("asdas");
	var location = "/delete.php";
	if(a == true){
		if(ReplyId != null){
				$.ajax({
				url: location,
				type: "POST",
				data: {
					replyId : ReplyId
				},
				success: function(response){
					alert(response.message);
					if(response.success == true){
						window.location.reload(true);
					}
				},
				error: function(jqXHR, textStatus,errorThrown){
					console.log(textStatus, errorThrown);
					console.warn(jqXHR.responseText)
				}
			});
		}else{
			$.ajax({
				url: location,
				type: "POST",
				data: {
					topicId : TopicId
				},
				success: function(response){
					alert(response.message);
					if(response.success == true){
						window.location.reload(true);
					}
				},
				error: function(jqXHR, textStatus,errorThrown){
					console.log(textStatus, errorThrown);
					console.warn(jqXHR.responseText)
				}
			});
		}
	}
}
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
				$('#preview').empty();
                reader.onload = function (e) {
					if(input.files[0].type.includes('video')){
						$('#preview').append("<video class='media' width='400' controls> <source src="+ e.target.result +
						" id='video'>Your browser does not support HTML5 video.</video>");	
					}else{
						//$('#preview').attr('src', e.target.result);
						$('#preview').append("<img class='media' id='image' src="+  e.target.result +">")
					}
                    
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
<?php 
ob_start();
?>