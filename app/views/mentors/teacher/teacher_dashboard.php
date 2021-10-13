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
                    <div class="middle-panel">
                        <div class="middle-left-panel">                            
                            
                        
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