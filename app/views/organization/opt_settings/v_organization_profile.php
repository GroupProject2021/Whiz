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
                        <h1> <?php echo $data['user']->specialized_actor_type.' '?> profile</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                                            
                    <div class="org-profile">
                        <div class="header">
                            <div class="imagearea">
                            <form action="<?php echo URLROOT; ?>/C_O_Settings/editProfilePic" method="post" enctype="multipart/form-data">
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
                                <input type="hidden" id="user_id" name="user_id" value="<?php echo $data['user']->id;?>">
                            </form>
                            </div>
                            <div class="details">
                                <div class="name">
                                    <?php echo $data['user']->first_name;?>
                                    <?php if($data['user']->status == 'verified'): ?>
                                        <img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="occupation"><?php echo $data['user']->actor_type; ?> | <?php echo $data['user']->specialized_actor_type;?> </div>
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

                                <!-- university details -->
                        <?php if($data['user']->specialized_actor_type == 'University' ): ?>
                                <div class="division">
                                    <div class="division-name">University details</div>
                                    <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                    <div class="editable">
                                        <a href="<?php echo URLROOT; ?>/C_O_Settings/editSettingsUniversity"><button class="btn1-small">Edit</button></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="beginner-detials">
                                    <div class="founder">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/founder-icon.png'; ?>" alt="">Founder</div>
                                        <div class="text"><?php echo $data['founder'];?></div>                                        
                                    </div>
                                    <div class="foundyear">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/founded-year-icon.png'; ?>" alt="">Founded Year</div>
                                        <div class="text"><?php echo $data['founded_year'];?></div>
                                    </div>
                                    <div class="phnno">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/phnno-icon.png'; ?>" alt="">Phone no</div>
                                        <div class="text"><?php echo $data['phn_no'];?></div>                                        
                                    </div>
                                    <div class="email">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/email-icon.png'; ?>" alt="">Email</div>
                                        <div class="text"><?php echo $data['email'];?></div>
                                    </div>
                                    <div class="website">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/website-icon.png'; ?>" alt="">Website</div>
                                        <div class="text"><?php echo $data['website'];?></div>    
                                    </div>
                                    <div class="address">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/address-icon.png'; ?>" alt="">Address</div>
                                        <div class="text"><?php echo $data['address'];?></div>    
                                    </div>
                                    <div class="approval">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/ugc-approval-icon.png'; ?>" alt="">UGC Approval</div>
                                        <div class="text"><?php echo $data['approval'];?></div>    
                                    </div>
                                    <div class="rank">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/world-rank-icon.png'; ?>" alt="">World Rank</div>
                                        <div class="text"><?php echo $data['rank'];?></div>    
                                    </div>
                                    <div class="amount">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/student-amount-icon.png'; ?>" alt="">Student Amount</div>
                                        <div class="text"><?php echo $data['amount'];?></div>    
                                    </div>
                                    <div class="rate">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/job-rate-icon.png'; ?>" alt="">Job Rate</div>
                                        <div class="text"><?php echo $data['rate'];?></div>    
                                    </div>
                                    <div class="description">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/description-icon.png'; ?>" alt="">Description</div>
                                        <div class="text"><?php echo $data['descrip'];?></div>    
                                    </div>
                                </div>
                                <hr>
                        <?php endif; ?>

                        <!-- company details -->
                        <?php if($data['user']->specialized_actor_type == 'Company' ): ?>
                                <div class="division">
                                    <div class="division-name">Company details</div>
                                    <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                    <div class="editable">
                                        <a href="<?php echo URLROOT; ?>/C_O_Settings/editSettingsCompany"><button class="btn1-small">Edit</button></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="beginner-detials">
                                    <div class="founder">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/founder-icon.png'; ?>" alt="">Founder</div>
                                        <div class="text"><?php echo $data['founder'];?></div>                                        
                                    </div>
                                    <div class="foundyear">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/founded-year-icon.png'; ?>" alt="">Founded Year</div>
                                        <div class="text"><?php echo $data['founded_year'];?></div>
                                    </div>
                                    <div class="phnno">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/phnno-icon.png'; ?>" alt="">Phone no</div>
                                        <div class="text"><?php echo $data['phn_no'];?></div>                                        
                                    </div>
                                    <div class="email">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/email-icon.png'; ?>" alt="">Email</div>
                                        <div class="text"><?php echo $data['email'];?></div>
                                    </div>
                                    <div class="website">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/website-icon.png'; ?>" alt="">Website</div>
                                        <div class="text">www.xyz.com</div>    
                                    </div>
                                    <div class="address">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/address-icon.png'; ?>" alt="">Address</div>
                                        <div class="text"><?php echo $data['address'];?></div>    
                                    </div>
                                    <div class="curemp">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/current-employee-icon.png'; ?>" alt="">Current Employees</div>
                                        <div class="text"><?php echo $data['cur_emp'];?></div>    
                                    </div>
                                    <div class="size">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/company-size-icon.png'; ?>" alt="">Company Size</div>
                                        <div class="text"><?php echo $data['size'];?></div>   
                                    </div>
                                    <div class="registered">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/registered-icon.png'; ?>" alt="">Registered</div>
                                        <div class="text"><?php echo $data['registered'];?></div>    
                                    </div>
                                    <div class="overview">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/overview-icon.png'; ?>" alt="">Overview</div>
                                        <div class="text"><?php echo $data['overview'];?></div>
                                    </div>
                                    <div class="services">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/organization/services-icon.png'; ?>" alt="">Services</div>
                                        <div class="text"><?php echo $data['services'];?></div>
                                    </div>
                                </div>
                                <hr>
                        <?php endif; ?>
                         
                            </div>
                        </div>
                        <div class="body">

                        </div>

                        <div class="footer">

                        </div>
                    </div>

                    <br>

                    <div class= 

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