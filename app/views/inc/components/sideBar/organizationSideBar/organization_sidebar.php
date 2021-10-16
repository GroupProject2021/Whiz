<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/imgs/components/sidebar/logo2.jpg" width="100px" height="50px" alt="logo"></a>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
    <!-- OPTIONS -->
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'University'): ?>
        <!-- University options -->
        <div class="menu-head">
            <span>University options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/organizationSideBar/courses-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        course posts
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_O_U_Courses/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/organizationSideBar/courses-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        courses
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_O_U_Notices/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/organizationSideBar/notice-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        intake notices
                    </div>
                </button>
            </a>
        </div>

        <?php elseif($_SESSION['specialized_actor_type'] == 'Company'): ?>
        <!-- Company options -->
        <div class="menu-head">
            <span>Company options</span>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/Posts_C_O_Advertisement/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/organizationSideBar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                    advertisements
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_O_C_Jobs/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/organizationSideBar/jobs-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        jobs
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/C_O_C_Cvs/index">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/organizationSideBar/cv-icon.png">
                    </div>
                    <div class="sidebar-item-name">
                        recieved cv
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
