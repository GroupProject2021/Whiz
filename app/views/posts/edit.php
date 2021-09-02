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
            <a href="<?php echo URLROOT; ?>/posts">Back</a>
            <form action="<?php echo URLROOT; ?>/posts/edit/<?php echo $data['id']; ?>" method="post">
                <h1>Edit posts</h1>
                <p>Please edit data</p>
                <hr  class="form-hr">

                <label for="title"><p class="form-bold">Title</p></label>
                <input type="text" placeholder="Enter email" name="title" id="title" value="<?php echo $data['title']; ?>">
                <span class="form-invalid"><?php echo $data['title_err']; ?></span><br>
                <label for="body"><p class="form-bold">Content</p></label>
                <textarea placeholder="Enter email" name="body" id="body"><?php echo $data['body']; ?></textarea>
                <span class="form-invalid"><?php echo $data['body_err']; ?></span><br>
                <hr  class="form-hr">
                <button type="submit" class="form-submit">Login</button>
            </form>
        </div>
        <div class="form-container content">
            <p>Don't have an account? <a class="form-link" href="<?php echo URLROOT; ?>/students/register">Register</a></p>
        </div>
    </body>
</html>