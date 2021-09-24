<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sidebar.php'?>

        <div class="main-content">
            <header>                
                <div class="menu-toggle">
                    <button type="button" class="sidebar-handle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </button>
                </div>
                
                <!-- TOP NAVIGATION BAR -->
                <div class="topnav">
                    <?php require APPROOT.'/views/inc/components/topnav.php'?>
                </div>
            </header>

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>Posts</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/posts/index"><button class="btn8">Back</button></a>
                        <br>
                    
                        <!-- I added this later. So now it will only show the posts that are related to the user. Remove if statement and it will show all the posts -->
                            <div class="post">
                                <div class="post-header">
                                        <div class="post-header-icon"><img src="<?php echo URLROOT;?>/imgs/prof.jpg" alt=""></div>
                                        <div class="post-header-postedby"><?php echo $data['user']->name; ?></div>
                                        <div class="post-header-verified"><img src="<?php echo URLROOT;?>/imgs/verified.png" alt=""></div>
                                        <div class="post-header-postedtime"><?php echo $data['post']->created_at; ?></div>

                                        <?php if($data['post']->user_id == $_SESSION['user_id']): ?>    
                                            <div class="post-control-buttons">                                        
                                            <a href="<?php echo URLROOT?>/posts/edit/<?php echo $data['post']->id;?>">
                                                <button class="post-header-editbtn">Edit</button>
                                            </a>
                                            <form action="<?php echo URLROOT; ?>/posts/delete/<?php echo $data['post']->id; ?>" method="post">
                                                <input type="submit" value="Delete" class="post-header-deletebtn">
                                            </form>
                                            </div>
                                        <?php endif; ?>
                                </div>
                                <div class="post-body">
                                    <div class="post-body-title"><?php echo $data['post']->title; ?></div>
                                    <div class="post-body-content">
                                        <?php echo $data['post']->body; ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="post-footer">
                                    <button>
                                        <div class="post-footer-likebtn"><img src="<?php echo URLROOT;?>/imgs/like.png" alt=""></div>
                                        <div class="post-footer-text">Like</div>
                                    </button>
                                    <button>
                                        <div class="post-footer-dislikebtn"><img src="<?php echo URLROOT;?>/imgs/like.png" alt=""></div>
                                        <div class="post-footer-text">Disike</div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button>
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button>
                                    <button>
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                            </div>
                            <br>

                        </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>