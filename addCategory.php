<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>:Add Category</title>
    <?php
    include 'header.php';
    ?>
</head>
<body>
<?php
include 'nav.php';
include 'content-function.php';
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
                        include "connect.php";
                        if(isset($_SESSION['username']) && isset($_SESSION['admin']) 
                        && isset($_POST['parent_id']) && isset($_POST['name']) && isset($_POST['discription'])){
                            $cat_id = $_POST['parent_id'];
                            $name = $_POST['name'];
                            $discription = $_POST['discription'];
                            $insert = "INSERT INTO subcategories(CategoryId, SubcategoryName, SubcategoryDescription) VALUES ($cat_id,'$name','$discription')";
                            if ($connect->query($insert) === true) {
                                header('Location:'.  "/");
                                //echo "New record created successfully<br> ". "<a style='text-decoration:underline;' href='/index.html' >Go to Login</a>";
                            } else {
                                //header('Location:' . "/");
                                echo "<script>alert('Error Adding new Category')</script>";
                                header('Location:'.  "/");  
                            }
                        }else if (isset($_SESSION['username']) && isset($_SESSION['admin']) && isset($_POST['parent_id'])) {
                            $cat_id = $_POST['parent_id'];
                            echo '<form action="addCategory.php" method="post">
                                <div class="form-group">
                                <label for="name">Category Name :</label><br><input class="form-control" type="text" name="name" id="name">
                                </div>
                                <div class="form-group">
                                <label for="discription">discription :</label><br><input class="form-control" type="text" name="discription" id="discription">
                                </div>
                                <input name="parent_id" value="'.$cat_id .'" hidden>
                                <div class="g-recaptcha" data-sitekey="6LdakFUUAAAAAKhIrniyOdpm9Jo_EIfdZRntvJ2E">
                                
                                </div>';

                            echo '<br><input class="btn btn-primary" type="submit" value="Add" name="submit">
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
    <?php 
    //include 'ads.php'

    ?>
  </div>
</div>
</body>
</html>