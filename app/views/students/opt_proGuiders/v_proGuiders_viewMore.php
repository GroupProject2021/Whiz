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
                        <h1>professional guider view more</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    
                    <div class="pg-profile">
                        <div class="header">
                            <div class="imagearea">
                                <div class="wall"><img src="<?php echo URLROOT.'/imgs/wallbg.jpg'; ?>" alt=""></div>
                                <div class="profpic"><img src="<?php echo URLROOT.'/imgs/prof.jpg'; ?>" alt=""></div>
                            </div>
                            <div class="details">
                                <div class="name">Dhanushka sandakelum <img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                <div class="occupation">Mentor | Professional guider</div>
                                <div class="institute">XYZ collage Colombo 7</div>
                                <hr>
                                <div class="profile-stats">
                                    <div class="followers"><b>Followers</b> 100</div>
                                    <div class="following"><b>Following</b> 16</div>
                                    <div class="rating"><b>Rate</b> 4.0/5.0</div>
                                </div>
                                <hr>
                                <div class="contact-detials">
                                    <div class="phnno">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/phnno-icon.png'; ?>" alt="">Phone no</div>
                                        <div class="text">0775642956</div>                                        
                                    </div>
                                    <div class="email">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/email-icon.png'; ?>" alt="">Email</div>
                                        <div class="text">dhanushkasandakelum117@gmail.com</div>
                                    </div>
                                    <div class="website">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/website-icon.png'; ?>" alt="">Website</div>
                                        <div class="text">www.xyz.com</div>    
                                    </div>
                                    <div class="address">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/address-icon.png'; ?>" alt="">Address</div>
                                        <div class="text">132/B, Baker street, London</div>    
                                    </div>
                                </div>
                                <hr>
                                <div class="About">
                                    <div class="title">About</div>
                                    <div class="text">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                         Commodi velit, quibusdam, cum officia nesciunt, autem impedit quod culpa magnam reiciendi
                                        s necessitatibus repellat corporis dicta recusandae facere pariatur dignissimos maxime! Laudantium.
                                    </div>
                                </div>
                                <hr>
                                <div class="interactable">
                                    <div class="msg-btn">
                                        <button class="btn1-round">Message</button>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="body">

                        </div>
                        <div class="footer">

                        </div>
                    </div>

                    <br>

                    <div class="pg-profile-tail">
                        <?php for($j = 0; $j < 5; $j++): ?>
                                <div class="poster">
                                    <div class="poster-header">
                                        <img src="<?php echo URLROOT.'/imgs/banner.jpg'; ?>" alt="">
                                    </div>
                                    <div class="poster-body">
                                        <div class="title">PHP for Beginners (poster) [Think this as a banner ]</div>
                                        <div class="postedby">Dhanushka sandakelum</div>
                                        <div class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. In et fuga, ullam odit quidem illo consequuntur temporibus pariatur dicta similique non eaque voluptatum velit distinctio, vitae nisi blanditiis, saepe exercitationem!</div>
                                        <div class="stats">
                                            <div class="ups"><img src="<?php echo URLROOT.'/imgs/up-icon.png'; ?>" alt=""></div>
                                            <div class="ups-count">100</div>
                                            <div class="downs"><img src="<?php echo URLROOT.'/imgs/down-icon.png'; ?>" alt=""></div>
                                            <div class="downs-count">96</div>
                                            <div class="rate">3.0</div>
                                            <?php for($i=0; $i <5; $i++):?>
                                            <div class="stars"><img src="<?php echo URLROOT.'/imgs/star-icon.png'; ?>" alt=""></div>
                                            <?php endfor;?>
                                            <div class="enrollment">(10,623)</div>
                                        </div>                            
                                        <div class="price">Rs. 1000.00</div>
                                    </div>
                                </div>

                                <br>
                        <?php endfor; ?>
                    </div>


                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>