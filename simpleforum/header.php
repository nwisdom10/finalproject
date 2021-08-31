<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SwiftP1</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
                crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg justify-content-between navbar-dark bg-dark pl-4 mb-5">
            <a class="navbar-brand" href="./index.php">SwiftP1</a>
            <div class="navbar-nav">
            
        
            <a class="nav-item nav-link" href="forum.php">Forums <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="createcommunity.php">Create a Community <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="newpost.php">Create a Post <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="supportpage.php">Contact Support <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="userprofile.php">Profile Page <span class="sr-only"></span></a>
            <a class="nav-item nav-link" href="testpage.php">Communities<span class="sr-only"></span></a>

            



            
            <?php
                if (isset($_SESSION['username'])) {
                    echo    '<form action="includes/logouthandler.php" method="post" class="form-inline mx-2">';
                    echo    '<button class="btn btn-outline-success" type="submit" name="submit-logout">Logout</button>';
                    echo    '</form>';
                } else {
                    echo    '<form action="includes/loginhandler.php" method="post" class="form-inline mx-2">';
                    echo        '<input class="form-control mr-sm-2" type="text" name="username" placeholder="Username">';
                    echo        '<input class="form-control mr-sm-2" type="password" name="password" placeholder="Password">';
                    echo        '<button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit-login">Login</button>';
                    echo    '</form>';
                    echo    '<a href="'.htmlspecialchars('registration.php').'"><button class="btn btn-outline-primary">Register</button></a>';
                }
            ?>
            </div>
        </nav>
    </header>