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
                        <h1>Add University</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <form action="<?php echo URLROOT; ?>/C_A_Government_University/addUniversity" method="post">
                            <table>   
                                <tr>
                                    <td>University name</td>
                                    <td>
                                        <input type="text" name="uni_name" id="uni_name" value="<?php echo $data['uni_name']; ?>">
                                    </td>
                                </tr>        
                                <tr>
                                    <td>Description</td>
                                    <td>
                                        <input type="text" name="description" id="description" value="<?php echo $data['description']; ?>">
                                    </td>
                                </tr>   
                                <tr>
                                    <td>World rank</td>
                                    <td>
                                        <input type="text" name="world_rank" id="world_rank" value="<?php echo $data['world_rank']; ?>">
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Student amount</td>
                                    <td>
                                        <input type="text" name="student_amount" id="student_amount" value="<?php echo $data['student_amount']; ?>">
                                    </td>
                                </tr>   
                                <tr>
                                    <td>Graduate job rate</td>
                                    <td>
                                        <input type="text" name="graduate_job_rate" id="graduate_job_rate" value="<?php echo $data['graduate_job_rate']; ?>">
                                    </td>
                                </tr>        
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="form-next-button">Add</button>
                                    </td>
                                </tr>        
                            </table>                            
                        </form>
                        <span class="form-invalid"><?php echo $data['uni_name_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['description_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['world_rank_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['student_amount_err']; ?></span><br>
                        <span class="form-invalid"><?php echo $data['graduate_job_rate_err']; ?></span><br>
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