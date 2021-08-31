<?php

if(isset($_POST['submit-login'])) {
    
    require 'db_conn.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        header("Location: ../index.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=?;";
        $stmt = mysqli_stmt_init($conn);
        
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)) {
                $checkPassword = password_verify($password, $row['password']);
                if($checkPassword == false) {
                    header("Location: ../index.php?error=incorrectpassword");
                    exit();
                } else if ($checkPassword == true) {
                    session_start();
                    $_SESSION['uid'] = $row['uid'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../forum.php?login=success");
                    exit();
                } else {
                    header("Location: ../index.php?error=incorrectpassword");
                    exit();
                }
            } else {
                header("Location: ../index.php?error=nosuchuser");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../index.php");
    exit();
}