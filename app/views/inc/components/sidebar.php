<input type="checkbox" name="" id="sidebar-toggle">

<div class="sidebar">
    <!-- sidebar header -->
    <div class="sidebar-brand">
        <div class="brand-flex">
            <img src="<?php echo URLROOT; ?>/imgs/sidebar/logo.jpg" width="50px" height="40px" alt="logo">

            <div class="brand-icons">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/icon.png">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/icon.png">
            </div>
        </div>
    </div>

    <!-- sidebar main -->
    <div class="sidebar-main">
        <hr>
        <div class="sidebar-user-details">
            <div class="user-level-image">
                <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg" alt="prof_pic">
            </div>
            <div class="user-level-content">
                <div class="user-level-name">
                    <p>Beginner</p>
                </div>
                <div class="profile-upgrade-prograse">

                </div>
                <div class="profile-upgrade-button-area">
                    <input class="profile-upgrade-button" type="button" value="UPGRADE">
                </div>
            </div>
        </div>
        <hr>

        <div class="menu-head">
            <span>Dashboard</span>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/icon.png">
                </div>
                <div class="sidebar-item-name">
                    cources
                </div>
            </button>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/icon.png">
                </div>
                <div class="sidebar-item-name">
                    jobs
                </div>
            </button>
        </div>
        <div class="sidebar-item">
            <button>
                <div class="sidebar-item-icon">
                    <img src="<?php echo URLROOT; ?>/imgs/sidebar/icon.png">
                </div>
                <div class="sidebar-item-name">
                    prediction
                </div>
            </button>
        </div>

    </div>
</div>

<label for="sidebar-toggle" class="body-label"></label>