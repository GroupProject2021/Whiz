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
                                
                                <form method="post">
                                <div class="post-footer">
                                    <button id="like">
                                        <div class="post-footer-likebtn"><img src="<?php echo URLROOT;?>/imgs/like.png" alt=""></div>
                                        <div class="post-footer-text" id="like-count"><?php echo $data['ups']; ?></div>
                                    </button>
                                    <button id="dislike">
                                        <div class="post-footer-dislikebtn"><img src="<?php echo URLROOT;?>/imgs/like.png" alt=""></div>
                                        <div class="post-footer-text" id="dislike-count"><?php echo $data['downs']; ?></div>
                                    </button>
                                    <div class="post-footer-input"><input type="text" placeholder="Comment..." name="post-comment" id="post-comment" class="post-comment"></div>
                                    <button id="comment">
                                        <div class="post-footer-commentbtn"><img src="<?php echo URLROOT;?>/imgs/comment.png" alt=""></div>
                                    </button>
                                    <button>
                                        <div class="post-footer-sharebtn"><img src="<?php echo URLROOT;?>/imgs/share.png" alt=""></div>
                                        <div class="post-footer-text">Share</div>
                                    </button>
                                </div>
                                </form>
                            </div>
                            <br>

                            <!-- <div class="comment">
                                <div class="comment-header">
                                    <div class="comment-header-icon"><img src="<?php echo URLROOT;?>/imgs/prof.jpg" alt=""></div>
                                    <div class="comment-header-actortypeicon"><img src="<?php echo URLROOT;?>/imgs/prof.jpg" alt=""></div>
                                    <div class="comment-header-postedby">xxx</div>
                                    <div class="comment-header-verified"><img src="<?php echo URLROOT;?>/imgs/verified.png" alt=""></div>
                                    <div class="comment-header-postedtime">xxx</div>
                                </div>
                                <div class="comment-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint voluptas, voluptatem modi
                                     cupiditate quam quod nam repellendus aspernatu
                                    r possimus commodi, suscipit in tenetur praesentium quia ab facere cum doloribus? Aperiam!
                                </div>
                                <div class="comment-footer">
                                    <button>
                                        <div class="comment-footer-likebtn"><img src="<?php echo URLROOT;?>/imgs/up-icon.png" alt=""></div>
                                        <div class="comment-footer-text">likes</div>
                                    </button>
                                    <button>
                                        <div class="comment-footer-dislikebtn"><img src="<?php echo URLROOT;?>/imgs/down-icon.png" alt=""></div>
                                        <div class="comment-footer-text">dislikes</div>
                                    </button>
                                    <button>
                                        <div class="comment-footer-replybtn"><img src="<?php echo URLROOT;?>/imgs/reply-icon.png" alt=""></div>
                                        <div class="comment-footer-text">reply</div>
                                    </button>
                                </div>
                            </div> -->
                            
                            <div id="results"></div>

                        </div>

                        <div id="msg"></div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        <script>
            $(document).ready(function() {
                // for likes
                $('#like').click(function(event) {
                    event.preventDefault();

                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/incUp/<?php echo $_SESSION['current_viewing_post_id']?>",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $('#like-count').text(strMessage);
                    }
                })})

                // for dislikes
                $('#dislike').click(function(event) {
                    event.preventDefault();

                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/incDown/<?php echo $_SESSION['current_viewing_post_id']?>",
                    method: "post",
                    data: $('form').serialize(),
                    dataType: "text",
                    success: function(strMessage) {
                        $('#dislike-count').text(strMessage);
                    }
                })})

                // for comments insert
                $('#comment').click(function(event) {
                    event.preventDefault();

                    // submit only if input area is not empty
                    if(!($('.post-comment').val() == 0)) {
                        $.ajax({
                            url: "<?php echo URLROOT;?>/posts/comment/<?php echo $_SESSION['current_viewing_post_id']?>",
                            method: "post",
                            data: $('form').serialize(),
                            dataType: "text",
                            success: function(strMessage) {
                                $('#msg').text(strMessage);
                            }
                        })                

                        // COMMENT VALIDATIONS MUST BE ADDED

                        $.ajax({
                            url: "<?php echo URLROOT;?>/posts/showComments/<?php echo $_SESSION['current_viewing_post_id']?>",
                            dataType: "html",
                            success: function(results) {
                                $('#results').html(results);
                            }
                        })                        
                    }
                })

                // onload show comments
                $.ajax({
                    url: "<?php echo URLROOT;?>/posts/showComments/<?php echo $_SESSION['current_viewing_post_id']?>",
                    dataType: "html",
                    success: function(results) {
                        $('#results').html(results);
                    }
                })
            })
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>