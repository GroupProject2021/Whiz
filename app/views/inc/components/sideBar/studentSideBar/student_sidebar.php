<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/imgs/sidebar/logo2.jpg" width="90px" height="40px" alt="logo"></a>
            
            <div class="brand-icons">
                <a href=""><img src="<?php echo URLROOT; ?>/imgs/sidebar/notification-bell.png"></a>
                <a href="<?php echo URLROOT; ?>/C_S_Settings/settings"><img src="<?php echo URLROOT; ?>/imgs/sidebar/settings.png"></a>
            </div>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
    <!-- profile upgrades -->
    <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar_upgrades.php'?>

        <!-- OPTIONS -->
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Beginner'): ?>
        <!-- Beginner options -->
        <div class="menu-head">
            <span>Beginner options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stream/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/streams-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        streams
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Course/index">
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
            <a href="<?php echo URLROOT; ?>/C_S_Job/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        jobs
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/professional-guider-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        professional guiders
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Community/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/community-icon-sidebar.png">
                    </div>
                    <div class="sidebar-item-name">
                        community
                    </div>
                </button>
            </a>
        </div>
        
        <?php elseif($_SESSION['specialized_actor_type'] == 'OL qualified'): ?>
        <!-- OL qualified options -->
        <div class="menu-head">
            <span>OL Qualified options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stream/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/streams-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        streams
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Course/index">
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
            <a href="<?php echo URLROOT; ?>/C_S_Job/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        jobs
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/professional-guider-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        professional guiders
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Community/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/community-icon-sidebar.png">
                    </div>
                    <div class="sidebar-item-name">
                        community
                    </div>
                </button>
            </a>
        </div>

        <?php elseif($_SESSION['specialized_actor_type'] == 'AL qualified'): ?>
        <!-- AL qualified options -->
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Course/index">
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
            <a href="<?php echo URLROOT; ?>/C_S_Job/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        jobs
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/professional-guider-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        professional guiders
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Teacher/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/teacher-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        teachers
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Community/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/community-icon-sidebar.png">
                    </div>
                    <div class="sidebar-item-name">
                        community
                    </div>
                </button>
            </a>
        </div>

        <?php elseif($_SESSION['specialized_actor_type'] == 'Undergraduate Graduate'): ?>
        <!-- Undergrad Grad options -->
        <div class="menu-head">
            <span>Underdraduate / graduate options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Job/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        jobs
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_CV/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/cv-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        cv
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/professional-guider-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        professional guiders
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
