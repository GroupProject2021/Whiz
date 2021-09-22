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
        <?php require APPROOT.'/views/inc/components/sideBar/studentSideBar/student_sidebar.php'?>

        <div class="main-content">
            <header>               
                 <!--CURRENTLY NOT AVAILABLE !!!  -->
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
                    
                    <input type="button" class="sidebar-handle">

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

        <script>
            const sidebar = document.querySelector(".sidebar");
            const sidebarHandler = document.querySelector(".sidebar-handle");

            function hider() {
                sidebar.style.left= "-100%";
            }

            function shower() {
                sidebar.style.left= "0";
            }

            let x = true;
            sidebarHandler.addEventListener("click", () => {
                if(x) {
                    hider();
                    x = false;
                }
                else {
                    shower();
                    x = true;
                }
            });
            
           
            
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>