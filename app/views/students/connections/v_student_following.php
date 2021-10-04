<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <header>
                <?php require APPROOT.'/views/inc/components/topnav.php'?>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Followings</h1>
                    </div>

                    <div class="btn1">
                        <a class="card-link" href="<?php echo URLROOT.'/profileStatsAndConnections/followers/'.$_SESSION['user_id']; ?>">Followers</a>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                    <div class="link-header">
                        <div class="title"><a class="card-link" onclick="showStudentsOnly();">Students</a></div>
                        <div class="title"><a class="card-link" onclick="showOrganizationDropHeader();">Organizations</a></div>
                        <div class="title"><a class="card-link" onclick="showMentorDropHeader();">Mentors</a></div>
                    </div>
                    <hr>
                    <div id="organization-drop-down-header" style="display: none;">
                        <div class="title"><a class="card-link">University</a></div>
                        <div class="title"><a class="card-link">Company</a></div>
                    </div>
                    <div id="mentor-drop-down-header" style="display: none;">
                        <div class="title"><a class="card-link">Teacher</a></div>
                        <div class="title"><a class="card-link">Professional Guider</a></div>
                    </div>
                    
                    <br>
                    
                    <div class="default-list">
                        <?php
                            foreach($data['following'] as $follower) {
                                echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$follower->id.'" class="card-link">';
                                echo '<div class="user-block">';
                                echo    '<div class="pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($follower->actor_type).'/'.$follower->profile_image.'" alt=""></div>';
                                echo    '<div class="name">'.$follower->name.'</div>';
                                if($follower->status == 'verified'){
                                    echo    '<div class="verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                                }
                                echo '<div class="types">'.$follower->actor_type.' | '.$follower->specialized_actor_type.'</div>';
                                echo '</div>';
                                echo '</a>';
                            }
                        ?>
                    </div>

                   
                    

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        <script>
            let organizationDropHeader = document.getElementById('organization-drop-down-header');
            let mentorDropHeader = document.getElementById('mentor-drop-down-header');

            function showStudentsOnly() {
                organizationDropHeader.style.display = "none";
                mentorDropHeader.style.display = "none";
            }

            function showOrganizationDropHeader() {
                organizationDropHeader.style.display = "flex";
                mentorDropHeader.style.display = "none";
            }

            function showMentorDropHeader() {
                organizationDropHeader.style.display = "none";
                mentorDropHeader.style.display = "flex";
            }
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>