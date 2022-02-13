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
                        <h1>Courses</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('post_message'); ?>

                        <a href="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/add"><button class="btn3">CREATE COURSE</button></a>
                        <br>

                    <!-- filter area -->
                    <?php if(!empty($data['courses_amount'])):?>
                        <form action="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/index/" method="post">
                            <div class="filter-container">
                                <div class="filter-icon">
                                    <img src="<?php echo URLROOT; ?>/imgs/components/filter/filter-icon.png" alt="">
                                </div>
                                <div class="filter-text">Filter by</div>
                                <div class="item">
                                    <select name="filter" id="filter" class="filter-select">
                                        <?php if($data['posts_filter'] == "ups"): ?>
                                            <option value="ups" selected>Upvotes</option>
                                        <?php else: ?>
                                            <option value="ups">Upvotes</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "downs"): ?>
                                            <option value="downs" selected>Downvotes</option>
                                        <?php else: ?>
                                            <option value="downs">Downvotes</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "comments"): ?>
                                            <option value="comments" selected>Comments</option>
                                        <?php else: ?>
                                            <option value="comments">Comments</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "reviews"): ?>
                                            <option value="reviews" selected>Reviews</option>
                                        <?php else: ?>
                                            <option value="reviews">Reviews</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="filter-text">in</div>
                                <div class="order">
                                    <select name="filter-order" id="filter-order" class="filter-select">
                                        <?php if($data['posts_filter_order'] == "asc"): ?>
                                            <option value="asc" selected>Ascending</option>
                                        <?php else: ?>
                                            <option value="asc">Ascending</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter_order'] == "desc"): ?>
                                            <option value="desc" selected>Descending</option>
                                        <?php else: ?>
                                            <option value="desc">Descending</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="filter-text">order</div>
                                <div class="right">
                                    <button type="submit" class="filter-btn">Filter</button>
                                </div>
                            </div>
                        </form>
                    <?php endif; ?>
                    <br>
                    
                        <div class="card-flex-box">
                    
                    <!-- COURSE POST -->
                   <?php foreach($data['posts'] as $post): ?>
                    <?php if($post->private_uni_id == $_SESSION['user_id']): ?>
                    <?php if($post->type == "coursepost"): ?>
                        <a href="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/show/<?php echo $post->post_id; ?>" class="card-link">
                        <div class="coursepost">
                            <?php if($post->image != null):?>
                            <div class="pic">
                                <img src="<?php echo URLROOT.'/imgs/posts/courseposts/'.$post->image; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="coursepost-body">
                                <div class="user-pic">
                                    <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                                </div>
                                <div class="postedat">Posted At: <?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                                <div class="title"><?php echo $post->courseName; ?></div>
                                <div class="degree"><?php echo $post->provide_degree; ?></div>
                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                               <div class="price"><?php echo $post->course_fee.' LKR'; ?></div>
                            </div>
                            <div class="coursepost-stats">
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
                        <br>
                        <br>
                    <?php endif; ?>
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