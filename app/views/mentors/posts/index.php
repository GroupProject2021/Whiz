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
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>

            <main>
            <?php if(isset($_SESSION['user_id'])) : ?>
                <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
                    <!-- Professional guider -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Banners</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">
                            <?php flash('post_message'); ?>
                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/add">
                                    <button class="btn1">New Banner</button>
                                </a>
                                <br>
                                <div class="courses-container">
                                    <?php foreach($data['posts'] as $post): ?>
                                        <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                                        <?php if($post->id == $_SESSION['user_id']): ?>
                                            <div class="course">
                                                <div class="course-preview">                                
                                                    <h2><?php echo $post->title; ?></h2>
                                                    <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>">View More</a>
                                                </div>
                                                <!-- <br> -->
                                                <div class="course-info">
                                                    <!-- <p>Written by index <?php echo $post->id; ?> which is <?php echo $post->name; ?></p>
                                                    on <?php echo $post->postCreated; ?> -->
                                                    <p><?php echo $post->body; ?></p>
                                                    <!-- <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>"><button class="btn9">View More...</button></a> -->
                                                </div>
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
                            <h1>Posters</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">
                            <?php flash('post_message'); ?>
                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/add">
                                    <button class="btn1">New Poster</button>
                                </a>
                                <br>
                                <div class="courses-container">
                                    <?php foreach($data['posts'] as $post): ?>
                                        <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                                        <?php if($post->id == $_SESSION['user_id']): ?>
                                            <div class="course">   
                                                <div class="course-preview">                             
                                                    <h1><?php echo $post->title; ?></h1>
                                                    <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>">View More...</a>
                                                </div>
                                                <div class="course-info">
                                                <!-- <br> -->
                                                    <!-- <p>Written by index <?php echo $post->id; ?> which is <?php echo $post->name; ?></p>
                                                    on <?php echo $post->postCreated; ?> -->
                                                    <p><?php echo $post->body; ?></p>
                                                    <!-- <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>"><button class="btn9">View More...</button></a> -->
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Nothing here -->
                <?php endif;?>
            <?php endif; ?> 

                    <!-- BOTTOM PANEL -->
                    <!-- <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div> -->
                <!-- </div> -->
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>