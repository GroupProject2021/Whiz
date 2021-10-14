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
            <?php if(isset($_SESSION['user_id'])) : ?>
                <?php if($_SESSION['specialized_actor_type'] == 'Professional Guider'): ?>
                    <!-- Professional guider -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Complaints</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">
                            <?php flash('post_message'); ?>
                            <!-- <br> -->
                                <a href="<?php echo URLROOT; ?>/C_M_Complaints/add"><button class="btn1">New Complaint</button> </a>
                                <br>

                                <div>
                                    <table class="gov-course-table">
                                    <tr>
                                        <th>    </th>
                                        <th>Complaint Title</th>
                                        <th colspan="2">Description</th>
                                        <th colspan="2">Date</th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <tr><td colspan="3"><hr></td></tr>
                            
                                    <?php foreach($data['posts'] as $post): ?>
                                        <?php if($post->userId == $_SESSION['user_id']): ?>
                                            <tr>
                                                <!-- <td class="gov-course-index"><?php echo $post->id; ?></td> -->
                                                <td>    </td>
                                                <td class="gov-course-name" ><?php echo $post->title; ?></td>
                                                <td class="gov-course-name" colspan="2"><?php echo $post->content; ?></td>
                                                <td class="gov-course-name"><?php echo $post->created_at; ?></td>
                                                <!-- <td class="gov-course-uniicon"><img src="<?php echo URLROOT.'/imgs/prof.jpg'?>" alt=""></td> -->
                                                <!-- <td class="gov-course-uniname">UCSC</td> -->
                                                <!-- <td class="gov-course-duration">4 Years</td> -->
                                                <!-- <td class="gov-course-intake">200</td> -->
                                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_M_Complaints/edit/'.$post->postId;?>"><button class="btn5">Edit</button></a></td>
                                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_M_Complaints/delete/'.$post->postId;?>"><button class="btn4">Delete</button></a></td>
                                            </tr>
                                            <tr><td colspan="4"><hr></td></tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            
                                    </table>
                                    <hr>
                                </div>
                        </div>
                    </div>
                <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
                    <!-- Teacher -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Complaints</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel-single">
                            <?php flash('post_message'); ?>
                            <!-- <br> -->
                                <a href="<?php echo URLROOT; ?>/C_M_Complaints/add"><button class="btn1">New Complaint</button> </a>
                                <br>

                                <div>
                                    <table class="gov-course-table">
                                    <tr>
                                        <th>    </th>
                                        <th>Complaint Title</th>
                                        <th colspan="2">Description</th>
                                        <th colspan="2">Date</th>
                                        <th> </th>
                                        <th> </th>
                                    </tr>
                                    <tr><td colspan="3"><hr></td></tr>
                            
                                    <?php foreach($data['posts'] as $post): ?>
                                        <?php if($post->userId == $_SESSION['user_id']): ?>
                                            <tr>
                                                <!-- <td class="gov-course-index"><?php echo $post->id; ?></td> -->
                                                <td>    </td>
                                                <td class="gov-course-name" ><?php echo $post->title; ?></td>
                                                <td class="gov-course-name" colspan="2"><?php echo $post->content; ?></td>
                                                <td class="gov-course-name"><?php echo $post->created_at; ?></td>
                                                <!-- <td class="gov-course-uniicon"><img src="<?php echo URLROOT.'/imgs/prof.jpg'?>" alt=""></td> -->
                                                <!-- <td class="gov-course-uniname">UCSC</td> -->
                                                <!-- <td class="gov-course-duration">4 Years</td> -->
                                                <!-- <td class="gov-course-intake">200</td> -->
                                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_M_Complaints/edit/'.$post->postId;?>"><button class="btn5">Edit</button></a></td>
                                                <td class="gov-course-viewmore"><a href="<?php echo URLROOT.'/C_M_Complaints/delete/'.$post->postId;?>"><button class="btn4">Delete</button></a></td>
                                            </tr>
                                            <tr><td colspan="4"><hr></td></tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                            
                                    </table>
                                    <hr>
                                </div>
                        </div>
                    </div>
                <?php else: ?>
                    <!-- Nothing here -->
                <?php endif;?>
            <?php endif; ?> 

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>