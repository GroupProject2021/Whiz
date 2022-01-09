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
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/streams-icon.png">
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
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/streams-icon.png">
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
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/streams-icon.png">
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
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/streams-icon.png">
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
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/streams-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        Reports
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
