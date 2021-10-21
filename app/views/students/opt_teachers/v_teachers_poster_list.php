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
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Teachers</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    
                    <div class="card-flex-box">

                    <!-- POSTER -->
                    <?php foreach($data['posts'] as $post): ?>
                    <?php if($post->type == "poster"): ?>
                        <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Teacher/show/<?php echo $post->postId; ?>" class="card-link">
                        <div class="poster">
                            <?php if($post->image != null):?>
                            <div class="pic">
                                <img src="<?php echo URLROOT.'/imgs/posts/posters/'.$post->image; ?>" alt="">
                            </div>
                            <div class="teacher-pic">
                                <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="poster-body">
                                <div class="title"><?php echo $post->title; ?></div>
                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                                <div class="price">Rs.1000</div>
                            </div>
                            <div class="poster-stats">
                                <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                <div class="ups-count"><?php echo $post->ups; ?></div>
                                <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                <div class="downs-count"><?php echo $post->downs; ?></div>
                                <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                <div class="comments-count"><?php echo $post->comment_count; ?></div>
                                <div class="rate"><?php echo countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5); ?></div>
                                <?php 
                                    $rate = countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5);

                                    for($i=0; $i <ceil($rate); $i++) {
                                        echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                    }

                                    for($i=0; $i <5 - ceil($rate); $i++) {
                                        echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                    }
                                    
                                    ?>
                                <div class="reviews">REVIEWS (<?php echo $post->review_count; ?>)</div>
                            </div>          
                        </div>
                        </a>
                    <?php endif; ?>
                    <?php endforeach; ?>

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