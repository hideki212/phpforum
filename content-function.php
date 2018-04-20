<?php
    function dispcategories(){
        include ("connect.php");
        $select = "SELECT * FROM categories";
        $result = $connect->query($select);
        while($row = $result->fetch_assoc()) {
            echo "<div class='row'>";
            echo "<div class='col-sm-12 fix-panel'>";
            echo "<div class='panel panel-default'>";
            echo "<div class='panel-heading'><h4>";
            echo $row['Category'];
            echo "</h4></div>";
            dispsubcategories($row['CategoryId']);
            //echo "</div>";
            echo "</div></div></div>"; 
        }
   
        $connect->close();
    }
    function dispsubcategories($parent_id){
        include ("connect.php");
        $select = "SELECT subcategories.CategoryId, subcategories.SubcategoryId, 
        subcategories.SubcategoryName, subcategories.SubcategoryDescription 
        FROM categories, subcategories WHERE ($parent_id = categories.CategoryId) 
        AND ($parent_id = subcategories.CategoryId)";
        $result = $connect->query($select);
       
        echo "<div class='panel-body fix-panel'>
        <div class='col-10 col-sm-10 text-left' style='text-decoration: underline;'><h5>Categories</h5></div>
        <div class='col-2 col-sm-2 text-left float-right' style='text-decoration: underline;'><h5>topics</h5></div><br><hr>";
        while($row = $result->fetch_assoc()) {                  
                echo '<div class="span12"><div class="row fix"><div class="board-topics"><a href="/topics.php?cid=';
                echo $row["CategoryId"];
                echo '&scid=';
                echo $row["SubcategoryId"];
                echo '">'; 
                echo '<div class="col-10 col-sm-10">';
                echo $row['SubcategoryName'];              
                echo '<p>';
                echo $row['SubcategoryDescription'];
                echo "</p></div>";
                echo '<div class="col-2 col-sm-2">';
                echo getnumtopics($parent_id, $row['SubcategoryId']);
                echo '</div>';       
                echo '</a></div></div></div>';
            }
            echo '</div>';

       
    }
    function getnumtopics($cat_id, $subcat_id){
        include ("connect.php");
        $select = "SELECT * FROM topics WHERE CategoryId = '$cat_id' AND SubcategoryId = '$subcat_id'";
        //$result = $conn->query($select);
        $result = mysqli_query($connect, $select);
        $rowcount = mysqli_num_rows($result);
        return $rowcount;
    }

    function disptopics($cid, $scid){
        include 'connect.php';
        $select = "SELECT TopicId, Author, Title, Content, Date_Posted, User_Views, replies FROM categories, subcategories, topics
                    WHERE (topics.CategoryId = '$cid') AND (topics.SubcategoryId ='$scid') AND 
                    (categories.CategoryId = '$cid') AND (subcategories.SubcategoryId = '$scid') ORDER BY TopicId DESC";
        $query = mysqli_query($connect, $select);

        if(mysqli_num_rows($query)){
            // /echo "<div>";
            echo "<div class='col-4 col-sm-4'>Title</div>
            <div class='col-2 col-sm-2'>By</div>
            <div class='col-2 col-sm-2'>Date</div>
            <div class='col-2 col-sm-2'>Views</div>
            <div class='col-2 col-sm-2'>Replies</div><br><hr>";
			while ($row = mysqli_fetch_assoc($query)) {
               // echo "<div>";
                echo "<div class='span12'><div class='row fix'><div class='board-topics'><a href='readtopic.php?cid=".$cid."&scid=".$scid."&tid=".$row['TopicId']."'>".
                    "<div class='col-4 col-sm-4'>".$row['Title']."</div>
                     <div class='col-2 col-sm-2'>".$row['Author']."</div>
                     <div class='col-2 col-sm-2'>".$row['Date_Posted']."</div>
                     <div class='col-2 col-sm-2'>".$row['User_Views']."</div>
                     <div class='col-2 col-sm-2'>".$row['replies']. 
                     "</div></a></div></div></div>";
                     //.$row['replies'].
            }
        }
        // }else{
        //     echo "<p>this category has no topics yet!  <a href='addtopic.php?cid=".$cid."&scid=".$scid."'>
        //     add the very first topic like a boss!</a></p>";
        // }
    }

    function disptopic($cid, $scid, $tid){
        include 'connect.php';
        $select = "SELECT * FROM categories, subcategories, topics
        WHERE topics.TopicId = '$tid' AND categories.CategoryId = '$cid' AND subcategories.SubcategoryId = '$scid'";

        $query = mysqli_query($connect, $select);
        if($query){
            $row = mysqli_fetch_assoc($query);
            echo "<div class='panel panel-default'>
            <div class='panel-heading'><h2 class='title'>".$row['Title']. 
            "</h2><p> Poster : ". $row['Author']."</p><p>Date : ". $row['Date_Posted'] ."</p></div>";
            echo "<div class='panel-body'><p>". $row['Content'] ."</p></div></div>";
        }else{
            echo 'failed';
        }
    } 
    function addview($cid, $scid, $tid){
        include 'connect.php';
        $update = "UPDATE topics SET User_Views = User_Views + 1 WHERE  CategoryId = '$cid' AND SubcategoryId = '$scid' AND TopicId = '$tid'";
        $query = mysqli_query($connect, $update);
    }
    function replylink($cid, $scid, $tid){
        echo '<div class="row"><div class="col-12 col-sm-12"><div class="pull-right">
        <a class="btn btn-primary"
        href="replyto.php?cid=' .$cid.'&scid='.$scid. '&tid='.$tid.'">
        Reply to this post</a></div></div></div><br>';
    }
    function replytopost($cid, $scid,$tid){
        echo '<div class="row">
        <div class="col-12 col-sm-12">
            <form action="addreply?cid=' .$cid.'&scid='.$scid. '&tid='.$tid.'" method="post">
                    <h2>Post Your Reply</h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <textarea name="comment" id="comment" cols="40" rows="5"></textarea>
                            <br>
                            <input class="btn btn-primary" name="submit" type="submit" value="Reply">
                        </div>
                    </div>
            </form>                           
        </div>
    </div>';
    }
    function addreply($cid, $scid, $tid){
        include 'connect.php';
        $update = "UPDATE topics SET replies = replies + 1 WHERE  CategoryId = '$cid' AND SubcategoryId = '$scid' AND TopicId = '$tid'";
        $query = mysqli_query($connect, $update);
    }
    function dispreplies($cid, $scid, $tid){
        include 'connect.php';
        $select = "SELECT replies.Author, Reply, replies.Date_Posted 
        FROM categories, subcategories, topics, replies WHERE (replies.CategoryId = $cid) 
        AND (replies.SubcategoryId = $scid) AND (replies.TopicId = $tid) AND (topics.TopicId = $tid )
        AND (categories.CategoryId = '$cid') AND (subcategories.SubcategoryId = $scid) ORDER BY ReplyId DESC";
        $query = mysqli_query($connect, $select);
        if(mysqli_num_rows($query) != 0){
            while($row = mysqli_fetch_assoc($query)){
                echo "<div class='panel panel-default'>
                <div class='panel-heading'><h2 class='title'>". 
                "</h2><p> Poster : ". $row['Author']."</p><p>Date : ". $row['Date_Posted'] ."</p></div>";
                echo "<div class='panel-body'><p>". $row['Reply'] ."</p></div></div>";
            }
        }
    }
    function count_replies($cid, $scid, $tid){
        include 'connect.php';
        $select = "SELECT * FROM replies WHERE CategoryId = $cid AND SubcategoryId = $scid AND TopicId = $tid";
        $query = mysqli_query($connect, $select);
        return mysqli_num_rows($query);
    }

    function addtopic($cid, $scid, $title, $content){
        include 'connect.php';
        $user = $_SESSION['username'];
        $date = date('Y-m-d H:i:s');
        $insert = "INSERT INTO topics(CategoryId, SubcategoryId, Author, Title, Content, Date_Posted, User_Views, replies) VALUES ('$cid','$scid', '$user','$title','$content','$date', 0, 0)";
        //$tid = mysqli_insert_id($connect);
        //$query = mysqli_query($connect, $insert);
        if($connect->query($insert) === true){
             $select = "SELECT * FROM topics WHERE CategoryId=$cid AND SubcategoryId=$scid AND Title='$title' AND Content='$content' AND Author='$user'";
             $query = mysqli_query($connect, $select);
             while($row = mysqli_fetch_assoc($query)){
                 $tid = $row['TopicId'];
             }
            header("Location: /readtopic.php?cid=$cid&scid=$scid&tid=$tid");
        }else{
            echo "failed : ". $connect->error;
        }

    }


?>