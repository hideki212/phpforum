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
  <div class="content">
    <div class="row">
      <div class="col-sm-10 text-left"> 
      <?php include 'ads.php' ?>
        <?php
        include 'content-function.php';
        dispcategories();
        ?>
            <?php include 'ads.php' ?>
      </div>
      <?php include 'adsside.php'; ?>
    </div> 

  </div>
</div>

  <?php
  include 'footer.php';
  ?>

    
</body>
</html>