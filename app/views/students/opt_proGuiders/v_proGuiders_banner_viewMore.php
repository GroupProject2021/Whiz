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
                        <h1>
                            <a href="<?php echo URLROOT; ?>/C_S_Stu_To_ProfessionalGuider/index">Professional guiders</a>
                            >
                            View
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    <?php flash('post_message'); ?>

                    <a href="<?php echo URLROOT;?>/C_S_Stu_To_ProfessionalGuider/index"><button class="btn8 post-back">Back</button></a>
                            <div class="center-box">                                 
                            <div class="post">
                                <?php if($data['post']->image != null):?>
                                    <div class="post-header">
                                        <img src="<?php echo URLROOT.'/imgs/posts/banners/'.$data['post']->image; ?>" alt="">
                                    </div>  
                                <?php endif; ?>
                                <div class="post-details">
                                    <div class="profpic"><a class="post-link" href="<?php echo URLROOT.'/C_M_Settings/settings/'.$data['user']->id.'/'.$_SESSION['user_id'];?>"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['user']->actor_type).'/'.$data['user']->profile_image;?>" alt=""></a></div>
                                    <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($data['user']->actor_type).'-'.getActorSpecializedTypeForIcons($data['user']->actor_type, $data['user']->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                    <div class="postedby"><a class="post-link" href="<?php echo URLROOT.'/C_M_Settings/settings/'.$data['user']->id.'/'.$_SESSION['user_id'];?>"><?php echo $data['user']->first_name.' '.$data['user']->last_name; ?></a></div>
                                    <?php if($data['user']->status == 'verified'): ?>
                                    <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                    <?php endif; ?>
                                    <?php if($data['post']->userId == $_SESSION['user_id']): ?>    
                                        <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/posts/edit/<?php echo $data['post']->post_id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->post_id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                     <?php endif; ?>
                                    <div class="postedat"><?php echo convertedToReadableTimeFormat($data['post']->postCreated); ?></div>
                                    <!-- for admin purposes only -->
                                    <!-- edit delete options -->
                                    <?php if($_SESSION['actor_type'] == "Admin"): ?>    
                                        <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/Posts_C_M_Banners/edit/<?php echo $data['post']->post_id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/Posts_C_M_Banners/delete/<?php echo $data['post']->post_id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                     <?php endif; ?>
                                </div>
                                <div class="post-body">
                                    <div class="title"><?php echo $data['post']->title; ?></div>
                                    <div class="postedby"><?php echo $data['post']->body; ?></div>
                                </div>
                                <?php if($_SESSION['actor_type'] == "Student"): ?>
                                <div class="poles">
                                   <div class="pole-prg-bar bar2">
                                        <progress max="100" value="<?php if($data['post']->capacity != 0){ echo ($data['post']->applied / $data['post']->capacity) * 100;} else {echo 0;} ?>" id="prgBar"></progress>
                                   </div>
                                   <div class="text">
                                       <div class="applied" id="applied"><?php echo $data['post']->applied; ?> Applied</div>
                                       <div class="capacity"> of <?php echo $data['post']->capacity; ?> Capacity</div>
                                   </div>
                                   <?php if($data['self_enroll_apply_interaction'] == 'applied'):?>
                                        <div class="interation applied">                                    
                                   <?php else: ?>
                                        <div class="interation"> 
                                   <?php endif; ?>
                                       <button id="applyBtn">ENROLL</button>
                                   </div>
                               </div>
                               <?php endif; ?>    
                                <form method="post">
                                <div class="post-footer">
                                    <button id="like" >
                                        <?php if($data['self_interaction'] == 'liked'):?>
                                            <div class="post-footer-likebtn active" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/up-icon.png" alt=""></div>
                                        <?php else: ?>
                                            <div class="post-footer-likebtn" id="likeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/up-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="like-count"><?php echo $data['ups']; ?></div>
                                    </button>
                                    <button id="dislike">
                                        <?php if($data['self_interaction'] == 'disliked'):?>
                                            <div class="post-footer-dislikebtn active" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/down-icon.png" alt=""></div>                                            
                                        <?php else: ?>
                                            <div class="post-footer-dislikebtn" id="dislikeBtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/down-icon.png" alt=""></div>
                                        <?php endif; ?>
                                        <div class="post-footer-text" id="dislike-count"><?php echo $data['downs']; ?></div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button id="comment">
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/comment-icon.png" alt=""></div>
                                    </button>
                                </div>
                                </form>
                            </div>
                            <!-- SESSION LINK -->
                            <?php if(!empty($data['session_link'])):?>
                            <?php if($data['self_enroll_apply_interaction'] == 'applied'):?>
                            <br>
                            <div class="sessionlink-container">
                                <div class="title">Session Link</div>
                                <div class="body">Join with the session via <a href="<?php echo $data['session_link']->body; ?>" target="_blank"><?php echo $data['session_link']->body; ?></a></div>
                                <div class="schedule">
                                    <div class="date"><b>Date: </b><?php echo $data['session_link']->date; ?></div>
                                    <div class="time"><b>Time: </b><?php echo $data['session_link']->time; ?></div>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>

                            <br>
                            <!-- REVIEW RATING SYSTEM -->
                            <div class="ratingSystem">
                                <?php require APPROOT.'/views/inc/components/ratingSystem/ratingSystem.php'?>
                            </div>

                            <br>

                            <!-- COMMENT THREAD - AJAX REQUESTS IN REAL-TIME -->
                            <div id="results"></div>
                            
                            </div>
                        </div>

                        <!-- test msg for comment results - CHECK FOR COMMENT INSERTING ONLY -->
                        <!-- <div id="msg"></div> -->

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';            
            var CURRENT_POST= '<?php echo $_SESSION["current_viewing_post_id"]; ?>';
            var INC_DEC_AMOUNT = '<?php echo 100 / $data["post"]->capacity; ?>';
        </script>
        
        <!-- javacript for like dislike systen -->    
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/postUpDownVoteSystem/likeDislikeSystem.js"></script>

        <!-- javascript for comment system -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/commentSystem/commentSystem.js"></script>

        <!-- javascript pro guider enrollement system -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/opt_proGuiders/proGuiderEnroll.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
