<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Stream seleciton</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <div class="interactable">
                            <div class="back"><a href="<?php echo URLROOT.'/Posts/show/'.$_SESSION['current_viewing_post_id']; ?>" class="review-link">Back</a></div>
                            <div class="write-a-review"><a href="<?php echo URLROOT.'/Reviews/add'; ?>" class="review-link">Write a review</a></div>
                        </div>
                        
                        <?php foreach($data['reviews'] as $review): ?>
                            <div class="review">
                                <div class="review-header">
                                    <div class="pic">
                                        <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($review->actor_type).'/'.$review->profile_image;?>" alt="">
                                    </div>
                                    <div class="side">
                                        <div class="details">                                            
                                            <div class="name"><?php echo $review->name; ?></div>
                                            <?php if($review->status == 'verified'): ?>
                                                <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                                <?php endif; ?>
                                            <div class="actor-type"><?php echo $review->actor_type; ?> | <?php echo $review->specialized_actor_type; ?></div>
                                            <?php if($review->id == $_SESSION['user_id']): ?>
                                                <div class="btns">
                                                    <div class="edit"><a href="<?php echo URLROOT.'/Reviews/edit/'.$review->review_id; ?>"><img src="<?php echo URLROOT.'/imgs/edit-icon.png'; ?>" alt=""></a></div>
                                                    <div class="remove"><a href="<?php echo URLROOT.'/Reviews/delete/'.$review->review_id; ?>"><img src="<?php echo URLROOT.'/imgs/remove-image-icon.png'?>" alt=""></a></div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="user-rate">
                                            <div class="rate-stars">
                                                <?php for($i = 1; $i <= $review->rate; $i++): ?>
                                                    <div class="star active"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                                <?php endfor; ?>
                                                <?php for($i = $review->rate + 1; $i <= 5; $i++): ?>
                                                    <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                                <?php endfor; ?>
                                            </div>
                                            <div class="ratedat"><?php echo convertedToReadableTimeFormat($review->created_at); ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="review-body">
                                    <?php echo $review->review; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>