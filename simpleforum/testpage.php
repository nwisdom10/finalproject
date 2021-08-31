<?php 
require 'header.php'; 

    if (!isset($_SESSION['uid'])) {
        header("Location: ./index.php?error=please_log_in");
        exit();
    }    

    echo "<h1 class='text-center my-4'>Communities</h1>";

    

    require 'includes/db_conn.php';
    
    $sql = "SELECT communities.com_id, communities.namee, communities.descript FROM communities INNER JOIN users ON communities.uid=users.uid;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=". mysqli_error($conn));
        exit();
    } else {

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            echo "<table class='table'>";
        
        
            while ($row = mysqli_fetch_assoc($result)){

                //Pulls the name of the community from the database based on name and community ID, the link is reponsible for what is stored.
                //create another .php file that will hold posts for each of the communities

                echo "<tr><td><a href='posts.php?comID=".$row['com_id']."'>".$row['namee']."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p> No Content </p>";
        }
    }
  

require 'footer.php';
?>

<link rel="stylesheet" href="./style.css">

