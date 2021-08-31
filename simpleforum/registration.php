<?php include 'header.php'; ?>

    <main>
        <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyfields') {
                    echo '<p> Fill in all fields </p>';
                } else if ($_GET['error'] == "invaliduser") {
                    echo '<p> Invalid username! </p>';
                } else if ($_GET['registration'] == 'success') {
                    echo '<p> Successfull registration </p>';
                }
            }
        ?>
        			

        
        <link rel="stylesheet" href="./style.css">
        <div class="col-sm-4 offset-sm-4">
            <div class="container">
            <form action="includes/reghandler.php" method="post" class="login-email">
           
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
                    
                    <input type="text" name="first-name" placeholder="First Name" class="input-group">
                    
                    
                    <input type="text" name="last-name" placeholder="Last Name" class="input-group">
                    
                    
                    <input type="text" name="username" placeholder="Username" class="input-group">
                    
                    
                    <input type="text" name="email" placeholder="email@example.com" class="input-group">
                    
                    
                    <input type="password" name="password" placeholder="Enter your password" class="input-group">
                    
                   
                    <input type="password" name="confirm-password" placeholder="Confirm your password" class="input-group">
                    <div class="input-group">
                    <button type="submit" name="submit-signup" class="btn">Sign Up</button>
                    </div>
                </form>

                </div>
            
            </div>
      
    
    </main>

<?php include 'footer.php'; ?>