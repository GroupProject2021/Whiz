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
                            <a href="<?php echo URLROOT; ?>/CommunityThreads/add">Create thread</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <a href="<?php echo URLROOT; ?>/CommunityThreads/index"><button class="btn8">Back</button></a>
                        <div>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govCourseList"><button class="btn3">My threads</button></a>
                            <a href="<?php echo URLROOT; ?>/C_S_Course/govUniversityList"><button class="btn1">All threads</button></a>
                        </div>

                        <br>
                        <form action="<?php echo URLROOT; ?>/CommunityThreads/add" method="post">
                            <div class="thread-creator">
                                <div class="thread-creator-title">
                                    <input type="text" name="title" id="title" autocomplete="off" placeholder="Title" value="<?php echo $data['title']; ?>">
                                </div>
                                <hr>
                                <div class="thread-creator-content">
                                    <textarea name="body" id="body" cols="30" rows="10" placeholder="Content"><?php echo $data['body']; ?></textarea>
                                </div>
                                <br>
                                <hr>
                                <button type="submit" class="thread-creator-submit">Post</button>
                            </div>
                        </form>
                        

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>