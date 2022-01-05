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
                        <h1>Undergraduate Graduate dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel">
                        <div class="middle-left-panel">                            
                            
                        
                        </div>
                        <div class="middle-right-panel">
                            <div class="notices">
                                <h2>Notices</h2>
                                <hr>
                                <p>Whiz introduce following features for you. Upgrade your profile for more features.</p>
                                <br>

                                <div class="slideshow-container">
                                    <div class="mySlides fade">
                                        <div class="numbertext">1 / 3</div>
                                        <img src="<?php echo URLROOT; ?>/imgs/components/carousels/img1.jpg" style="width:100%">
                                        <div class="text">Caption Text</div>
                                    </div>
                                    <div class="mySlides fade">
                                        <div class="numbertext">2 / 3</div>
                                        <img src="<?php echo URLROOT; ?>/imgs/components/carousels/img2.jpg" style="width:100%">
                                        <div class="text">Caption Two</div>
                                    </div>
                                    <div class="mySlides fade">
                                        <div class="numbertext">3 / 3</div>
                                        <img src="<?php echo URLROOT; ?>/imgs/components/carousels/img3.jpg" style="width:100%">
                                        <div class="text">Caption Three</div>
                                    </div>            
                                </div>                        
                                <br>
                                <div class="slideshow-dots" style="text-align:center">
                                    <span class="dot"></span> 
                                    <span class="dot"></span> 
                                    <span class="dot"></span> 
                                </div>
                                
                                
                            </div>
                            <div class="updates">
                                <h2>Following List</h2>
                                <hr>
                                <div class="index-following-list">
                                <?php
                                // initial user list
                                    foreach($data['following'] as $follower) {
                                        echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$follower->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                        echo '<div class="index-user-block">';
                                        echo    '<div class="pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($follower->actor_type).'/'.$follower->profile_image.'" alt=""></div>';
                                        echo    '<div class="name">'.$follower->first_name.' '.$follower->last_name.'</div>';
                                        if($follower->status == 'verified'){
                                            echo    '<div class="verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                                        }
                                        echo '</div>';
                                        echo '</a>';
                                    }
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>

         <!-- Carousels -->
         <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/carousels/slideshow.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>