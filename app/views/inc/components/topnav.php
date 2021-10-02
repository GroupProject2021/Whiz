<div class="stu-topnav">
    <?php if(isset($_SESSION['user_id'])) : ?> 
    <div class="toggler">
        <img src="<?php echo URLROOT.'/imgs/sidebar-icon.png' ?>" alt="">
    </div>
    <?php endif; ?>
    <div class="rightset">        
        <?php if(isset($_SESSION['user_id'])) : ?> 
        <div class="dropdown">
            <button class="dropbtn">
                <img src="<?php echo URLROOT.'/imgs/down-btn-icon.png' ?>" alt="">
                <div>Account</div>
            </button>
           
            <div class="dropdown-content">
                <a href="#">
                    <div><img src="<?php echo URLROOT.'/imgs/home-icon.png' ?>" alt=""></div>
                    <div class="name">Privacy</div>
                </a>
                <a href="#">
                    <div><img src="<?php echo URLROOT.'/imgs/help-icon.png' ?>" alt=""></div>
                    <div class="name">Help</div>
                </a><a href="<?php echo URLROOT; ?>/commons/logout">
                    <div><img src="<?php echo URLROOT.'/imgs/logout-icon.png' ?>" alt=""></div>
                    <div class="name">Log Out</div>
                </a>
            </div>
        </div>

        <a href="<?php echo URLROOT.'/Commons/userDashboardRedirect'; ?>" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/home-icon.png' ?>" alt="">
            <div>Home</div>
        </button>
        </a>

        <a href="<?php echo URLROOT.'/C_S_Settings/settings/'.$_SESSION['user_id']; ?>" class="topnav-link">
        <div class="profile">
            <div class="pic">
                <?php
                    echo '<img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'].'?>" alt="profile_image">';
                ?>
            </div>
            <div class="name">Dhanushka</div>
        </div>
        </a>
        <?php else: ?>

        <a href="<?php echo URLROOT; ?>/commons/login" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/signin-icon.png' ?>" alt="">
            <div>Login</div>
        </button>
        </a>

        <a href="<?php echo URLROOT; ?>/commons/registerredirect" class="topnav-link">
        <button class="normalbtn">
            <img src="<?php echo URLROOT.'/imgs/signup-icon.png' ?>" alt="">
            <div>Register</div>
        </button>        
        </a>

        <?php endif; ?>
        
    </div>
</div>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/stuSideBarToggler.js"></script>