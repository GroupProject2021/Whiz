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
                        <?php flash('post_message'); ?>
                        <a href="<?php echo URLROOT; ?>/posts/add">add post</a>
                        <br>
                        <?php foreach($data['posts'] as $post): ?>
                            <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                            <?php if($post->id == $_SESSION['user_id']): ?>
                            <div>                                
                                <h1><?php echo $post->title; ?></h1>
                                <br>
                                <p>Written by index <?php echo $post->id; ?> which is <?php echo $post->name; ?></p>
                                on <?php echo $post->postCreated; ?>
                                <p><?php echo $post->body; ?></p>
                                <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>">More...</a>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>