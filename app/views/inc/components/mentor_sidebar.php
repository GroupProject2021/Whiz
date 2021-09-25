<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/imgs/sidebar/logo2.jpg" width="90px" height="40px" alt="logo"></a>
            
            <div class="brand-icons">
            <!-- <a href=""><img src="<?php echo URLROOT; ?>/imgs/sidebar/notification-bell.png"></a> -->
            <a href="<?php echo URLROOT; ?>/C_M_Settings/settings"><img src="<?php echo URLROOT; ?>/imgs/sidebar/settings.png"></a>
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
            </div>
        </div>
        <hr>

        <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>

        <hr>
        <div class="sidebar-user-details">
            <div class="user-level-image">
              <img src="<?php echo URLROOT; ?>/profileimages/mentor/<?php echo $_SESSION['user_profile_image']; ?>" alt="prof_pic" >
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <!-- <p>Teacher</p> -->
                    <p><?php echo $_SESSION['user_name']; ?></p>
                </div>
            </div>
        </div>
        <hr>
        <?php else:?>
            <!-- Nothing here -->
        <?php endif; ?>
    <?php endif; ?>

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
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/post-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Banners
                    </div>
                </button>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_M_Enrolment_List/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/recommend-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Enrolment List
                    </div>
                </button>
            </a>
        </div>

        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/complaint">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/complaint-icon.png">
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
            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/poster">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/post-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Posters
                    </div>
                </button>
            </a>

            <a href="<?php echo URLROOT; ?>/C_M_Enrolment_List/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/recommend-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Enrolment List
                    </div>
                </button>
            </a>

            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/complaint">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/complaint-icon.png">
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

    </div>
</div>

<label for="sidebar-toggle" class="body-label"></label>