<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/mentor_sidebar.php'?>

        <div class="main-content">
            <header>                
                <div class="menu-toggle">
                    <button type="button" class="sidebar-handle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </button>
                </div>
                
                <!-- TOP NAVIGATION BAR -->
                <div class="topnav">
                    <?php require APPROOT.'/views/inc/components/topnav.php'?>
                </div>
            </header>

            <main>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
                    <!-- Professional guider -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Banners > New Banner</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">

                            <a href="<?php echo URLROOT;?>/Mentors_dashboard/banner"><button class="btn8">Back</button></a>
                            <br>
                    
                            <form action="<?php echo URLROOT; ?>/Mentors_dashboard/add" method="post">
                                <div class="post-creator">
                                    <div class="post-creator-title">
                                        <input type="text" name="title" id="title" autocomplete="off" placeholder="Title" value="<?php echo $data['title']; ?>">
                                    </div>
                                    <hr>
                                    <div class="post-creator-content">
                                        <textarea name="body" id="body" cols="30" rows="10" placeholder="Content"><?php echo $data['body']; ?></textarea>
                                    </div>
                                    <br>
                                    <hr>
                                    <button type="submit" class="post-creator-submit">Post</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- </div> -->
                <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
                    <!-- Teacher -->
                    <!-- <div class="wrapper"> -->
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Posters > New Poster</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">

                            <a href="<?php echo URLROOT;?>/Mentors_dashboard/poster"><button class="btn8">Back</button></a>
                            <br>
                    
                            <form action="<?php echo URLROOT; ?>/Mentors_dashboard/add" method="post">
                                <div class="post-creator">
                                    <div class="post-creator-title">
                                        <input type="text" name="title" id="title" autocomplete="off" placeholder="Title" value="<?php echo $data['title']; ?>">
                                    </div>
                                    <hr>
                                    <div class="post-creator-content">
                                        <textarea name="body" id="body" cols="30" rows="10" placeholder="Content"><?php echo $data['body']; ?></textarea>
                                    </div>
                                    <br>
                                    <hr>
                                    <button type="submit" class="post-creator-submit">Post</button>
                                </div>
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