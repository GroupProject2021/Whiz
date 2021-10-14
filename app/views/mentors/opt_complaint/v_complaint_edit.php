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
                        <h1>Complaints</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">

                        <a href="<?php echo URLROOT;?>/C_M_Complaints/complaint"><button class="btn8">Back</button></a>
                        <br>
                    
                        <form action="<?php echo URLROOT; ?>/C_M_Complaints/edit/<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">
                            <div class="post-creator">
                                
                                <div class="post-creator-title">
                                    <input type="text" name="title" id="title" autocomplete="off" placeholder="Title" value="<?php echo $data['title']; ?>">
                                    
                                </div>
                                <hr>
                                <div class="post-creator-content">
                                    <textarea name="content" id="content" cols="30" rows="10" placeholder="Content"><?php echo $data['content']; ?></textarea>
                                </div>
                                <button type="submit" class="post-creator-submit">Save</button>
                            </div>
                        </form>

                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
<?php require APPROOT.'/views/inc/footer.php'; ?> -->