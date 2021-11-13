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
                        <h1>Edit Z-Score record</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <form action="<?php echo URLROOT; ?>/C_A_ZScore_Options/editZScoreEntry/<?php echo $data['course_of_study']?>" method="post">
                            <table>
                                <tr>
                                    <td>Course of Study</td>
                                    <td>
                                        <select name="course_of_study" id="course_of_study" class="form-select">
                                            <?php foreach($data['course_university_list'] as $courseUni):?>     
                                                <?php if($courseUni->unicode == $data['course_of_study']): ?>                                           
                                                    <option value="<?php echo $courseUni->unicode; ?>" selected><?php echo '<b>'.$courseUni->gov_course_name.'</b> ('.$courseUni->uni_name.')'; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>   
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Year</td>
                                    <td>
                                        <select name="year" id="year" class="form-select">                                            
                                            <option value="2019">2019</option>
                                        </select> 
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Syllabus</td>
                                    <td>
                                        <select name="syllabus" id="syllabus" class="form-select">    
                                            <?php if($data['syllabus'] == "New"): ?>                                        
                                                <option value="New" selected>New</option>
                                            <?php else: ?>
                                                <option value="Old" selected>Old</option>
                                            <?php endif; ?>
                                        </select> 
                                    </td>
                                </tr>  
                                <!-- districts -->
                                <tr>
                                    <td>Colombo</td>
                                    <td>
                                        <input type="text" name="d1" id="d1" value="<?php echo $data['d1']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Gampaha</td>
                                    <td>
                                        <input type="text" name="d2" id="d2" value="<?php echo $data['d2']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Kalutara</td>
                                    <td>
                                        <input type="text" name="d3" id="d3" value="<?php echo $data['d3']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Matale</td>
                                    <td>
                                        <input type="text" name="d4" id="d4" value="<?php echo $data['d4']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Kandy</td>
                                    <td>
                                        <input type="text" name="d5" id="d5" value="<?php echo $data['d5']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Nuwara eliya</td>
                                    <td>
                                        <input type="text" name="d6" id="d6" value="<?php echo $data['d6']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Galle</td>
                                    <td>
                                        <input type="text" name="d7" id="d7" value="<?php echo $data['d7']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Matara</td>
                                    <td>
                                        <input type="text" name="d8" id="d8" value="<?php echo $data['d8']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Hambanthota</td>
                                    <td>
                                        <input type="text" name="d9" id="d9" value="<?php echo $data['d9']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Jaffna</td>
                                    <td>
                                        <input type="text" name="d10" id="d10" value="<?php echo $data['d10']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Kilinochchi</td>
                                    <td>
                                        <input type="text" name="d11" id="d11" value="<?php echo $data['d11']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Mannar</td>
                                    <td>
                                        <input type="text" name="d12" id="d12" value="<?php echo $data['d12']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Mullativu</td>
                                    <td>
                                        <input type="text" name="d13" id="d13" value="<?php echo $data['d13']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Vauniya</td>
                                    <td>
                                        <input type="text" name="d14" id="d14" value="<?php echo $data['d14']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Trincomalee</td>
                                    <td>
                                        <input type="text" name="d15" id="d15" value="<?php echo $data['d15']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Batticaloa</td>
                                    <td>
                                        <input type="text" name="d16" id="d16" value="<?php echo $data['d16']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Ampara</td>
                                    <td>
                                        <input type="text" name="d17" id="d17" value="<?php echo $data['d17']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Puttalam</td>
                                    <td>
                                        <input type="text" name="d18" id="d18" value="<?php echo $data['d18']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Kurunegala</td>
                                    <td>
                                        <input type="text" name="d19" id="d19" value="<?php echo $data['d19']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Anuradhapura</td>
                                    <td>
                                        <input type="text" name="d20" id="d20" value="<?php echo $data['d20']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Polonnaruwa</td>
                                    <td>
                                        <input type="text" name="d21" id="d21" value="<?php echo $data['d21']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Badulla</td>
                                    <td>
                                        <input type="text" name="d22" id="d22" value="<?php echo $data['d22']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Monaragala</td>
                                    <td>
                                        <input type="text" name="d23" id="d23" value="<?php echo $data['d23']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Kegalle</td>
                                    <td>
                                        <input type="text" name="d24" id="d24" value="<?php echo $data['d24']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td>Rathnapura</td>
                                    <td>
                                        <input type="text" name="d25" id="d25" value="<?php echo $data['d25']; ?>">
                                    </td>
                                </tr>  
                                <tr>
                                    <td colspan="2">
                                        <button type="submit" class="form-next-button">Update</button>
                                    </td>
                                </tr>   
                            </table>                            
                        </form>
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