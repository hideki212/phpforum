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
include 'connect.php';
if(isset($_POST['submit']) && isset($_SESSION['username']) && isset($_SESSION['admin']) && isset($_POST['name'])){
  $name = $_POST['name'];
  $insert = "INSERT INTO categories(Category) VALUES ('$name')";
  if ($connect->query($insert) === true){
    header("location: /");
  }else{
    echo $insert;
  }
}


?>

<div class="container-fluid text-center">  
  <div class="content">
    <div class="row">
      <div class="col-sm-10 text-left"> 
      <?php include 'ads.php' ?>
        <?php
        include 'content-function.php';
        if(isset($_SESSION['username']) && isset($_SESSION['admin'])){
          echo '<form action="index.php" method="Post">
          <div class="form-group">
          <label for="name">Add Main Category :</label>
          <input class="form-control" type="text" name="name" id="name">
          <input class="btn btn-primary" type="submit" class="btn btn-default" value="Submit" name="submit">
      </div>
    </form>';
        }

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