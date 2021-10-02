<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- SIDE BAR -->
        <?php require APPROOT.'/views/inc/components/sideBar/organizationSideBar/company_sidebar.php'?>

        <div class="main-content">
            <!-- TOP Navigation -->
            <?php require APPROOT.'/views/inc/components/topnav.php'?>

            

            <main>
                <div class="wrapper">
                    <!-- TOP PANEL -->
                    <div class="top-panel">
                        <h1>University dashboard</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Et est praesentium, accusamus dicta quaerat hic laborum ullam obcaecati quod doloremque fugiat necessitatibus eum, fuga autem consectetur id repellendus, repudiandae eveniet?
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>