<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/Admin_style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/admin_navbar.php'?>
        
        <!-- LOGIN FORM -->
        <div class="form-container">
       
            <form action="<?php echo URLROOT; ?>/admins/login" method="post">
            
                <h1>Admin Login</h1>
                <p>Please enter your credentials</p>
                <hr  class="form-hr">
                <label for="email"><p class="form-bold">Email</p></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>
                <label for="password"><p class="form-bold">Password</p></label>
                <input type="text" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>
                <hr  class="form-hr">
                <button type="submit" class="form-submit">Login</button>
                <center>
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png"width="200px" height="200px" alt="logo">
             </center>
            </form>
        </div>   
       
    </body>
</html>