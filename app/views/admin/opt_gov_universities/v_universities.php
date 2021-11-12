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
                        <h1>Goverment Universities</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <a href="<?php echo URLROOT.'/C_A_Government_University/addUniversity'; ?>" class="btn1-small form-link">Add university</a>
                        
                        <br>

                        <table>
                        <?php foreach($data['university_list'] as $university): ?>
                            <tr>
                                <td><?php echo $university->gov_uni_id; ?></td>
                                <td><?php echo $university->uni_name; ?></td>
                                <td><?php echo $university->world_rank; ?></td>
                                <td><?php echo $university->description; ?></td>
                                <td><?php echo $university->student_amount; ?></td>
                                <td><?php echo $university->graduate_job_rate; ?></td>
                                <td><a href="<?php echo URLROOT.'/C_A_Government_University/editUniversity/'.$university->gov_uni_id; ?>">Edit</a></td>
                                <td><a href="<?php //echo URLROOT.'/C_A_Government_University/deleteUniversity/'.$university->gov_uni_id; ?>">Delete</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </table>
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