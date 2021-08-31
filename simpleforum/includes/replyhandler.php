<?php

if (isset($_POST['submit-reply'])) {
    session_start();
    require 'db_conn.php';

    $comment = $_POST['comment'];
    $postId = $_GET['postId'];
    $uid = $_SESSION['uid'];

    if (empty($comment)) {
        header("Location: ../showpost.php?error=empyfield");
        exit();
    } else {
        $sql = "INSERT INTO replies (post_id, uid, comment, datePosted) VALUES (?, ?, ?, now());";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../newpost.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "iis", $postId, $uid, $comment);
            mysqli_stmt_execute($stmt);

            header("Location: ../showpost.php?postId=".$postId."&comment=successful");
            exit();
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../showpost.php");
    exit();
}

?>

