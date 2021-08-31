<?php

require 'header.php';
require 'includes/db_conn.php';





    
    if (!isset($_SESSION['uid'])) {
        header("Location: ./index.php?error=please_log_in");
        exit();
    } 

    $postId = $_GET['comId'];
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_execute($stmt);

    $sql = "SELECT communities.com_id, communities.namee, communities.descript FROM communities INNER JOIN users ON communities.uid=users.uid;";    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ./testpage.php?error=sqlerror");
        exit();
    } else {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            echo "<table class='table'>";
            echo    "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th></tr>";
            echo    "<tr><td>".$row['title']."</td><td>".$row['username']."</td><td>".$row['datePosted']."</td></tr>";
            echo "</table>";

            echo "<table class='table'>";
            echo    "<tr><th>Content</th></tr>";
            echo    "<tr><td>".$row['content']."</td></tr>";
            echo "</table>";

            echo "<table class='table'>";
         
            echo "<div class='vidd'>";
            $text = preg_replace("#.*youtube\.com/watch\?v=#" , "", $row['video']);
            echo "<div class='vidd'>";
            $text = '<iframe width="1280" height="800" id="vidd" src="https://www.youtube.com/embed/'.$text.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
            echo "</div>";
            echo $text;
        
            echo "</table>";

            

            echo "<form action='includes/replyhandler.php?postId=".$postId."' method='post'>";
            echo    "<div class='form-group text-center'>";
            echo        "<label>Post a Comment!</label><br />";
            echo        "<textarea cols='80' rows='5' id='comment' name='comment'></textarea>";					
            echo    "</div>";
            echo    "<div class='form-group text-center'>";
            echo        "<button class='btn btn-primary' type='submit' name='submit-reply'> Add Reply</button>";
            echo    "</div>";
            echo "</form>";
            
            $sql = "SELECT replies.comment, replies.datePosted, users.username FROM replies INNER JOIN users ON replies.uid=users.uid WHERE (".$postId." = replies.post_id)  ORDER BY reply_id DESC;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../forum.php?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                echo "<table class='table'>";
                echo    "<tr><th>Comment</th><th>Posted By</th><th>Date Posted</th></tr>";

			    while($row = mysqli_fetch_assoc($result))
			    {
				    echo "<tr><td>".$row['comment']."</td><td>".$row['username']."</td><td>".$row['datePosted']."</td></tr>";
			    }
			    echo "</table>";
            }
        } else {
            echo "<p> No Content</p>";
        }
    }

require 'footer.php';
?>

<link rel="stylesheet" href="./video.css">