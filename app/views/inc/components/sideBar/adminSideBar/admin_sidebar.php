<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <a href="<?php echo URLROOT.'/index'; ?>"><img src="<?php echo URLROOT; ?>/imgs/components/sidebar/logo2.jpg" width="100px" height="50px" alt="logo"></a>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
    <!-- profile upgrades -->
    <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar_upgrades.php'?>

        <!-- OPTIONS -->
    <div class="scrollable-sidebar">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Admin'): ?>
        <!-- Government university options -->
        <div class="menu-head">
            <span>Government University options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_A_Government_University/universities">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/university-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Universities
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_A_Government_University/courses">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/courses-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Courses
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_A_Government_University/courseAndUniversities">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/uni-course-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Course + University
                    </div>
                </button>
            </a>
        </div>

        <!-- Z-Score options -->
        <div class="menu-head">
            <span>Z-Score options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_A_ZScore_Options/viewZScoreTable">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/z-score-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Z-Score table
                    </div>
                </button>
            </a>
        </div>

        <!-- Users -->
        <div class="menu-head">
            <span>Users</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_A_Users/reports">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/report-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Reports
                    </div>
                </button>
            </a>
        </div>

        <!-- Posts -->
        <div class="menu-head">
            <span>Posts</span>
        </div>
        <div class="menu-head">
            <span>-- Organizations</span>
        </div>
        <div class="menu-head">
            <span>---- Private university</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_PriUniversity/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/course-post-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Course posts
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Notices/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/notice-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Notices
                    </div>
                </button>
            </a>
        </div>
        <div class="menu-head">
            <span>---- Company</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Company/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Job Ads
                    </div>
                </button>
            </a>
        </div>
        <div class="menu-head">
            <span>-- Mentors</span>
        </div>
        <div class="menu-head">
            <span>---- Professional Guider</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/banner-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Banners
                    </div>
                </button>
            </a>
        </div>
        <div class="menu-head">
            <span>---- Teacher</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_Teacher/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/adminSideBar/poster-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Posters
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
</div>

<label for="sidebar-toggle" class="body-label"></label>
