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

                        <div class="interactable-rp">
                            <div class="back"><a href="<?php echo URLROOT.'/Reviews/viewAll/'.$_SESSION['current_viewing_post_id']; ?>" class="review-link">Back</a></div>
                            <div class="see-all-reviews"><a href="<?php echo URLROOT.'/Reviews/viewAll'; ?>" class="review-link">See all reviews</a></div>
                        </div>

                        <form action="<?php echo URLROOT.'/Reviews/edit/'.$data['review_id']; ?>" method="post">
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
                                    <div class="star" id="1"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                    <div class="star"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                </div>
                                <div class="text">
                                    <textarea name="review_text" id="" cols="30" rows="5" required>
                                        <?php echo $data['review_text']; ?>
                                    </textarea>
                                </div>
                                <div>
                                    <input type="submit" class="btn1" value="Save">
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
        <script>
            const ratingStars = document.querySelector('.rate-stars');
            const star = document.querySelectorAll('.star');

            // ratingStars.onclick = e => {
            //     const elClass = e.target.classList;
            //     if(!elClass.contains('active')) {
            //         star.forEach (
            //             x => x.classList.remove('active')
            //         );

            //         console.log(e.target.getAttribute('class'));
            //         elClass.add('active');
            //     }
            // };

        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>