<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>

            <main>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
                    <!-- Professional guider -->
                    <!-- <div class="wrapper"> -->
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Banners > Edit Banner</h1>
                        </div>

                        <!-- EDIT FORM -->
                        <div class="form-container">
                            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">Back</a>
                            <form action="<?php echo URLROOT; ?>/Mentors_dashboard/edit/<?php echo $data['id']; ?>" method="post">
                                
                                <hr  class="form-hr">

                                <label for="title"><p class="form-bold">Title</p></label>
                                <input type="text" placeholder="" name="title" id="title" value="<?php echo $data['title']; ?>">
                                <span class="form-invalid"><?php echo $data['title_err']; ?></span><br>

                                <label for="body"><p class="form-bold">Content</p></label>
                                <textarea placeholder="" name="body" id="body"><?php echo $data['body']; ?></textarea>
                                <span class="form-invalid"><?php echo $data['body_err']; ?></span><br>
                                <hr  class="form-hr">
                                <button type="submit" class="form-submit">Save Changes</button>
                            </form>
                        </div>
                    <!-- </div> -->
                <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
                    <!-- Teacher -->
                    <!-- <div class="wrapper"> -->
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Posters > Edit Poster</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="form-container">
                            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">Back</a>
                            <form action="<?php echo URLROOT; ?>/Mentors_dashboard/edit/<?php echo $data['id']; ?>" method="post">
                                
                                <hr  class="form-hr">

                                <label for="title"><p class="form-bold">Title</p></label>
                                <input type="text" placeholder="" name="title" id="title" value="<?php echo $data['title']; ?>">
                                <span class="form-invalid"><?php echo $data['title_err']; ?></span><br>

                                <label for="body"><p class="form-bold">Content</p></label>
                                <textarea placeholder="" name="body" id="body"><?php echo $data['body']; ?></textarea>
                                <span class="form-invalid"><?php echo $data['body_err']; ?></span><br>
                                <hr  class="form-hr">
                                <button type="submit" class="form-submit">Save Changes</button>
                            </form>
                        </div>
                    <!-- </div> -->
                <?php else: ?>
                    <!-- Nothing here -->
                <?php endif;?>
            <?php endif; ?> 

                    <!-- BOTTOM PANEL -->
                    <br>
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>

    </body>
</html>