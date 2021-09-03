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
                    <label for="sidebar-toggle">
                        <img src="<?php echo URLROOT; ?>/imgs/dashboard/sidebar-icon.png">
                    </label>
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
                        <h1>Beginner dashboard</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel">
                        <div class="middle-left-panel">                            
                            
                        
                        </div>
                        <div class="middle-right-panel">
                            <div class="notices">
                                <h2>Notices</h2>
                                <hr>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut est aliquid fugit porro hic iusto aliquam? Sit cumque, voluptates pariatur perspiciatis blanditiis tempora laborum fugiat maiores error odio quidem fuga!
                                <hr>

                                <div class="notice-card">
                                    <div class="notice-card-title">
                                        <b>Notice 1</b>
                                    </div>
                                    <div class="notice-card-content">
                                        <div class="notice-card-content-image">
                                            <img src="<?php echo URLROOT; ?>/imgs/icon.png" alt="img">
                                        </div>
                                        <div class="notice-card-content-description">
                                            Lorem ipsum dolor sarum accusantium veritatis?
                                        </div>
                                        <div>
                                            <input class="notice-card-content-button" type="button" value="view">
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="notice-card">
                                    <div class="notice-card-title">
                                        <b>Notice 1</b>
                                    </div>
                                    <div class="notice-card-content">
                                        <div class="notice-card-content-image">
                                            <img src="<?php echo URLROOT; ?>/imgs/icon.png" alt="img">
                                        </div>
                                        <div class="notice-card-content-description">
                                            Lorem ipsum dolor sarum accusantium veritatis?
                                        </div>
                                        <div>
                                            <input class="notice-card-content-button" type="button" value="view">
                                        </div>
                                    </div>                                    
                                </div>

                                <div class="notice-card">
                                    <div class="notice-card-title">
                                        <b>Notice 1</b>
                                    </div>
                                    <div class="notice-card-content">
                                        <div class="notice-card-content-image">
                                            <img src="<?php echo URLROOT; ?>/imgs/icon.png" alt="img">
                                        </div>
                                        <div class="notice-card-content-description">
                                            Lorem ipsum dolor sarum accusantium veritatis?
                                        </div>
                                        <div>
                                            <input class="notice-card-content-button" type="button" value="view">
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="updates">
                                <h2>Updates</h2>
                                <hr>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum sapiente harum minima a adipisci facere, totam, autem id atque accusamus, inventore laboriosam! Dignissimos illo dolores maiores nam, quo quis eaque.
                                <br>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae maiores culpa rerum quae ducimus, atque eveniet animi esse reiciendis est sunt facilis tempore quo pariatur, laudantium impedit at nihil veritatis.
                            </div>
                        </div>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>