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
                        <?php flash('post_message'); ?>
                        <!-- <?php foreach($data['posts'] as $post): ?>
                            <?php if($post->id == $_SESSION['user_id']): ?>
                                <div class="list">
                                    <div class="name">
                                        <?php echo $post->title; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?> -->
                        <div>
                        <table class="gov-course-table">
                            <tr>
                                <th>    </th>
                                <th>Student Name</th>
                                <!-- <th colspan="2">Offered university</th> -->
                                <th colspan="2">Enrolled at</th>
                                <!-- <th>Intake</th> -->
                                <th></th>
                            </tr>
                            <tr><td colspan="3"><hr></td></tr>
                            
                            <?php for($test = 0; $test < 10; $test++): ?>
                                <tr>
                                    <td class="gov-course-uniicon"><img src="<?php echo URLROOT.'/imgs/enrol.jpg'?>" alt=""></td>
                                    <td class="gov-course-name">Pabasara </td>
                                    <td class="gov-course-intake">2021-10-02 09.52.03</td>
                                </tr>
                                <tr><td colspan="4"><hr></td></tr>
                            <?php endfor; ?>
                            
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