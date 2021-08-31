<?php
    include('./header.php');
    include('./includes/db_conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php
        
        ?>
    </header>

    <div align="center">
       <hr>
            <h3>Update User Information</h3>
       <hr>
        <div class="row">
            <div class="col-md-6 offset-3">
                <?php
                
                


                if(isset($_GET['error'])){

                    if($_GET['error'] == 'emptyNameAndEmail'){
                        ?>
                        <small class="alert alert-danger"> Name and email is required</small>
                        <hr>
                        <?php
                    }else if($_GET['error'] == 'invalidFileType'){
                        ?>
                        <small class="alert alert-danger"> Invalid file type, Only Images allowed.</small>
                        <hr>
                        <?php
                    }else if($_GET['error'] == 'invalidFileSize'){
                        ?>
                        <small class="alert alert-danger"> Maximum 5mb Image size allowed.</small>
                        <hr>
                        <?php
                    }
                }
                ?>
                <form action="./index.php"
                      method="POST"
                      enctype="multipart/form-data"
                >
                    <?php
                        
                        $currentUser = $_SESSION['username'];
                        $sql = "SELECT * FROM users WHERE username ='$currentUser'";

                        $gotResuslts = mysqli_query($conn,$sql);

                        if($gotResuslts){
                            if(mysqli_num_rows($gotResuslts)>0){
                                while($row = mysqli_fetch_array($gotResuslts)){
                                    //print_r($row['user_name']);
                                    ?>
                                        <div class="form-group">
                                            <input type="text" name="updateUserName" class="form-control" value="<?php echo $row['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="userEmail" class="form-control" value="<?php echo $row['email']; ?>">
                                        </div>
                                    
                                        <div class="form-group">
                                            <input type="password" name="userPassword" class="form-control" value="<?php echo $row['password']; ?>">
                                        </div> 

                                        <div class="form-group">
                                            <input type="submit" name="submit"  class="btn btn-info" value="Update">
                                        </div>
                                    <?php
                                }
                            }
                        }


                    ?>
                
                </form>
            </div>
            
        </div>


    </div>
    
</body>
</html>

