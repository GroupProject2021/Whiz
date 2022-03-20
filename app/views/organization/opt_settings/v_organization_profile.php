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
                                <?php if($data['user']->id != $_SESSION['user_id']): ?>
                                <div class="connection-btn">
                                    <?php if(!$data['isAlreadyFollow']): ?>
                                    <a class="msg-btn card-link" id="follow">
                                        <button class="btn1-round" id="followBtn">Follow</button>
                                    </a>
                                    <?php endif; ?>
                                    <?php if($data['isAlreadyFollow']): ?>
                                    <a href="<?php echo URLROOT.'/ProfileStatsAndConnections/unfollow/'.$data['user']->id; ?>" class="msg-btn" id="following">
                                        <button class="btn7-round" id="followingBtn">Following</button>
                                    </a>
                                    <?php endif; ?>
                                    <a href="" class="msg-btn">
                                        <!-- <button class="btn1-round">Message</button> -->
                                    </a>
                                </div>
                                <?php endif; ?>
                                <hr>
                                <div class="profile-stats">
                                    <div class="followers"><a href="<?php echo URLROOT.'/ProfileStatsAndConnections/followers/'.$data['user']->id; ?>" class="post-link"><b>Followers </b><span id="followers-count"><?php echo $data['followerCount']; ?></span></a></div>
                                    <div class="following"><a href="<?php echo URLROOT.'/ProfileStatsAndConnections/followings/'.$data['user']->id; ?>" class="post-link"><b>Following</b> <?php echo $data['followingCount']; ?></a></div>
                                </div>
                                <hr>
                                

                                <!-- university details -->
                                
                    <?php if($data['user']->specialized_actor_type == 'University' ): ?>
                            <!-- general details -->
                    <?php if(!$data['is_pri_gen_details_locked'] || $data['user']->id == $_SESSION['user_id']): ?>
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
                        <?php else: ?>
                                <!-- locked general details -->
                                <div class="division">
                                    <div class="division-name">General details</div>
                                    <div></div>
                                </div>
                                <div class="user-locked-profile">
                                    <div class="left">
                                        <img src="<?php echo URLROOT.'/imgs/pages/settings/shield-icon.png'?>" alt="">
                                    </div>
                                    <div class="right">
                                        <div><b>
                                            <?php echo $data['first_name'].' '.$data['last_name'];?> locked 
                                            its profile
                                        </b></div>
                                        <div>Only 
                                        its following people will be able to see this profile's general detials.</div>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endif; ?>

                        <!-- company details -->
                    <?php if($data['user']->specialized_actor_type == 'Company' ): ?>
                    <!-- general details -->
                    <?php if(!$data['is_pri_gen_details_locked'] || $data['user']->id == $_SESSION['user_id']): ?>
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
                        <?php else: ?>
                                <!-- locked general details -->
                                <div class="division">
                                    <div class="division-name">General details</div>
                                    <div></div>
                                </div>
                                <div class="user-locked-profile">
                                    <div class="left">
                                        <img src="<?php echo URLROOT.'/imgs/pages/settings/shield-icon.png'?>" alt="">
                                    </div>
                                    <div class="right">
                                        <div><b>
                                            <?php echo $data['first_name'].' '.$data['last_name'];?> locked 
                                            its profile
                                        </b></div>
                                        <div>Only its
                                        following people will be able to see this profile's general detials.</div>
                                    </div>
                                </div>
                        <?php endif; ?>
                    <?php endif; ?>

                        <!-- social platform details -->
                        <?php if(!$data['is_pri_soc_details_locked'] || $data['user']->id == $_SESSION['user_id']): ?>
                            <?php if($data['isSocialDataExist']):?>
                                <div class="division">
                                    <div class="division-name">Social platform details</div>
                                    <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                    <div class="editable">
                                        <a href="<?php echo URLROOT.'/C_O_Settings/updateSocialProfileDetails/'.$_SESSION['user_id']; ?>"><button class="btn1-small">Edit</button></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <div class="beginner-detials">
                                    <?php if($data['socialData']->facebook != NULL) :?>
                                    <div class="Facebook">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/facebook-icon.png'; ?>" alt="">Facebook</div>
                                        <div class="text"><?php echo $data['socialData']->facebook;?></div>                                        
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->linkedin != NULL) :?>
                                    <div class="LinkedIn">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/linkedin-icon.png'; ?>" alt="">LinkedIn</div>
                                        <div class="text"><?php echo $data['socialData']->linkedin;?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->twitter != NULL) :?>
                                    <div class="Twitter">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/twitter-icon.png'; ?>" alt="">Twitter</div>
                                        <div class="text"><?php echo $data['socialData']->twitter;?></div>                                        
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->instagram != NULL) :?>
                                    <div class="Instagram">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/instagram-icon.png'; ?>" alt="">Instagram</div>
                                        <div class="text"><?php echo $data['socialData']->instagram;?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->medium != NULL) :?>
                                    <div class="Medium">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/medium-icon.png'; ?>" alt="">Medium</div>
                                        <div class="text"><?php echo $data['socialData']->medium;?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->printerest != NULL) :?>
                                    <div class="Printerest">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/printerest-icon.png'; ?>" alt="">Printerest</div>
                                        <div class="text"><?php echo $data['socialData']->printerest;?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->youtube != NULL) :?>
                                    <div class="Youtube">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/youtube-icon.png'; ?>" alt="">Youtube</div>
                                        <div class="text"><?php echo $data['socialData']->youtube;?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($data['socialData']->reddit != NULL) :?>
                                    <div class="Reddit">
                                        <div class="title"><img src="<?php echo URLROOT.'/imgs/profiles/socialIcons/reddit-icon.png'; ?>" alt="">Reddit</div>
                                        <div class="text"><?php echo $data['socialData']->reddit;?></div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <?php if($data['user']->id == $_SESSION['user_id']): ?>
                                <div class="division">
                                    <div class="division-name">Social platform details</div>
                                </div>
                                <div class="social-detials-idle">
                                    <div class="message">
                                        <div class="text">Enter your social profile details here</div>     
                                        <a href="<?php echo URLROOT.'/C_O_Settings/addSocialProfileDetails/'.$_SESSION['user_id']; ?>"><button class="btn2">ADD</button></a>        
                                    </div>
                                </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        <?php else: ?>
                                <!-- locked social details -->
                                <div class="division">
                                    <div class="division-name">Social platform details</div>
                                    <div></div>
                                </div>
                                <div class="user-locked-profile">
                                    <div class="left">
                                        <img src="<?php echo URLROOT.'/imgs/pages/settings/shield-icon.png'?>" alt="">
                                    </div>
                                    <div class="right">
                                        <div><b>
                                            <?php echo $data['first_name'].' '.$data['last_name'];?> locked 
                                            its profile
                                        </b></div>
                                        <div>Only its
                                        following people will be able to see this profile's social detials.</div>
                                    </div>
                                </div>
                        <?php endif; ?>
                            </div>
                        </div>

                        <br><hr>

                        <!-- posts -->
                        <!-- <?php if($data['user']->specialized_actor_type == 'University' ): ?>
                            <div class="division">
                                    <div class="division-name">Course posts</div>
                            </div>
                            <div class="card-flex-box"> -->
                                <!-- COURSE POST -->
                                <!-- <?php foreach($data['posts'] as $post): ?>
                                    <?php if($post->type == "coursepost"): ?>
                                        <a href="<?php echo URLROOT; ?>/Posts_C_O_CoursePosts/show/<?php echo $post->post_id; ?>" class="card-link">
                                        <div class="coursepost">
                                            <?php if($post->image != null):?>
                                            <div class="pic">
                                                <img src="<?php echo URLROOT.'/imgs/posts/courseposts/'.$post->image; ?>" alt="">
                                            </div>
                                            <?php endif; ?>
                                            <div class="coursepost-body">
                                                <div class="user-pic">
                                                    <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                                                </div>
                                                <div class="postedat">Posted At: <?php echo convertedToReadableTimeFormat($post->postCreated); ?></div>
                                                <div class="title"><?php echo $post->courseName; ?></div>
                                                <div class="degree"><?php echo $post->provide_degree; ?></div>
                                                <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                                            <div class="price"><?php echo $post->course_fee.' LKR'; ?></div>
                                            </div>
                                            <div class="coursepost-stats">
                                                <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                                <div class="ups-count"><?php echo $post->ups; ?></div>
                                                <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                                <div class="downs-count"><?php echo $post->downs; ?></div>
                                                <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                                <div class="comments-count"><?php echo $post->comment_count; ?></div>
                                                <div class="rate"><?php echo countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5); ?></div>
                                                <?php 
                                                    $rate = countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5);

                                                    for($i=0; $i <ceil($rate); $i++) {
                                                        echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                    }

                                                    for($i=0; $i <5 - ceil($rate); $i++) {
                                                        echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                    }
                                                    
                                                    ?>
                                                <div class="reviews">REVIEWS (<?php echo $post->review_count; ?>)</div>
                                            </div>          
                                        </div>
                                        </a>
                                        <br>
                                        <br>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?> -->

                        <!-- <?php if($data['user']->specialized_actor_type == 'Company' ): ?>     
                            <div class="division">
                                    <div class="division-name">Job Ads</div>
                            </div>                       
                            <div class="card-flex-box"> -->
                             <!-- JOB POST -->
                            <!-- <?php foreach($data['posts'] as $post): ?>
                                <?php $exp_date = date('Y-m-d', strtotime($post->paid_date. ' + 1 months')) ?>
                                <?php if($post->type == "jobpost" ): ?>
                                    <a href="<?php echo URLROOT; ?>/Posts_C_O_JobAds/show/<?php echo $post->post_id; ?>" class="card-link">
                                    <div class="advertisement">
                                        <?php if($post->image != null):?>
                                        <div class="pic">
                                            <img src="<?php echo URLROOT.'/imgs/posts/jobads/'.$post->image; ?>" alt="">
                                        </div>
                                        <?php endif; ?>
                                        <div class="advertisement-body">
                                            <div class="user-pic">
                                                <img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($post->actor_type).'/'.$post->profile_image;?>" alt="">
                                            </div>
                                            <div class="postedat">
                                                <?php if(date("Y-m-d") > $exp_date){ echo "<font color=red>(Expired)</font>";} ?>
                                                Posted At: <?php echo convertedToReadableTimeFormat($post->postCreated); ?>
                                            </div>
                                            <div class="title"><?php echo $post->jobName; ?></div>
                                            <div class="postedby"><?php echo $post->first_name.' '.$post->last_name; ?></div>
                                            <div class="poles">
                                                <div class="pole-prg-bar">
                                                    <progress max="100" value="<?php if($post->capacity != 0){ echo ($post->applied / $post->capacity) * 100;} else {echo 0;} ?>" id="prgBar"></progress>
                                                    <div class="percentage" id="percentage"><?php if($post->capacity != 0){ echo number_format(($post->applied / $post->capacity) *100, 1, '.', '');} else { echo 0;} ?>%</div>
                                            </div>
                                            <div class="text">
                                                <div class="applied" id="applied"><?php echo $post->applied; ?> Applied</div>
                                                <div class="capacity"> of <?php echo $post->capacity; ?> Capacity</div>
                                            </div>
                                        </div>
                                        </div>
                                        <div class="advertisement-stats">
                                            <div class="ups"><img src="<?php echo URLROOT.'/imgs/components/posts/up-icon.png'; ?>" alt=""></div>
                                            <div class="ups-count"><?php echo $post->ups; ?></div>
                                            <div class="downs"><img src="<?php echo URLROOT.'/imgs/components/posts/down-icon.png'; ?>" alt=""></div>
                                            <div class="downs-count"><?php echo $post->downs; ?></div>
                                            <div class="comments"><img src="<?php echo URLROOT.'/imgs/components/posts/comment-icon.png'; ?>" alt=""></div>
                                            <div class="comments-count"><?php echo $post->comment_count; ?></div>
                                            <div class="rate"><?php echo countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5); ?></div>
                                            <?php 
                                                $rate = countRate($post->review_count, $post->rate1, $post->rate2, $post->rate3, $post->rate4, $post->rate5);

                                                for($i=0; $i <ceil($rate); $i++) {
                                                    echo '<div class="rate-star active"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                }

                                                for($i=0; $i <5 - ceil($rate); $i++) {
                                                    echo '<div class="rate-star"><img src="'.URLROOT.'/imgs/components/posts/star-icon.png"></div>';
                                                }
                                                
                                                ?>
                                            <div class="reviews">REVIEWS (<?php echo $post->review_count; ?>)</div>
                                        </div>          
                                    </div>
                                    </a>
                                    <br>
                                    <br>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </div>
                        <?php endif; ?> -->
                        

                        <!-- REPORT PROFILE (styles at css/com/profile/student-profile maybe change it later) -->                        
                        <?php if($data['user']->id != $_SESSION['user_id']): ?>
                        <br><hr>
                        <div class="division">
                            <div class="division-name">Report  profile</div>
                        </div>
                            <?php if(!$data['is_already_reported']): ?>
                            <div class="report-details">
                                <p>If you suspect this profile is a fake or bogus one please report the profile.
                                Please note that if you send a report, it will be analyzed by <b>Whiz.</b></p>
                                <br>                      
                                <!-- request goes as Commons/report/reportedId/reporterId -->
                                <form action="<?php echo URLROOT; ?>/Commons/report/<?php echo $data['user']->id; ?>/<?php echo $_SESSION['user_id']?>" method="post">
                                    <input type="text" name="report" id="report" placeholder="Give us a reason..." required>
                                    <br>
                                    <input type="submit" value="Report Profile" class="btn4">
                                </form>
                            </div>
                            <?php else: ?>
                                <div class="report-details">
                                    <b class="user-settings-red-text">You have already reported this account. We are processing your report which may take few days.</b>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>

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