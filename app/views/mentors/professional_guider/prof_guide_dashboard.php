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
                        <h1>Mentor dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single-new">
                        <h3><center>Upcoming Sessions</center></h3>
                        <br>
                        <br>
                        <!-- <?php print_r($data)?> -->
                        <table class="gov-course-table">
                        <?php foreach($data['details'] as $details): ?>
                                <?php if($details->user_id == $_SESSION['user_id'] ): ?>
                            <tr>
                                <td class="gov-course-name"><?php echo $details->title; ?></td>
                                <td class="gov-course-name"><?php echo $details->date; ?></td>
                                <td class="gov-course-name"><?php echo $details->time; ?></td>
                                <td class="gov-course-viewmore"><a href="<?php echo $details->body;?>"><button class="btn3">Click here to join</button></a></td>

                            </tr>
                                <tr><td colspan="4"><hr></td></tr>
                                <?php else: ?>
                                    You have no upcoming sessions
                                <?php endif; ?>
                        <?php endforeach; ?>
                        </table>

                        <!-- <?php if($data['link'] != Null):?>
                                <a href="<?php echo URLROOT.'/C_M_Enrolment_List/viewlink/'.$_SESSION['current_viewing_details_id']; ?>"><input class="btn1 details-back" type="button" value="View Link"></a>
                                  
                            <?php else: ?>
                                Currently you have no any upcoming sessions

                            <?php endif; ?> -->



                        <!-- <div class="middle-left-panel">                            
                            
                        
                        </div>
                        <div class="middle-right-panel">
                            <div class="notices">
                                <h2>Notices</h2>
                                <hr>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut est aliquid fugit porro hic iusto aliquam? Sit cumque, voluptates pariatur perspiciatis blanditiis tempora laborum fugiat maiores error odio quidem fuga!
                                <hr>

                                
                            </div>
                            <div class="updates">
                                <h2>Updates</h2>
                                <hr>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum sapiente harum minima a adipisci facere, totam, autem id atque accusamus, inventore laboriosam! Dignissimos illo dolores maiores nam, quo quis eaque.
                                <br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae maiores culpa rerum quae ducimus, atque eveniet animi esse reiciendis est sunt facilis tempore quo pariatur, laudantium impedit at nihil veritatis.
                            </div>
                        </div> -->
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>