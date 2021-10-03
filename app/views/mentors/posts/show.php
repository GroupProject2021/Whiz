<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/mentor_sidebar.php'?>

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
                            <h1>Banners > View</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel">
                            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">Back</a>
                            <br>
                            <div>
                                <h1><?php echo $data['post']->title; ?></h1>
                                <b>Writtern by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?></b>
                                <p><?php echo $data['post']->body; ?></p>

                                <?php if($data['post']->user_id == $_SESSION['user_id']): ?>
                                    <hr>
                                    <a href="<?php echo URLROOT?>/Mentors_dashboard/edit/<?php echo $data['post']->id;?>">Edit</a>

                                    <form action="<?php echo URLROOT; ?>/Mentors_dashboard/delete/<?php echo $data['post']->id; ?>" method="post">
                                        <input type="submit" value="Delete">
                                    </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php elseif($_SESSION['specialized_actor_type'] == 'Teacher'): ?>
                    <!-- Teacher -->
                    <div class="wrapper">
                        <!-- TOP PANEL -->
                        <div class="top-panel">
                            <h1>Posters > View</h1>
                        </div>

                        <!-- MIDDLE PANEL -->
                        <div class="middle-panel">
                            <a href="<?php echo URLROOT; ?>/Mentors_dashboard/banner">Back</a>
                            <br>
                            <div>
                                <h1><?php echo $data['post']->title; ?></h1>
                                <b>Writtern by <?php echo $data['user']->name; ?> on <?php echo $data['post']->created_at; ?></b>
                                <p><?php echo $data['post']->body; ?></p>

                                <?php if($data['post']->user_id == $_SESSION['user_id']): ?>
                                    <hr>
                                    <a href="<?php echo URLROOT?>/Mentors_dashboard/edit/<?php echo $data['post']->id;?>">Edit</a>

                                    <form action="<?php echo URLROOT; ?>/Mentors_dashboard/delete/<?php echo $data['post']->id; ?>" method="post">
                                        <input type="submit" value="Delete">
                                    </form>
                                <?php endif; ?>
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