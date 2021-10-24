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
                        <h1>Profile</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    
                    <div class="stu-profile">
                        <div class="header">
                            <div class="imagearea">
                            <form action="<?php echo URLROOT; ?>/C_M_Settings/editProfilePic" method="post" enctype="multipart/form-data">
                                <div class="wall">
                                    <img src="<?php echo URLROOT.'/imgs/wallbg.jpg'; ?>" alt="">
                                </div>
                                <div class="profpic">                                    
                                    <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['user']->actor_type).'/'.$data['user']->profile_image; ?>" alt="" id="profile_image_placeholder">
                                    <input type="file" name="profile_image" id="profile_image" onchange="displayImage(this)" style="display: none;">
                                    <!-- profile pic edit area -->
                                    <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                    <div class="profile-pic-edit-area">
                                        <!-- flash message -->              
                                        <!-- <?php flash('profile_image_upload'); ?> -->
                                        <div class="btn1-small" onclick="toggleBrowse(); " id="edit_profpic_click">Edit Profile Picture</div>
                                        <input type="submit" value="Save Changes" class="btn1-small" id="save_profilepic_click" style="display: none;">
                                        <div class="btn1-small" onclick="cancelProfPicChange(); " id="canceledit_profpic_click" style="display: none;">Cancel</div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                
                            </form>
                            </div>
                            <div class="details">
                                <div class="name">
                                    <?php echo $data['first_name'].' '.$data['last_name'];?>
                                    <?php if($data['user']->status == 'verified'): ?>
                                        <img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="occupation"><?php echo $data['user']->actor_type; ?> | <?php echo $data['user']->specialized_actor_type;?> </div>
                                <div class="institute">
                                    <?php
                                        switch($data['user']->specialized_actor_type) {
                                            case 'Teacher': 
                                                echo '';
                                                break;
                                            
                                            case 'Professional Guider':
                                                echo $data['institute'];
                                                break;
                                            default:
                                                break;
                                        }
                                    ?>
                                </div>
                                <hr>
                                <div class="profile-stats">
                                    <div class="followers"><a href="<?php echo URLROOT.'/profileStatsAndConnections/followers/'.$data['user']->id; ?>" class="card-link"><b>Followers </b><span id="followers-count"><?php echo $data['followerCount']; ?></span></a></div>
                                    <div class="following"><a href="<?php echo URLROOT.'/profileStatsAndConnections/followings/'.$data['user']->id; ?>" class="card-link"><b>Following</b> <?php echo $data['followingCount']; ?></a></div>
                                    <div class="rating"><a href="" class="card-link"><b>Rate</b> 4.0/5.0</a></div>
                                </div>
                                <hr>
                                <?php if($data['user']->id != $_SESSION['user_id']): ?>
                                <div class="interactable">
                                    <?php if(!$data['isAlreadyFollow']): ?>
                                    <a class="msg-btn card-link" id="follow">
                                        <button class="btn1-round" id="followBtn">Follow</button>
                                    </a>
                                    <?php endif; ?>
                                    <?php if($data['isAlreadyFollow']): ?>
                                    <a href="<?php echo URLROOT.'/profileStatsAndConnections/unfollow/'.$data['user']->id; ?>" class="msg-btn" id="following">
                                        <button class="btn7-round" id="followingBtn">Following</button>
                                    </a>
                                    <?php endif; ?>
                                    <a href="" class="msg-btn">
                                        <button class="btn1-round">Message</button>
                                    </a>
                                </div>
                                <hr>
                                <?php endif; ?>
                                <!-- beginner details -->
                        <?php if($data['user']->specialized_actor_type == 'Teacher'): ?>
                                <div class="division">
                                    <div class="division-name">Basic Details</div>
                                    <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                    <div class="editable">
                                        <a href="<?php echo URLROOT; ?>/C_M_Settings/editSettingsTeacher"><button class="btn1-small">Edit</button></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="beginner-detials">
                                    <div class="address">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/mentor/address-icon.png'; ?>" alt="">Address</div>
                                        <div class="text"><?php echo $data['address'];?></div>    
                                    </div>
                                    <div class="email">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/mentor/email-icon.png'; ?>" alt="">Email</div>
                                        <div class="text"><?php echo $data['email'];?></div>
                                    </div>
                                    <!-- <div class="Date of birth">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/mentor/dob-icon.png'; ?>" alt="">Date of Birth</div>
                                        <div class="text"><?php echo $data['date_of_birth'];?></div>                                        
                                    </div> -->
                                    <div class="Gender">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/mentor/gender-icon.png'; ?>" alt="">Gender</div>
                                        <div class="text"><?php echo $data['gender'];?></div>
                                    </div>
                                    <div class="phnno">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/mentor/phnno-icon.png'; ?>" alt="">Phone no</div>
                                        <div class="text"><?php echo $data['phn_no'];?></div>                                        
                                    </div>
                                    
                                    <!-- <div class="website">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/mentor/website-icon.png'; ?>" alt="">Website</div>
                                        <div class="text">www.xyz.com</div>    
                                    </div> -->
                                    
                                </div>
                                <hr>
                        <?php endif; ?>
                        <div class="About">
                            <div class="title">About</div>
                                <div class="text">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Commodi velit, quibusdam, cum officia nesciunt, autem impedit quod culpa magnam reiciendi
                                    s necessitatibus repellat corporis dicta recusandae facere pariatur dignissimos maxime! Laudantium.
                                </div>
                            </div>
                            <hr>
                                
                        </div>
                        </div>
                        <div class="body">

                        </div>
                        <div class="footer">

                        </div>
                    </div>

                    <br>

                    <div class="stu-profile-tail">
                        
                    </div>


                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        <!-- jquery -->        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- javascript profile image change -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/profilesRelated/profileImageChange.js"></script>

        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';
            var USER_ID = '<?php echo $data['user']->id; ?>';
        </script>

        <!-- javascript profile follow related  -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/profilesRelated/profileStatsAndConnections.js"></script>
<?php require APPROOT.'/views/inc/footer.php'; ?>