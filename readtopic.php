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
    <?php
    include 'nav.php';
    ?>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-10 text-left">
                    <?php
                    include 'content-function.php';
                    if (isset($_SESSION['username'])) {
                        replylink($_GET['cid'], $_GET['scid'], $_GET['tid']);
            //    echo '<div class="row"><div class="col-sm-12"><div class="pull-right"><a class="btn btn-primary"
            //     href="replyto?cid=' .$_GET['cid'].'&scid='.$_GET['scid']. '&tid='.$_GET['tid'].'">Reply</a></div></div></div><br>';
                    } else {
                        echo '<div class="row"><div class="col-sm-12"><div class="col-sm-offset-3"><h2>You must be logged in to post a reply</h2>
                <p><a href="login.php">Login</a> or <a href="register.php">Register</a></p><br></div></div></div><br>';
                    }
                    addview($_GET['cid'], $_GET['scid'], $_GET['tid']);

                    disptopic($_GET['cid'], $_GET['scid'], $_GET['tid']);

                    dispreplies($_GET['cid'], $_GET['scid'], $_GET['tid']);
                    ?>
                        <div class="row">
                            <div class="col-sm-12">

                            </div>
                        </div>
                        <?php include 'ads.php' ?>
                </div>
            <?php include 'adsside.php' ?>
            </div>
        </div>

        <footer class="container-fluid text-center">
            <p></p>
        </footer>

</body>

</html>