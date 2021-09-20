<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
        <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/imgs/sidebar/logo2.jpg" width="90px" height="40px" alt="logo"></a>
            
            <div class="brand-icons">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/top-idle.png">
                <!-- <img src="<?php echo URLROOT; ?>/imgs/sidebar/top-idle.png"> -->
            </div>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
        <!-- Professional Guider to Teacher upgrade -->
        <hr>
        <div class="sidebar-user-details">
            <!-- <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
            </div> -->
            <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/profileimages/mentor/<?php echo $_SESSION['user_profile_image']; ?>" alt="prof_pic" >
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <!-- <p>Professional Guider</p> -->
                    <p><?php echo $_SESSION['user_name']; ?></p>
                </div>
                <!-- <div class="profile-upgrade-progress"> -->

                </div>
                <!-- <div class="profile-upgrade-button-area">
                    <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToOlQualified">   -->
                    <!-- update button should come here -->
                        <!-- <input class="profile-upgrade-button" type="button" value="UPGRADE TO OL">
                    </a>
                </div> -->
            </div>
        </div>
        <hr>

        <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
        <!-- Teacher to AL qualified upgrade -->
        <hr>
        <div class="sidebar-user-details">
            <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <p>Teacher</p>
                </div>
                <div class="profile-upgrade-progress">

                </div>
                <!-- <div class="profile-upgrade-button-area">
                    <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified">
                     <!-- update button should come here -->
                        <!--<input class="profile-upgrade-button" type="button" value="UPGRADE TO AL">
                    </a>
                </div> -->
            </div>
        </div>
        <hr>
        <?php else:?>
            <!-- Nothing here -->
        <?php endif; ?>
    <?php endif; ?>

    <!-- dashboard option -->
        <!-- <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Professional_Guiders_dashboard/index">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    Dashboard
                </div>
            </button>
            </a>
        </div> -->

        <!-- OPTIONS -->
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
        <!-- Professional Guider options -->
        <div class="menu-head">
            <span>Professional Guider options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        Banners
                    </div>
                </button>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        Enrolment List
                    </div>
                </button>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        Complaints
                    </div>
                </button>
            </a>
        </div>
        
        <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
        <!-- Teacher options -->
        <div class="menu-head">
            <span>Teacher options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/posts/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        Posters
                    </div>
                </button>
            </a>

            <a href="<?php echo URLROOT; ?>/posts/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        Enrolment List
                    </div>
                </button>
            </a>

            <a href="<?php echo URLROOT; ?>/posts/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        Complaints
                    </div>
                </button>
            </a>
        </div>
        <?php else: ?>
            <!-- Nothing here -->
        <?php endif;?>
    <?php endif; ?>    

        <!-- <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/students_dashboard/settings">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    settings
                </div>
            </button>
            </a>
        </div> -->

    </div>
</div>

<label for="sidebar-toggle" class="body-label"></label>