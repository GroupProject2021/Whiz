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
                        <h1>Job Vacancy post</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('post_message'); ?>

                        <a href="<?php echo URLROOT; ?>/Posts_C_O_JobAds/add"><button class="btn3">CREATE JOB ADVERTISEMENT</button></a>
                        <br>
                    
                        <!-- filter area -->
                        <form action="<?php echo URLROOT; ?>/Posts_C_O_JobAds/index/" method="post">
                        <div class="filter-and-search-container">
                            <div class="filter-container">
                                <div class="filter-icon">
                                    <img src="<?php echo URLROOT; ?>/imgs/components/filter/filter-icon.png" alt="">
                                </div>
                                <div class="filter-text">Filter by</div>
                                <div class="item">
                                    <select name="filter" id="filter" class="filter-select">
                                         <?php if($data['posts_filter'] == "all"): ?>
                                            <option value="all" selected>All</option>
                                        <?php else: ?>
                                            <option value="all">All</option>
                                        <?php endif; ?>
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
                                        <?php if($data['posts_filter'] == "rate0"): ?>
                                            <option value="rate0" selected>No Star</option>
                                        <?php else: ?>
                                            <option value="rate0">No Star</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "rate1"): ?>
                                            <option value="rate1" selected>1 Star</option>
                                        <?php else: ?>
                                            <option value="rate1">1 Star</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "rate2"): ?>
                                            <option value="rate2" selected>2 Star</option>
                                        <?php else: ?>
                                            <option value="rate2">2 Star</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "rate3"): ?>
                                            <option value="rate3" selected>3 Star</option>
                                        <?php else: ?>
                                            <option value="rate3">3 Star</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "rate4"): ?>
                                            <option value="rate4" selected>4 Star</option>
                                        <?php else: ?>
                                            <option value="rate4">4 Star</option>
                                        <?php endif; ?>
                                        <?php if($data['posts_filter'] == "rate5"): ?>
                                            <option value="rate5" selected>5 Star</option>
                                        <?php else: ?>
                                            <option value="rate5">5 Star</option>
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
                            <div class="search-container">
                                <div class="search-bar">
                                    <input type="text" name="post-search" id="post-search" placeholder="Search..." value="<?php echo $data['post_search'];?>">
                                </div>
                                <div class="search-btnarea">
                                    <button type="submit" class="search-btn">Search</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    <br>

                    <div class="card-flex-box">
                    
                    <!-- JOB POST -->
                   <?php foreach($data['posts'] as $post): ?>
                    <?php if($post->company_id == $_SESSION['user_id']): ?>
                    <?php $exp_date = date('Y-m-d', strtotime($post->paid_date. ' + 1 months')) ?>
                    <?php if($post->type == "jobpost" ): ?>
                        <a href="<?php echo URLROOT; ?>/Posts_C_O_JobAds/show/<?php echo $post->post_id; ?>" class="card-link">
                        <div class="advertisement">
                            <?php if($post->image != null):?>
                            <div class="pic">
                                <img src="<?php echo URLROOT.'/imgs/posts/jobads/'.$post->image; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="advertisement-body">
                                <div class="user-pic">
                                    <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                                </div>
                                <div class="postedat">
                                    <?php if($post->payed == 1): ?>
                                        <!-- <?php if(date("Y-m-d") > $exp_date){ echo "<font color=red>(Expired)</font>";} ?> -->
                                        Posted At: <?php echo convertedToReadableTimeFormat($post->postCreated); ?>
                                    <?php else: ?>
                                        <span class="red-text">[Not payed]</span>
                                    <?php endif; ?>
                                </div>
                                <div class="title"><?php if(strlen($post->jobName) < 25) {echo $post->jobName; } else { echo substr($post->jobName, 0, 25).'...'; }?></div>
                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                                <div class="poles">
                                    <div class="pole-prg-bar">
                                        <progress max="100" value="<?php if($post->capacity != 0){ echo ($post->applied / $post->capacity) * 100;} else {echo 0;} ?>" id="prgBar"></progress>
                                        <div class="percentage" id="percentage"><?php if($post->capacity != 0){ echo number_format(($post->applied / $post->capacity) *100, 1, '.', '');} else { echo 0;} ?>%</div>
                                   </div>
                                   <div class="text">
                                       <div class="applied" id="applied"><?php echo $post->applied; ?> Applied</div>
                                       <div class="capacity"> of <?php echo $post->capacity; ?> Capacity</div>
                                   </div>
                               </div>
                            </div>
                            <div class="advertisement-stats">
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