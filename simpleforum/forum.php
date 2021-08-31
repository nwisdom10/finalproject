<?php 
require 'header.php'; 

    if (!isset($_SESSION['uid'])) {
        header("Location: ./index.php?error=please_log_in");
        exit();
    }    

    echo "<h1 class='text-center my-4'>Posts</h1>";

    

    require 'includes/db_conn.php';
    
    $sql = "SELECT posts.post_id, posts.title, posts.content, posts.datePosted, posts.views, users.username FROM posts INNER JOIN users ON posts.uid=users.uid;";

    $stmt = mysqli_stmt_init($conn);

    

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=". mysqli_error($conn));
        exit();
    } else {

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            echo "<table class='table'>";
            echo "<tr><th>Title</th><th>Posted By</th><th>Date Posted</th><th>Views</th></tr>";
        
            //below is what displays the clickable link for the post


            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr><td><a href='showpost.php?postId=".$row['post_id']."'>".$row['title']."</a></td><td>".$row['username']."</td><td>".$row['datePosted']."</td><td>".$row['views']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p> No Content </p>";
        }
    }
  

require 'footer.php';
?>

<link rel="stylesheet" href="./style.css">

