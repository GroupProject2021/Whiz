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
            <header>                
                <div class="menu-toggle">
                    <button type="button" class="sidebar-handle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </button>
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
                        <h1>Stream seleciton</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <div class="interactable-rp">
                            <div class="back"><a href="<?php echo URLROOT.'/Reviews/viewAll'; ?>" class="review-link">Back</a></div>
                            <div class="see-all-reviews"><a href="<?php echo URLROOT.'/Reviews/viewAll'; ?>" class="review-link">See all reviews</a></div>
                        </div>

                        <form action="<?php echo URLROOT.'/Reviews/add'; ?>" method="post">
                        <div class="review-popup">
                            <div class="header">
                                <div class="profpic">
                                <?php echo '<img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'].'?>" alt="profile_image">';?>
                                </div>
                                <div class="details">
                                    <div class="name-area">
                                        <div class="name"><?php echo $_SESSION['user_name']; ?></div>
                                        <?php if($_SESSION['status'] == 'verified'): ?>
                                            <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="actor-type"><?php echo $_SESSION['actor_type']; ?> | <?php echo $_SESSION['specialized_actor_type']; ?></div>
                                </div>
                            </div>
                            <div class="content">
                                <div class="rate-stars">
                                    <div class="star" id="star1" data-rating="1"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star" id="star2" data-rating="2"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star" id="star3" data-rating="3"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star" id="star4" data-rating="4"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star" id="star5" data-rating="5"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                </div>
                                <input type="text" name="rate_amount" id="rate_amount" value="0" style="display: none;">
                                <div class="text">
                                    <textarea name="review_text" id="" cols="1" rows="5" required>
                                        <?php echo $data['review_text']; ?>
                                    </textarea>
                                </div>
                                <div>
                                    <input type="submit" class="btn1" value="Post">
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>


                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        <script>
           $(document).on("click", ".star", function() {
                var rating = $(this).data('rating');

                console.log(rating);
                $('#rate_amount').val(rating);

                reset_rating_btns();
                
                for(var count = 1; count <= rating; count++) {
                    $('#star'+count).addClass('active');
                }
           });

           function reset_rating_btns() {
               for(var count = 1; count <= 5; count++) {
                    $('#star'+count).removeClass('active');
               }
           }
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>