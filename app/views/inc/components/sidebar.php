<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <a href="<?php echo URLROOT; ?>"><img src="<?php echo URLROOT; ?>/imgs/sidebar/logo2.jpg" width="90px" height="40px" alt="logo"></a>
            
            <div class="brand-icons">
                <a href=""><img src="<?php echo URLROOT; ?>/imgs/sidebar/notification-bell.png"></a>
                <a href="<?php echo URLROOT; ?>/students_dashboard/settings"><img src="<?php echo URLROOT; ?>/imgs/sidebar/settings.png"></a>
            </div>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
    <?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Beginner'): ?>
        <!-- Beginner to OL qualified upgrade -->
        <hr>
        <div class="sidebar-user-details-container">
            <div class="sidebar-user-details">
                <div class="user-level-image">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>Beginner</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="25"></progress>
                    </div>
                    <center><p>Profile complete: 25%</p></center>
                </div>
            </div>
            <div class="profile-upgrade-button-area">
                <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified">
                    <input class="profile-upgrade-button" type="button" value="UPGRADE TO OL QUALIFIED">
                </a>
            </div>
        </div>
        <hr>
        <?php elseif($_SESSION['specialized_actor_type'] == 'OL qualified'): ?>
        <!-- OL qualified to AL qualified upgrade -->
        <hr>        
        <div class="sidebar-user-details-container">
            <div class="sidebar-user-details">
                <div class="user-level-image">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>OL Qualified</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="50"></progress>
                    </div>
                    <center><p>Profile complete: 50%</p></center>
                </div>
            </div>
            <div class="profile-upgrade-button-area">
                <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified">
                    <input class="profile-upgrade-button" type="button" value="UPGRADE TO AL QUALIFIED">
                </a>
            </div>
        </div>
        <hr>
        <?php elseif($_SESSION['specialized_actor_type'] == 'AL qualified'): ?>
        <!-- AL qualified to UndergraduateGraduate upgrade -->
        <hr>
        <div class="sidebar-user-details-container">
            <div class="sidebar-user-details">
                <div class="user-level-image">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>AL Qualified</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="75"></progress>
                    </div>
                    <center><p>Profile complete: 75%</p></center>
                </div>
            </div>
            <div class="profile-upgrade-button-area">
                <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToAlQualified">
                    <input class="profile-upgrade-button" type="button" value="UPGRADE TO AL UNDERGRAD/GRAD">
                </a>
            </div>
        </div>
        <hr>
        <?php elseif($_SESSION['specialized_actor_type'] == 'Undergraduate Graduate'):?>
        <!-- UndergraduateGraduate profile completeness -->
        <hr>
        <div class="sidebar-user-details-container">
            <div class="sidebar-user-details">
                <div class="user-level-image">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>Undergrad / Grad</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="100"></progress>
                    </div>
                    <center><p>Profile complete: 100%</p></center>
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
            <a href="<?php echo URLROOT; ?>/students_dashboard/streamSelection">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        streams selection
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/students_dashboard/streamSelection">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        course selection
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
            <a href="<?php echo URLROOT; ?>/students_dashboard/streamSelection">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        streams selection
                    </div>
                </button>
            </a>
        </div>
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/students_dashboard/streamRecommendation">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        stream recommendation
                    </div>
                </button>
            </a>
        </div>
        
        <div class="sidebar-item">
            <a href="<?php echo URLROOT; ?>/students_dashboard/streamSelection">
                <button>
                    <div class="sidebar-item-icon">
                        <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                    </div>
                    <div class="sidebar-item-name">
                        course selection
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
                    cource selection
                </div>
            </button>
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
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    get teacher
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
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/idle.png">
                </div>
                <div class="sidebar-item-name">
                    check my CV
                </div>
            </button>
        </div>
        <?php else: ?>
            <!-- Nothing here -->
        <?php endif;?>
    <?php endif; ?>

    </div>
</div>

<label for="sidebar-toggle" class="body-label"></label>