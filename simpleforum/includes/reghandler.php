<?php

if (isset($_POST['submit-signup'])) {
    require 'db_conn.php';

    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        header("Location: ../registration.php?error=emptyfields&first_name=" .$firstName. "&lastName=" .$last_name. "&email=" .$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../registration.php?error=inavliduser");
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../registration.php?error=invalidemail&username=" .$username);
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location ../registration.php?error=invaliduser&email=".$email);
        exit();
    } else if ($password !== $confirmPassword) {
        header("Location: ../registration.php?error=passwordcheck&username=".$username."&email=".$email);
        exit();
    } else {
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../registration.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $numRows = mysqli_stmt_num_rows($stmt);
            if($numRows > 0) {
                header("Location: ../registration.php?error=usertaken&email=".$email);
            } else {
                $sql = "INSERT INTO users (password, username, firstname, lastname, email) VALUES (?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../registration.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sssss", $hashedPassword, $username, $firstName, $lastName, $email);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../registration.php?registration=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../registration.php?bruh");
    exit();
}
?>