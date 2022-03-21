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
                        <h1>Enrolment List</h1>
                    </div>
                    <br>
                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('post_message'); ?><?php print_r($data['link']); ?>
                        
                        <div>
                        <table class="gov-course-table">
                            <tr>
                                <th>Post</th>
                                
                                <th colspan="2">Enrolled Student<br>Count</th>
                                
                                <th></th>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <?php foreach($data['posts'] as $post): ?>
                                <?php if($post->userId == $_SESSION['user_id']): ?>
                            <tr>
                                <td class="gov-course-name"><?php echo $post->title; ?></td>
                               
                                <td class="gov-course-intake"><?php echo $post->applied;?>/<?php echo $post->capacity;?></td>
                                
                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_M_Enrolment_List/enrolStudentList/'.$post->postId;?>"><button class="btn3">View more</button></a></td>

                                <!-- <td>
                                    <?php if($data['link'] != Null):?>
                                        <a href="<?php echo URLROOT.'/C_M_Enrolment_List/viewlink/'.$post->postId; ?>"><input class="btn1 post-back" type="button" value="Session Link"></a>
                                    
                                    <?php else: ?>
                                        <a href="<?php echo URLROOT.'/C_M_Enrolment_List/addlink/'.$post->postId; ?>"><input class="btn1 post-back" type="button" value="Sessionadd Link"></a>

                                    <?php endif; ?>
                                </td> -->
                                </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
                        <hr>
                    </div>
                    </div>
                    
                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>