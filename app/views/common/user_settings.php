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
                        <h1>
                            settings
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <h2>Audience and Visibility</h2>
                        <p>Control who can see your profile and details</p>
                        <br>

                        <?php if(!$data['isProfileLocked']): ?>
                        <form action="<?php echo URLROOT; ?>/Account_Settings/lockProfile/<?php echo $_SESSION['user_id']; ?>" method="post">
                        <div class="lock_profile">
                            <div class="lock_profile_upper">
                                <div class="lock_icon">
                                    <img src="<?php echo URLROOT.'/imgs/pages/settings/shield-icon.png'?>" alt="">
                                </div>
                                <div class="title">
                                    <b>Hide your profile</b>
                                </div>
                                <div class="desc">
                                    Make your valuable educational and social media details more private.
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <table>
                                <tr>
                                    <td><img src="<?php echo URLROOT.'/imgs/pages/settings/details-icon.png'?>" alt=""></td>
                                    <td class="right">Your account details will be only visible to your followings</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo URLROOT.'/imgs/pages/settings/social-icon.png'?>" alt=""></td>
                                    <td class="right">Also your social media details will be only visible to your followings</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo URLROOT.'/imgs/pages/settings/search-icon.png'?>" alt=""></td>
                                    <td class="right">By the way perople will still be able to search for you and follow your profile</td>
                                </tr>
                            </table>
                            <br>
                            <button class="btn1">Lock your profile</button>
                        </div>
                        </form>
                        <?php else: ?>
                        <table class="acc-profile-locking">
                            <tr>
                                <td class="left">Hide acdemic details</td>
                                <td class="right">
                                    <div id="btn1" class="toggle">
                                        <i class="indicator"></i>
                                    </div>                               
                                </td>
                            </tr>
                            <tr>
                                <td class="left">Hide social media details</td>
                                <td class="right">
                                    <div id="btn2" class="toggle">
                                        <i class="indicator"></i>
                                    </div>                           
                                </td>
                            </tr>
                        </table>
                        <?php endif; ?>

                    </div>
            </main>
        </div>

<script>
    const btn1 = document.getElementById('btn1');
    const btn2 = document.getElementById('btn2');

    btn1.onclick = function() {
        btn1.classList.toggle('active');
    }

    btn2.onclick = function() {
        btn2.classList.toggle('active');
    }

</script>

<?php require APPROOT.'/views/inc/footer.php'; ?>