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
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Banners</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">
                            <?php flash('post_message'); ?>
                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/addBanner">
                                    <button class="btn3">New Banner</button>
                                </a>
                                <br>
                                <!-- <div class="courses-container">
                                    <?php foreach($data['posts'] as $post): ?>
                                        
                                        <?php if($post->id == $_SESSION['user_id']): ?>
                                            <div class="course">
                                                <div class="course-preview">                                
                                                    <h2><?php echo $post->title; ?></h2>
                                                    <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>">View More</a>
                                                </div>
                                                
                                                <div class="course-info">
                                                    <p><?php echo $post->body; ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div> -->
                                <?php foreach($data['posts'] as $post): ?>
                                    <a href="<?php echo URLROOT; ?>/Mentors_dashboard/showBanner/<?php echo $post->postId; ?>" class="card-link">
                                    <div class="post">
                                        <?php if($post->image != null):?>
                                            <div class="post-header">
                                                <img src="<?php echo URLROOT.'/imgs/POSTS/'.$post->image; ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                            <div class="post-details">
                                                <div class="profpic"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt=""></div>
                                                <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($post->actor_type).'-'.getActorSpecializedTypeForIcons($post->actor_type, $post->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                                <div class="postedby"><?php echo $post->name; ?></div>
                                                <?php if($post->status == 'verified'): ?>
                                                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="postedat"><?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                                            <div class="post-body">
                                                <div class="title"><?php echo $post->title; ?></div>
                                                <div class="postedby"><?php echo $post->body; ?></div>
                                                <!-- PROGRESS BAR CURRENTLY NOT ACTIVE - LATER ON CAN USE FOR JOB APPLICATIONS -->
                                                <!-- <div class="progress">
                                                <progress class="applied-bar" value="50" max="100"></progress>
                                                <div class="text">
                                                    <div class="applied">50 applied</div>
                                                <div class="capacity">of 100 capacity</div>
                                                </div>
                                                </div>                             -->
                                                <!-- <div class="price">View more</div> -->
                                                <div class="stats">
                                                    <div class="ups"><img src="<?php echo URLROOT.'/imgs/up-icon.png'; ?>" alt=""></div>
                                                    <div class="ups-count" id="like-count"><?php echo $post->ups; ?></div>
                                                    <div class="downs"><img src="<?php echo URLROOT.'/imgs/down-icon.png'; ?>" alt=""></div>
                                                    <div class="downs-count"><?php echo $post->downs; ?></div>
                                                    <div class="rate">3.0</div>
                                                    <?php for($i=0; $i <5; $i++):?>
                                                        <div class="stars"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                                    <?php endfor;?>
                                                    <div class="enrollment">(10,623)</div>
                                                </div>          
                                            </div>
                                    </div>
                                    </a>
                                    <br>
                                <?php endforeach; ?>
                        </div>
                        <!-- BOTTOM PANEL -->
                        <div class="bottom-panel">
                            <p>Whiz organization. All rights reserved.</p>
                        </div>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <!-- <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div> -->
                        <!-- </div>
                    </div> -->
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
                                <a href="<?php echo URLROOT; ?>/Mentors_dashboard/addPoster">
                                    <button class="btn1">New Poster</button>
                                </a>
                                <br>
                                <!-- <div class="courses-container">
                                    <?php foreach($data['posts'] as $post): ?>
                                        <?php if($post->id == $_SESSION['user_id']): ?>
                                            <div class="course">   
                                                <div class="course-preview">                             
                                                    <h1><?php echo $post->title; ?></h1>
                                                    <a href="<?php echo URLROOT; ?>/Mentors_dashboard/show/<?php echo $post->postId; ?>">View More...</a>
                                                </div>
                                                <div class="course-info">
                                                
                                                    <p><?php echo $post->body; ?></p>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div> -->
                                <?php foreach($data['posts'] as $post): ?>
                                    <a href="<?php echo URLROOT; ?>/Mentors_dashboard/showPoster/<?php echo $post->postId; ?>" class="card-link">
                                    <div class="post">
                                        <?php if($post->image != null):?>
                                            <div class="post-header">
                                                <img src="<?php echo URLROOT.'/imgs/POSTS/'.$post->image; ?>" alt="">
                                            </div>
                                        <?php endif; ?>
                                            <div class="post-details">
                                                <div class="profpic"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt=""></div>
                                                <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($post->actor_type).'-'.getActorSpecializedTypeForIcons($post->actor_type, $post->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                                <div class="postedby"><?php echo $post->name; ?></div>
                                                <?php if($post->status == 'verified'): ?>
                                                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="postedat"><?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                                            <div class="post-body">
                                                <div class="title"><?php echo $post->title; ?></div>
                                                <div class="postedby"><?php echo $post->body; ?></div>
                                                <!-- PROGRESS BAR CURRENTLY NOT ACTIVE - LATER ON CAN USE FOR JOB APPLICATIONS -->
                                                <!-- <div class="progress">
                                                <progress class="applied-bar" value="50" max="100"></progress>
                                                <div class="text">
                                                    <div class="applied">50 applied</div>
                                                <div class="capacity">of 100 capacity</div>
                                                </div>
                                                </div>                             -->
                                                <!-- <div class="price">View more</div> -->
                                                <div class="stats">
                                                    <div class="ups"><img src="<?php echo URLROOT.'/imgs/up-icon.png'; ?>" alt=""></div>
                                                    <div class="ups-count" id="like-count"><?php echo $post->ups; ?></div>
                                                    <div class="downs"><img src="<?php echo URLROOT.'/imgs/down-icon.png'; ?>" alt=""></div>
                                                    <div class="downs-count"><?php echo $post->downs; ?></div>
                                                    <div class="rate">3.0</div>
                                                    <?php for($i=0; $i <5; $i++):?>
                                                        <div class="stars"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                                    <?php endfor;?>
                                                    <div class="enrollment">(10,623)</div>
                                                </div>          
                                            </div>
                                    </div>
                                    </a>
                                    <br>
                                <?php endforeach; ?>
                        </div>
                        <!-- BOTTOM PANEL -->
                        <div class="bottom-panel">
                            <p>Whiz organization. All rights reserved.</p>
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