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
                            <a href="<?php echo URLROOT; ?>/CommunityThreads/index">Community </a>
                            >
                            View thread
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <a href="<?php echo URLROOT; ?>/CommunityThreads/index"><button class="btn8">Back</button></a>

                        <br>
                        
                        <div class="thread">
                                <div class="thread-details">
                                            <div class="profpic"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$data['thread']->user_id.'/'.$_SESSION['user_id'];?>"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($data['thread']->actor_type).'/'.$data['thread']->profile_image;?>" alt=""></a></div>
                                            <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($data['thread']->actor_type).'-'.getActorSpecializedTypeForIcons($data['thread']->actor_type, $data['thread']->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                            <div class="postedby"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$data['thread']->user_id.'/'.$_SESSION['user_id'];?>"><?php echo $data['thread']->first_name.' '.$data['thread']->last_name; ?></a></div>
                                            <?php if($data['thread']->status == 'verified'): ?>
                                            <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                            <?php endif; ?>
                                            <?php if($data['thread']->user_id == $_SESSION['user_id']): ?>    
                                                <div class="post-control-buttons">                                        
                                                    <a href="<?php echo URLROOT?>/CommunityThreads/edit/<?php echo $data['thread']->thread_id;?>">
                                                        <button class="post-header-editbtn">Edit</button>
                                                    </a>
                                                    <form action="<?php echo URLROOT?>/CommunityThreads/delete/<?php echo $data['thread']->thread_id;?>" method="post">
                                                        <input type="submit" value="Delete" class="post-header-deletebtn">
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                            <div class="postedat"><?php echo convertedToReadableTimeFormat($data['thread']->created_at); ?></div>
                                </div>
                                <div class="thread-header"><?php echo $data['thread']->title; ?></div>
                                <div class="thread-body">
                                    <?php echo $data['thread']->body; ?>
                                </div>
                                <div class="thread-footer">
                                    <div class="views">
                                        <img src="<?php echo URLROOT.'/imgs/view-icon.png'?>" alt="">
                                    </div>
                                    <div class="views-amount"><?php echo $data['thread']->views; ?> Views</div>
                                </div>
                                <form method="post">
                                <div class="thread-comment-area">
                                    <div class="comment-text">
                                        <input type="text" name="thread-comment" id="thread-comment" class="thread-comment" placeholder="Add a comment...">
                                    </div>
                                    <div class="comment-btn">
                                        <input type="submit" value="Comment" id="thread-comment-btn" class="thread-comment-btn">
                                    </div>
                                </div>
                                </form>
                            </div>
                            <br>

                            <h1>Comments</h1>
                            <!-- test msg for comment results - CHECK FOR COMMENT INSERTING ONLY -->
                            <!-- <div id="msg"></div> -->

                            <!-- COMMENT THREAD - AJAX REQUESTS IN REAL-TIME -->
                            <div id="results"></div>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

        <!-- common settings js -->
        <script type="text/JavaScript">
            var URLROOT = '<?php echo URLROOT; ?>';            
            var CURRENT_POST= '<?php echo $data['thread']->thread_id; ?>';
        </script>

        <!-- javascript for comment system -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/commentSystem/communityCommentSystem.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>