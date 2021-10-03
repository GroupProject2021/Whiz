<?php if(isset($_SESSION['user_id'])) : ?>
        <?php if($_SESSION['specialized_actor_type'] == 'Beginner'): ?>
        <!-- Beginner to OL qualified upgrade -->
        <div class="sidebar-user-details-container">
            <div class="sidebar-user-details">
                <div class="user-level-image">
                    <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>Beginner</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="25"></progress>
                    </div>
                    <div class="profile-completion-text">
                        <p>PROFILE COMPLETION: 25%</p>
                    </div>
                </div>
            </div>
            <div class="profile-upgrade-button-area">
                <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToOlQualified">
                    <input class="profile-upgrade-button" type="button" value="UPGRADE TO OL QUALIFIED">
                </a>
            </div>
        </div>
        <?php elseif($_SESSION['specialized_actor_type'] == 'OL qualified'): ?>
        <!-- OL qualified to AL qualified upgrade -->
        <hr>        
        <div class="sidebar-user-details-container">
            <div class="sidebar-user-details">
                <div class="user-level-image">
                    <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>OL Qualified</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="50"></progress>
                    </div>
                    <div class="profile-completion-text">
                        <p>PROFILE COMPLETION: 50%</p>
                    </div>
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
                    <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>AL Qualified</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="75"></progress>
                    </div>
                    <div class="profile-completion-text">
                        <p>PROFILE COMPLETION: 75%</p>
                    </div>
                </div>
            </div>
            <div class="profile-upgrade-button-area">
                <a href="<?php echo URLROOT; ?>/Students_ProfileUpgrade/upgradeToUndergraduateGraduate">
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
                    <img src="<?php echo URLROOT; ?>/imgs/components/sidebar/studentSideBar/2.jpg" alt="prof_pic">
                </div>
                <div class="user-level-content">
                    <div class="user-level-name">
                        <p>Undergrad / Grad</p>
                    </div>
                    <div class="profile-upgrade-progress">
                        <progress max="100" value="100"></progress>
                    </div>
                    <div class="profile-completion-text">
                        <p>PROFILE COMPLETION: 100%</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <?php else:?>
            <!-- Nothing here -->
        <?php endif; ?>
<?php endif; ?>