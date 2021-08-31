

<?php 

    require 'includes/db_conn.php';

    $commname = "SELECT * FROM communities ";
    $dropdown = mysqli_query($conn, $commname);

    require 'header.php';
    if (!isset($_SESSION['uid'])) {
        header("Location: ./index.php?error=please_log_in");
        exit();
    }
    
    if (isset($_POST['submit-post'])) {
        require 'includes/db_conn.php';
    
        $title = $_POST['title'];
        $content = $_POST['content'];
        $video = $_POST['video'];
        $community= $_POST['community'];
        $uid = $_SESSION['uid'];
        $view = 1;
        if (empty($title) || empty($content)) {
            header("Location: ../newpost.php?error=empyfield");
            exit();
        } else {
            echo ".$title $content.";

            $sql = "INSERT INTO posts (uid, title, content, video, datePosted, views, community) VALUES (?, ?, ?, ?, now(), ?, ?);";
            $stmt = mysqli_stmt_init($conn);    

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../newpost.php?error=sqlerror=".mysqli_error($conn)."&uid=".$uid."&title=".$title);
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "isssss", $uid, $title, $content, $video, $view, $community);
                mysqli_stmt_execute($stmt);

          //this is the area where you need to make the changes based on the chosen community
        
                header("Location: ./index.php"); 
                exit();
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
?>
<link rel="stylesheet" href="./style.css">
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class='form-group row'>
            <div class="col-md-6 offset-md-3">
                <h1 id="createpost">Create a Post</h1>
                <label>Title</label><br />
                <input type="text" name="title" placeholder="Title"> <br />
                
                <label>Video Link</label>
                <br>
                <input type='url' id='vid' name='video' placeholder="Video Link"/>
                <br>
                <br>

                <label>Choose A Community</label>
                
                <br>
                <select name='community'>


                
                <?php while($row1 = mysqli_fetch_array($dropdown)):;?>

                <option value="<?php echo $row1[2];?>"><?php echo $row1[2];?></option>

                <?php endwhile;?>

                </select>
                
                <br>
                <br>


                </form>
                <label>Description</label><br />
                <textarea cols='97' rows='10' name='content'></textarea>
                
                <button id="btnn" type="submit" name="submit-post">Post</button>
            </div>
        </div>
    </form>
   

<?php
    require 'footer.php';
?>

