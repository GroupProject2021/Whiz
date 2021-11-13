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
                        <h1>Z-Score table</h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <form action="<?php echo URLROOT; ?>/C_A_Government_University/addCourseUniversity" method="post">
                            <table border="1">
                                <tr style="height: 100px;">
                                    <td></td>
                                    <?php
                                         foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Colombo") {
                                                echo '<th>';
                                                echo $z_record->unicode.' - '.$z_record->gov_course_name;
                                                echo '<br>';
                                                echo '('.$z_record->uni_name.')';
                                                echo '</th>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Colombo</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Colombo") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Gampaha</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Gampaha") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Kalutara</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Kalutara") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Matale</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Matale") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Kandy</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Kandy") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Nuwara eliya</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Nuwara Eliya") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Galle</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Galle") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Matara</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Matara") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Hambanthota</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Hambanthota") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Jaffna</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Jaffna") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Kilinochchi</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Kilinochchi") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Mannar</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Mannar") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Mulathivu</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Mulathivu") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Vavuniya</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Vauniya") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Trincomalee</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Trincomalee") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Batticaloa</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Batticaloa") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Ampara</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Ampara") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Puttalam</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Puttalam") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Kurunegala</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Kurunegala") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Anuradhapura</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Anuradhapura") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Polonnaruwa</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Polonnaruwa") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Badulla</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Badulla") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Monaragala</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Monaragala") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Kegalle</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Kegalle") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
                                </tr>
                                <tr>
                                    <td>Ratnapura</td>
                                    <?php
                                        foreach($data['zscore_table'] as $z_record) {
                                            if($z_record->district_name == "Rathnapura") {
                                                echo '<td>';
                                                if($z_record->z_score > 0) {echo $z_record->z_score;} else {echo '<p style="color: gray;">NQC</p>';}
                                                echo '</td>';
                                            }
                                        }
                                    ?>
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