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
                        <h1>Notices > View</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                    <?php flash('post_message'); ?>

                    <a href="<?php echo URLROOT;?>/C_S_Stu_To_Notices/index"><button class="btn8 post-back">Back</button></a>
                                                                          
                            <div class="post">
                                <?php if($data['post']->image != null):?>
                                    <div class="post-header">
                                        <img src="<?php echo URLROOT.'/imgs/posts/notices/'.$data['post']->image; ?>" alt="">
                                    </div>  
                                <?php endif; ?>
                                <div class="post-details">
                                    <div class="profpic"><a class="post-link" href="<?php echo URLROOT.'/C_O_Settings/settings/'.$data['user']->id.'/'.$_SESSION['user_id'];?>"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['user']->actor_type).'/'.$data['user']->profile_image;?>" alt=""></a></div>
                                    <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($data['user']->actor_type).'-'.getActorSpecializedTypeForIcons($data['user']->actor_type, $data['user']->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                    <div class="postedby"><a class="post-link" href="<?php echo URLROOT.'/C_O_Settings/settings/'.$data['user']->id.'/'.$_SESSION['user_id'];?>"><?php echo $data['user']->first_name.' '.$data['user']->last_name; ?></a></div>
                                    <?php if($data['user']->status == 'verified'): ?>
                                        <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                    <?php endif; ?>
                                    <div class="postedat">
                                        <?php $exp_date = date('Y-m-d', strtotime($data['post']->paid_date. ' + 1 months')) ?>
                                        <?php if(date("Y-m-d") > $exp_date){ echo "<font color=red>(Expired)</font>";} ?>
                                        <?php echo convertedToReadableTimeFormat($data['post']->postCreated); ?></div>
                                    <!-- for admin purposes only -->
                                    <!-- edit delete options -->
                                    <?php if($_SESSION['actor_type'] == "Admin"): ?>    
                                        <?php if(date("Y-m-d") <= $exp_date):?>   
                                        <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/Posts_C_O_IntakeNotices/edit/<?php echo $data['post']->post_id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                        <?php endif; ?>
                                            <form action="<?php echo URLROOT; ?>/Posts_C_O_IntakeNotices/delete/<?php echo $data['post']->post_id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="post-body">
                                    <div class="title"><?php echo $data['post']->noticeName; ?></div>
                                    <div class="postedby"><?php echo $data['post']->noticeContent; ?></div>
                                </div>
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
                                    <button id="share">
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/components/posts/share-icon.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                                </form>
                            </div>
                            <br>

                            <!-- COMMENT THREAD - AJAX REQUESTS IN REAL-TIME -->
                            <div id="results"></div>
                            
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
            var CURRENT_POST= '<?php echo $_SESSION["current_viewing_post_id"]?>';
        </script>
        
        <!-- javacript for like dislike systen -->    
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/postUpDownVoteSystem/likeDislikeSystem.js"></script>

        <!-- javascript for comment system -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/commentSystem/commentSystem.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
