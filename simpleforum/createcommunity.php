

<?php 
    require 'header.php';
    if (!isset($_SESSION['uid'])) {
        header("Location: ./index.php?error=please_log_in");
        exit();
    } 
    if (isset($_POST['submit'])) {
        require 'includes/db_conn.php';
    
        $namee = $_POST['namee'];
        $descript = $_POST['descript'];
        $uid = $_SESSION['uid'];
        if (empty($namee) || empty($descript)) {
            header("Location: ../newpost.php?error=empyfield");
            exit();
        } else {
            echo ".$namee $descript.";

            $sql = "INSERT INTO communities (uid, namee, descript) VALUES (?, ?, ?);";
            $stmt = mysqli_stmt_init($conn);    

            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../newpost.php?error=sqlerror=".mysqli_error($conn)."&uid=".$uid."&namee=".$namee);
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "iss", $uid, $namee, $descript);
                mysqli_stmt_execute($stmt);

          
    
                header("Location: ./testpage.php");
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
                <h1 id="createpost">Create a Community</h1>
                <label>Title</label><br />
                <input type="text" name="namee" placeholder="Enter a Title"> <br />
                <br>
                <label>Description</label><br/>
                <textarea cols='97' rows='10' name='descript' placeholder="Tell us about your community!"></textarea>
                <br>
                <br>
                <br>
                <br>
                <button id="btnn" type="submit" name="submit">Add</button>
            </div>
        </div>
    </form>
   

<?php
    require 'footer.php';
?>


