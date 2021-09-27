<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/imgs/sidebar/logo2.jpg" width="90px" height="40px" alt="logo"></a>
            
            <div class="brand-icons">
                <a href=""><img src="<?php echo URLROOT; ?>/imgs/sidebar/notification-bell.png"></a>
                <a href="<?php echo URLROOT; ?>/C_O_U_Settings/settings"><img src="<?php echo URLROOT; ?>/imgs/sidebar/settings.png"></a>
            </div>
        </div>
    </div>
 
        <!-- OPTIONS -->
    <?php if(isset($_SESSION['user_id'])) : ?>
        <div class="menu-head">
            <span>University options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_O_U_Courses/courses">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/courses-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        courses
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_O_U_Notices/notices">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/notice-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        intake notices
                    </div>
                </button>
            </a>
        </div>
    <?php endif; ?>
</div>

<label for="sidebar-toggle" class="body-label"></label>