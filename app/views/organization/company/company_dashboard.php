<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
                        <h1>Company dashboard</h1>
                    </div>
                    
                         
                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single-new">
                        <!-- filter area -->
                        <?php if(!empty($data['jobs_amount'])):?>
                        <form action="<?php echo URLROOT; ?>/C_O_Company_Dashboard/index/" method="post">
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
                        
                        <!--Job posts -->
                        <?php if(empty($data['jobs_amount'])):?>
                            <!-- empty - show idle -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/job-dashboard.jpg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Vaccancies</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> By choosing Job Advertisements option, you will have the opportunity to post an ad for a month by doing payment about vacancies you have.</li>
                                            <li><span class="dashboard-red-bullet">*</span> Undergraduates and Graduates Students will see your ads through these published job vacancies.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/Posts_C_O_JobAds/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                        <?php else: ?>      
                            <div class="dashboard-content-title">Vaccancies</div>
                            <div class="dashboard-content-container">
                            <?php foreach($data['job_posts'] as $jobPost): ?>
                                <?php if($jobPost->company_id == $_SESSION['user_id']): ?>
                                    <?php if($jobPost->type == "jobpost"): ?>
                                        <a href="<?php echo URLROOT; ?>/Posts_C_O_JobAds/show/<?php echo $jobPost->post_id; ?>" class="card-link">
                                            <div class="dashboard-analytics-container">
                                                <div class="left">
                                                    <?php if($jobPost->image != null):?>
                                                    <div class="pic">
                                                        <img src="<?php echo URLROOT.'/imgs/posts/jobads/'.$jobPost->image; ?>" alt="">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="right">
                                                    <div class="title"><?php echo $jobPost->jobName; ?></div>
                                                    <div class="coursepost-stats">
                                                        <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                                        <div class="ups-count"><?php echo $jobPost->ups; ?></div>
                                                        <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                                        <div class="downs-count"><?php echo $jobPost->downs; ?></div>
                                                        <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                                        <div class="comments-count"><?php echo $jobPost->comment_count; ?></div>
                                                        <div class="rate"><?php echo countRate($jobPost->review_count, $jobPost->rate1, $jobPost->rate2, $jobPost->rate3, $jobPost->rate4, $jobPost->rate5); ?></div>
                                                        <?php 
                                                            $rate = countRate($jobPost->review_count, $jobPost->rate1, $jobPost->rate2, $jobPost->rate3, $jobPost->rate4, $jobPost->rate5);

                                                            for($i=0; $i <ceil($rate); $i++) {
                                                                echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                            }

                                                            for($i=0; $i <5 - ceil($rate); $i++) {
                                                                echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                            }
                                                            
                                                            ?>
                                                        <div class="reviews">REVIEWS (<?php echo $jobPost->review_count; ?>)</div>
                                                    </div>         
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <!-- CVs -->
                        <?php if(empty($data['jobs_amount'])):?>
                            <!-- empty - show idle -->
                            <div class="dashboard-content-idle-container proGuider">
                                <div class="left">
                                    <div class="image">
                                        <img src="<?php echo URLROOT.'/imgs/dashboard/cv.jpeg'; ?>" alt="">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="title">Recieved CVs</div>
                                    <div class="body">
                                        <ul>
                                            <li><span class="dashboard-red-bullet">*</span> This option will show you the CV list of who have applied for your vacancies.</li>
                                        </ul>
                                    </div>
                                    <a href="<?php echo URLROOT;?>/C_O_C_Cvs/index" class="card-link"><div class="btn1-small">GET STARTED</div></a>
                                </div>
                            </div>
                        <?php else: ?>  
                            <div class="dashboard-content-title">Recieved CVs</div>    
                            <div class="dashboard-content-container">
                            <?php foreach($data['job_posts'] as $jobPost): ?>
                                <?php if($jobPost->company_id == $_SESSION['user_id']): ?>
                                    <?php if($jobPost->type == "jobpost"): ?>
                                        <a href="<?php echo URLROOT; ?>/C_O_C_Cvs/cvList/<?php echo $jobPost->post_id; ?>" class="card-link">
                                            <div class="dashboard-analytics-container">
                                                <div class="left">
                                                    <?php if($jobPost->image != null):?>
                                                    <div class="pic">
                                                        <img src="<?php echo URLROOT.'/imgs/posts/jobads/'.$jobPost->image; ?>" alt="">
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="right">
                                                    <div class="title"><?php echo $jobPost->jobName; ?></div>
                                                    <div class="coursepost-stats">
                                                        <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/cv-icon.png'; ?>" alt=""></div>
                                                        <div class="comments-count"><?php echo $jobPost->applied; ?> Applicant/s </div>
                                                    </div>         
                                                </div>
                                            </div>
                                        </a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>