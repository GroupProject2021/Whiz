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
                        <h1>Vaccants</h1>
                    </div>
                    <br>
                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <table class="gov-course-table">
                            <tr>
                                
                                <th>Vaccancy</th>
                                
                                <th colspan="2">Applicants<br>Count</th>
                                
                                <th></th>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            <?php foreach($data['posts'] as $post): ?>
                                <?php if($post->userId == $_SESSION['user_id']): ?>
                            <tr>
                                <td class="gov-course-name"><?php echo $post->title; ?></td>
                               
                                <td class="gov-course-intake"><?php echo $post->applied;?>/<?php echo $post->capacity;?></td>
                                
                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_O_C_Cvs/cvList/'.$post->postId;?>"><button class="btn3">View more</button></a></td>
                                </tr>
                                <tr><td colspan="4"><hr></td></tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </table>
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