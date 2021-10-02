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
            <!-- TOP Navigation -->
            <?php require APPROOT.'/views/inc/components/topnav.php'?>

            <main>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
                    <!-- Professional guider -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Complaints</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel">
                            <?php flash('post_message'); ?>
                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/add">
                                    <button class="btn1">New Complaint</button>
                                </a>
                                <br>
                                <div class="banner">
                                    <?php foreach($data['posts'] as $post): ?>
                                        <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                                        <?php if($post->id == $_SESSION['user_id']): ?>
                                            <div>                                
                                                <h1><?php echo $post->title; ?></h1>
                                                <br>
                                                <p>Written by index <?php echo $post->id; ?> which is <?php echo $post->name; ?></p>
                                                on <?php echo $post->postCreated; ?>
                                                <p><?php echo $post->body; ?></p>
                                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>"><button class="btn9">View More...</button></a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                        </div>
                    </div>
                <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
                    <!-- Teacher -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Complaints</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel">
                            <?php flash('post_message'); ?>
                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/add">
                                    <button class="btn1">New Complaint</button>
                                </a>
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
                                            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>"><button class="btn9">View More...</button></a>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Nothing here -->
                <?php endif;?>
            <?php endif; ?> 

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>