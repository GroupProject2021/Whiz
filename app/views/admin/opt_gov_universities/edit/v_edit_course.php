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
                        <h1>Edit course</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <form action="<?php echo URLROOT; ?>/C_A_Government_University/editCourse" method="post">
                            <table>   
                            <tr>
                                    <td>Course id</td>
                                    <td>
                                        <input type="text" name="course_id" id="course_id" value="<?php echo $data['course_id']; ?>">
                                    </td>
                                </tr>     
                                <tr>
                                    <td>Course name</td>
                                    <td>
                                        <input type="text" name="course_name" id="course_name" value="<?php echo $data['course_name']; ?>">
                                    </td>
                                </tr>                        
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="form-next-button">Add</button>
                                    </td>
                                </tr>        
                            </table>                            
                        </form>
                        <span class="form-invalid"><?php echo $data['course_id_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['course_name_err']; ?></span><br>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>

        
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>