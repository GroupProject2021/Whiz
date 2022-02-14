<div class="stu-topnav">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <!-- Side menu toggler -->
        <div class="toggler">
            <img src="<?php echo URLROOT.'/imgs/components/topNavBar/sidebar-icon.png' ?>" alt="">
        </div>

    <?php else: ?>

            <!-- Whiz home -->
            <a href="<?php echo URLROOT; ?>/index" class="topnav-link">
                <button class="normalbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/home-icon.png' ?>" alt="">
                    <div>Home</div>
                </button>
            </a>

    <?php endif; ?>
    <div class="rightset">        
        <?php if(isset($_SESSION['user_id'])) : ?> 

            <!-- account -->
            <div class="dropdown">
                <button class="dropbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/down-btn-icon.png' ?>" alt="">
                    <div>Account</div>
                </button>
            
                <div class="dropdown-content">
                    <a href="<?php echo URLROOT; ?>/Account_Settings/accountSettings/<?php echo $_SESSION['user_id']; ?>">
                        <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/settings-icon.png' ?>" alt=""></div>
                        <div class="name">Settings</div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/Pages/privacy">
                        <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/privacy-icon.png' ?>" alt=""></div>
                        <div class="name">Privacy Policy</div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/Pages/seeMore/<?php echo $_SESSION['actor_type'].'s/'. $_SESSION['specialized_actor_type']?>">
                        <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/help-icon.png' ?>" alt=""></div>
                        <div class="name">Help & Support</div>
                    </a>
                    <a href="<?php echo URLROOT; ?>/commons/logout">
                        <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/logout-icon.png' ?>" alt=""></div>
                        <div class="name">Log Out</div>
                    </a>
                </div>
            </div>

            <!-- Home -->
            <a href="<?php echo URLROOT.'/Commons/userDashboardRedirect'; ?>" class="topnav-link">
                <button class="normalbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/home-icon.png' ?>" alt="">
                    <div>Home</div>
                </button>
            </a>

            <!-- Notifications -->
            <div class="dropdown" id="notification-button">
                <button class="dropbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/notifications-icon.png' ?>" alt="">
                    <div>Notifications</div>
                    <span class="red-notification-count" id="red-notification-count"></span>
                </button>

                
                <div class="notification-content">
                    <div id="notifications"></div>
                    <!-- <div class="notification">
                        <div class="left">
                            <div class="pic">
                                <img src="<?php //echo URLROOT.'/imgs/prof.jpg'; ?>" alt="">
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
                    </div>          -->
                </div>
            </div>

            <!-- connections -->
            <div class="dropdown">
                <button class="dropbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/connections-icon.png' ?>" alt="">
                    <div>Connections</div>
                </button>
            
                <div class="dropdown-content">
                    <a href="<?php echo URLROOT.'/profileStatsAndConnections/followers/'.$_SESSION['user_id']; ?>">
                        <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/followers-icon.png' ?>" alt=""></div>
                        <div class="name">Followers</div>
                    </a>
                    <a href="<?php echo URLROOT.'/profileStatsAndConnections/followings/'.$_SESSION['user_id']; ?>">
                        <div><img src="<?php echo URLROOT.'/imgs/components/topNavBar/followings-icon.png' ?>" alt=""></div>
                        <div class="name">Followings</div>
                    </a>
                </div>
            </div>

            <!-- Currect profile -->
            <?php 
                switch($_SESSION['actor_type']) {
                    case 'Student':
                        echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id'].'" class="topnav-link">';
                        break;

                    case 'Mentor':
                        echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id'].'" class="topnav-link">';
                        break;
                    
                    case 'Organization':
                        echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id'].'" class="topnav-link">';
                        break;

                    case 'Admin':
                        echo '<a href="'.URLROOT.'/C_A_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id'].'" class="topnav-link">';
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

            <!-- Log in -->
            <a href="<?php echo URLROOT; ?>/commons/login" class="topnav-link">
                <button class="normalbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/signin-icon.png' ?>" alt="">
                    <div>Login</div>
                </button>
            </a>

            <!-- Register -->
            <a href="<?php echo URLROOT; ?>/commons/registerredirect" class="topnav-link">
                <button class="normalbtn">
                    <img src="<?php echo URLROOT.'/imgs/components/topNavBar/signup-icon.png' ?>" alt="">
                    <div>Register</div>
                </button>        
            </a>

        <?php endif; ?>
        
    </div>
</div>

<!-- jquery -->
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

<!-- common settings js -->
<script type="text/JavaScript">
    var URLROOT = '<?php echo URLROOT; ?>';            
    var OWN_USER_ID= '<?php echo $_SESSION['user_id']; ?>';
</script>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/notificationAlert/notificationAlert.js"></script>