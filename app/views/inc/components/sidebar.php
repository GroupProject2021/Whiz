<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.png" width="60px" height="60px" alt="logo">
            
            <div class="brand-icons">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/top-idle.png">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/top-idle.png">
            </div>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Beginner'): ?>
        <!-- Beginner to OL qualified upgrade -->
        <hr>
        <div class="sidebar-user-details">
            <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <p>Beginner</p>
                </div>
                <div class="profile-upgrade-progress">

                </div>
                <div class="profile-upgrade-button-area">
                    <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToOlQualified">
                        <input class="profile-upgrade-button" type="button" value="UPGRADE TO OL">
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <?php elseif($_SESSION['specialized_actor_type'] == 'OL qualified'): ?>
        <!-- OL qualified to AL qualified upgrade -->
        <hr>
        <div class="sidebar-user-details">
            <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <p>OL Qualified</p>
                </div>
                <div class="profile-upgrade-progress">

                </div>
                <div class="profile-upgrade-button-area">
                    <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified">
                        <input class="profile-upgrade-button" type="button" value="UPGRADE TO AL">
                    </a>
                </div>
            </div>
        </div>
        <hr>
        <?php elseif($_SESSION['specialized_actor_type'] == 'AL qualified'): ?>
        <!-- AL qualified to UndergraduateGraduate upgrade -->
        <hr>
        <div class="sidebar-user-details">
            <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <p>AL Qualified</p>
                </div>
                <div class="profile-upgrade-progress">

                </div>
                <div class="profile-upgrade-button-area">
                    <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToUndergraduateGraduate">
                        <input class="profile-upgrade-button" type="button" value="UPGRADE TO UNI">
                    </a>
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
        <?php if($_SESSION['specialized_actor_type'] == 'Beginner'): ?>
        <!-- Beginner options -->
        <div class="menu-head">
            <span>Beginner options</span>
        </div>
        <div class="sidebar-item">
            <a href="">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        streams
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    get guide
                </div>
            </button>
        </div>
        
        <?php elseif($_SESSION['specialized_actor_type'] == 'OL qualified'): ?>
        <!-- OL qualified options -->
        <div class="menu-head">
            <span>OL Qualified options</span>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    stream recommendation
                </div>
            </button>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    get guide
                </div>
            </button>
        </div>

        <?php elseif($_SESSION['specialized_actor_type'] == 'AL qualified'): ?>
        <!-- AL qualified options -->
        <div class="menu-head">
            <span>AL Qualified options</span>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    cource recommendation
                </div>
            </button>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    get guide
                </div>
            </button>
        </div>

        <?php elseif($_SESSION['specialized_actor_type'] == 'Undergraduate Graduate'): ?>
        <!-- Undergrad Grad options -->
        <div class="menu-head">
            <span>Underdraduate / graduate options</span>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    jobs
                </div>
            </button>
        </div>
        <?php else: ?>
            <!-- Nothing here -->
        <?php endif;?>
    <?php endif; ?>

        <div class="sidebar-item">
            <a href="">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    settings
                </div>
            </button>
            </a>
        </div>

    </div>
</div>

<label for="sidebar-toggle" class="body-label"></label>