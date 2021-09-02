<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sidebar.php'?>

        <div class="main-content">
            <header>                
                <div class="menu-toggle">
                    <label for="sidebar-toggle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </label>
                </div>
                
                <!-- TOP NAVIGATION BAR -->
                <div class="topnav">
                    <?php require APPROOT.'/views/inc/components/topnav.php'?>
                </div>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Posts</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel">
                        <a href="<?php echo URLROOT; ?>/posts">go back to posts</a>
                        <br>
                        <div>
                            <h1><?php echo $data['post']->title; ?></h1>
                            <b>Writtern by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?></b>
                            <p><?php echo $data['post']->body; ?></p>

                            <?php if($data['post']->user_id == $_SESSION['user_id']): ?>
                                <hr>
                                <a href="<?php echo URLROOT?>/posts/edit/<?php echo $data['post']->id;?>">Edit</a>

                                <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                                    <input type="submit" value="Delete">
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>