<div class="stu-topnav">
    <?php if(isset($_SESSION['user_id'])) : ?> 
    <div class="toggler">
        <img src="<?php echo URLROOT.'/imgs/components/topNavBar/sidebar-icon.png' ?>" alt="">
    </div>
    <?php endif; ?>
    <div class="rightset">        
        <?php if(isset($_SESSION['user_id'])) : ?> 
        <div class="dropdown">
            <button class="dropbtn">
                <img src="<?php echo URLROOT.'/imgs/components/topNavBar/down-btn-icon.png' ?>" alt="">
                <div>Account</div>
            </button>
           
            <div class="dropdown-content">
                <a href="#">
                    <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/privacy-icon.png' ?>" alt=""></div>
                    <div class="name">Privacy</div>
                </a>
                <a href="#">
                    <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/help-icon.png' ?>" alt=""></div>
                    <div class="name">Help</div>
                </a>
                <a href="<?php echo URLROOT; ?>/commons/logout">
                    <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/logout-icon.png' ?>" alt=""></div>
                    <div class="name">Log Out</div>
                </a>
            </div>
        </div>

        <a href="<?php echo URLROOT.'/Commons/userDashboardRedirect'; ?>" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/components/topNavBar/home-icon.png' ?>" alt="">
            <div>Home</div>
        </button>
        </a>

        <!-- <a href="<?php echo URLROOT.'/Commons/userDashboardRedirect'; ?>" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/components/topNavBar/notifications-icon.png' ?>" alt="">
            <div>Notifications</div>
            <span class="badge">2</span>
        </button>
        </a> -->

        <div class="dropdown" id="notification-button">
            <button class="dropbtn">
                <img src="<?php echo URLROOT.'/imgs/components/topNavBar/down-btn-icon.png' ?>" alt="">
                <div>Account</div>
            </button>
           
            <!-- <div class="dropdown-content">
                <a href="#">
                    <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/privacy-icon.png' ?>" alt=""></div>
                    <div class="name">Privacy</div>
                </a>
                <a href="#">
                    <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/help-icon.png' ?>" alt=""></div>
                    <div class="name">Help</div>
                </a>
                <a href="<?php echo URLROOT; ?>/commons/logout">
                    <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/logout-icon.png' ?>" alt=""></div>
                    <div class="name">Log Out</div>
                </a>
            </div> -->

            <div class="notification-content">
                <div class="notification">
                    <div class="left">
                        <div class="pic">
                            <img src="<?php echo URLROOT.'/imgs/prof.jpg'; ?>" alt="">
                        </div>
                    </div>
                    <div class="right">
                        <div class="text">
                            <b>Dhanushka sandaleum </b>posted a new banner
                        </div>
                        <div class="notfied-at">
                            Just Now
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <a href="<?php echo URLROOT.'/profileStatsAndConnections/followers/'.$_SESSION['user_id']; ?>" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/components/topNavBar/connections-icon.png' ?>" alt="">
            <div>Connections</div>
        </button>
        </a>

        <?php 
            switch($_SESSION['actor_type']) {
                case 'Student':
                    echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$_SESSION['user_id'].'" class="topnav-link">';
                    break;

                case 'Mentor':
                    echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$_SESSION['user_id'].'" class="topnav-link">';
                    break;
                
                case 'Organization':
                    echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$_SESSION['user_id'].'" class="topnav-link">';
                    break;

                case 'Admin':
                    echo '<a href="'.URLROOT.'/C_A_Settings/settings/'.$_SESSION['user_id'].'" class="topnav-link">';
                    break;

                default:
                    break;
            }
        ?>
        <div class="profile">
            <div class="pic">
                <?php
                    echo '<img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'].'?>" alt="profile_image">';
                ?>
            </div>
            <div class="name"><?php echo $_SESSION['user_name']; ?></div>
        </div>
        </a>
        <?php else: ?>

        <a href="<?php echo URLROOT; ?>/commons/login" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/components/topNavBar/signin-icon.png' ?>" alt="">
            <div>Login</div>
        </button>
        </a>

        <a href="<?php echo URLROOT; ?>/commons/registerredirect" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/components/topNavBar/signup-icon.png' ?>" alt="">
            <div>Register</div>
        </button>        
        </a>

        <?php endif; ?>
        
    </div>
</div>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
<script>
    $showNotification = false;

    $('#notification-button').click(function() {
        if($showNotification == false) {
            $('.notification-content').css({display: "block"});
            $showNotification = true;
        }
        else {
            $('.notification-content').css({display: "none"});
            $showNotification = false;
        }
    })
</script>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/sideBarToggle/sideBarToggler.js"></script>