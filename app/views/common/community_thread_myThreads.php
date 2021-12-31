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
                            <a href="<?php echo URLROOT; ?>/CommunityThreads/index">Community</a>
                            >
                            <a href="<?php echo URLROOT; ?>/CommunityThreads/myThreads/<?php echo $_SESSION['user_id']; ?>">My threads</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <a href="<?php echo URLROOT; ?>/CommunityThreads/add"><button class="btn1">Create Thread</button></a>
                        <div>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn3">My threads</button></a>
                        </div>

                        <br>
                        <?php echo flash('thread_msg'); ?>

                        <?php foreach($data['threads'] as $thread): ?>
                            <div class="thread">
                                <div class="thread-details">
                                            <div class="profpic"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$thread->user_id.'/'.$_SESSION['user_id'];?>"><img src="<?php echo URLROOT.'/profileimages/'.getActorTypeForIcons($thread->actor_type).'/'.$thread->profile_image;?>" alt=""></a></div>
                                            <div class="profpic-sub"><img src="<?php echo URLROOT.'/imgs/actorTypeIcons/'.getActorTypeForIcons($thread->actor_type).'-'.getActorSpecializedTypeForIcons($thread->actor_type, $thread->specialized_actor_type).'-icon.png'; ?>" alt=""></div>
                                            <div class="postedby"><a class="post-link" href="<?php echo URLROOT.'/C_S_Settings/settings/'.$thread->user_id.'/'.$_SESSION['user_id'];?>"><?php echo $thread->first_name.' '.$thread->last_name; ?></a></div>
                                            <?php if($thread->status == 'verified'): ?>
                                            <div class="verified"><img src="<?php echo URLROOT.'/imgs/verified.png'; ?>" alt=""></div>
                                            <?php endif; ?>
                                            <?php if($thread->user_id == $_SESSION['user_id']): ?>    
                                                <div class="post-control-buttons">                                        
                                                    <a href="<?php echo URLROOT?>/CommunityThreads/edit/<?php echo $thread->thread_id;?>">
                                                        <button class="post-header-editbtn">Edit</button>
                                                    </a>
                                                    <form action="<?php echo URLROOT?>/CommunityThreads/delete/<?php echo $thread->thread_id;?>" method="post">
                                                        <input type="submit" value="Delete" class="post-header-deletebtn">
                                                    </form>
                                                </div>
                                            <?php endif; ?>
                                            <div class="postedat"><?php echo convertedToReadableTimeFormat($thread->created_at); ?></div>
                                </div>
                                <a href="<?php echo URLROOT.'/CommunityThreads/show/'.$thread->thread_id; ?>" class="card-link">
                                <div class="thread-header"><?php echo $thread->title; ?></div>
                                <div class="thread-body">
                                    <?php echo $thread->body; ?>
                                </div>
                                <div class="thread-footer">
                                    <div class="views">
                                        <img src="<?php echo URLROOT.'/imgs/view-icon.png'?>" alt="">
                                    </div>
                                    <div class="views-amount"><?php echo $thread->views; ?> Views</div>
                                </div>
                                </a>
                            </div>
                            <br>
                        <?php endforeach; ?>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>