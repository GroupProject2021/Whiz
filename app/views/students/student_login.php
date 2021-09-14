<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>
        
        <!-- LOGIN FORM -->
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/students/login" method="post">
                <h1>Student Login</h1>
                <p>Please enter your credentials</p>
                <hr  class="form-hr">
                <!-- flash message -->              
                <?php flash('register_success'); ?>
                <label for="email"><p class="form-bold">Email</p></label>
                <input type="text" placeholder="Enter email" name="email" id="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span><br>

                <label for="password"><p class="form-bold">Password</p></label>
                <table class="form-table">
                    <tr>
                        <td>
                            <input type="password" placeholder="Enter password" name="password" id="password" value="<?php echo $data['password']; ?>">
                        </td>
                        <td>
                            <div class="toggle-password">
                                <img src="<?php echo URLROOT; ?>/imgs/form/hide-eye-icon.png" class="hide-password-eye" width="25px" height="20px" alt="hide">
                                <img src="<?php echo URLROOT; ?>/imgs/form/show-eye-icon.png" class="show-password-eye" width="25px" height="20px" alt="show">
                            </div>
                        </td>                    
                    </tr>
                </table>

                <span class="form-invalid"><?php echo $data['password_err']; ?></span><br>
                <hr  class="form-hr">
                <button type="submit" class="form-submit">Login</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Don't have an account? <a class="form-link" href="<?php echo URLROOT; ?>/students/register">Register</a></p>
        </div>
    </body>
</html>