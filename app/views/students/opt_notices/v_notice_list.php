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
                        <h1>Notices</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                    <!-- filter area -->
                        <form action="<?php echo URLROOT; ?>/C_S_Stu_To_Notices/index/" method="post">
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
                    
                    <!-- NOTICE POST -->
                   <?php foreach($data['posts'] as $post): ?>
                    <?php $exp_date = date('Y-m-d', strtotime($post->paid_date. ' + 1 months')) ?>
                    <?php if($post->type == "noticepost" ): ?>
                    <?php if($post->payed == 1): ?>
                        <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Notices/show/<?php echo $post->post_id; ?>" class="card-link">
                        <div class="coursepost">
                            <?php if($post->image != null):?>
                            <div class="pic">
                                <img src="<?php echo URLROOT.'/imgs/posts/notices/'.$post->image; ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="coursepost-body">
                                <div class="user-pic">
                                    <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                                </div>
                                <div class="postedat">
                                    <?php if(date("Y-m-d") > $exp_date){ echo "<font color=red>(Expired)</font>";} ?>
                                    Posted At: <?php echo convertedToReadableTimeFormat($post->postCreated); ?>
                                </div>
                                <div class="title"><?php if(strlen($post->noticeName) < 25) {echo $post->noticeName; } else { echo substr($post->noticeName, 0, 25).'...'; }?></div>
                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                            </div>
                            <div class="coursepost-stats">
                                <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                <div class="ups-count"><?php echo $post->ups; ?></div>
                                <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                <div class="downs-count"><?php echo $post->downs; ?></div>
                                <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                <div class="comments-count"><?php echo $post->comment_count; ?></div>
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