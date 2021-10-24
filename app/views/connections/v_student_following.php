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
                        <h1>connections > Followings</h1>
                    </div>

                    <div class="btn1">
                        <a class="card-link" href="<?php echo URLROOT.'/profileStatsAndConnections/followers/'.$_SESSION['user_id']; ?>">My Followers</a>
                    </div>

                    <!-- SEARCH BAR -->
                    <br>              
                    <div class="searchbar">      
                        <input type="text" name="search-user" id="search-user" class="search-user" placeholder="Search...">

                        <!-- user search list -->
                        <div class="list-group" class="show-userlist" id="show-userlist">
                            <!-- sample element -->                  
                        </div>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                    <div class="link-header">
                        <div class="title"><a class="card-link" onclick="showAll();">All</a></div>
                        <div class="title"><a class="card-link" onclick="showStudentsOnly();">Students</a></div>
                        <div class="title"><a class="card-link" onclick="showOrganizationDropHeader();">Organizations</a></div>
                        <div class="title"><a class="card-link" onclick="showMentorDropHeader();">Mentors</a></div>
                    </div>
                    <hr>
                    <div id="organization-drop-down-header" style="display: none;">
                        <div class="title"><a class="card-link" onclick="showSpecializedActorTypeList('University');">University</a></div>
                        <div class="title"><a class="card-link" onclick="showSpecializedActorTypeList('Company');">Company</a></div>
                    </div>
                    <div id="mentor-drop-down-header" style="display: none;">
                        <div class="title"><a class="card-link" onclick="showSpecializedActorTypeList('Teacher');">Teacher</a></div>
                        <div class="title"><a class="card-link" onclick="showSpecializedActorTypeList('Professional');">Professional Guider</a></div>
                    </div>
                    
                    <br>
                    
                    <div class="default-list">
                        <?php
                        // initial user list
                            foreach($data['following'] as $follower) {
                                echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$follower->id.'" class="card-link">';
                                echo '<div class="user-block">';
                                echo    '<div class="pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($follower->actor_type).'/'.$follower->profile_image.'" alt=""></div>';
                                echo    '<div class="name">'.$follower->first_name.' '.$follower->last_name.'</div>';
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
        
        <!-- searchig jquery -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        
        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
        </script>

        <!-- connections js -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/connectionsRelated/connections.js"></script>

        <!-- user search bar js -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/connectionsRelated/userSearchBar.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>