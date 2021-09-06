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
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                            <form action="<?php echo URLROOT; ?>/students_dashboard/editSettingsAL" method="post">
                                <div class="settings-header">
                                    <div class="settings-header-item"><h2>AL details</h2></div>
                                    <div class="settings-header-item"><a href="<?php echo URLROOT; ?>/students_dashboard/settings"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                    <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                                </div>                      
                                <br>
                                <div class="table-section">  
                                <table class="settings-table">
                                    <tr>
                                        <th class="A">AL School</th>
                                        <td class="B" colspan="6"><p><input type="text" name="al_school" id="al_school" value="<?php echo $data['al_school'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_school_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">AL District</th>
                                        <td class="B" colspan="6">
                                            <select name="al_district" id="al_district">
                                                <?php foreach($data['district_list'] as $district):?>
                                                    <?php if($district->district_name == $data['al_district']): ?>
                                                        <option value="<?php echo $district->district_name; ?>" selected><?php echo $district->district_name; ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $district->district_name; ?>"><?php echo $district->district_name; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['al_district_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Stream</th>
                                        <td class="B" colspan="6">
                                            <select name="stream" id="stream">
                                                <?php foreach($data['stream_list'] as $stream):?>
                                                    <?php if($stream->stream_id == $data['stream']): ?>
                                                        <option value="<?php echo $stream->stream_id; ?>" selected><?php echo $stream->stream_name; ?></option>
                                                    <?php else: ?>
                                                        <option value="<?php echo $stream->stream_id; ?>"><?php echo $stream->stream_name; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['stream_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">Z-Score</th>
                                        <td class="B" colspan="6"><p><input type="text" name="z_score" id="z_score" value="<?php echo $data['z_score'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['z_score_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">General test grade</th>
                                        <td class="B" colspan="6"><p><input type="text" name="general_test_grade" id="general_test_grade" value="<?php echo $data['general_test_grade'];?>"></p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['general_test_grade_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">General english grade</th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_general_english'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_general_english" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_general_english" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                            <select name="subject1" id="subject1">
                                                <?php foreach($data['al_subject_list'] as $subjects):?>
                                                    <?php if($subjects->al_stream_id == 1):?>
                                                        <?php if($subjects->al_sub_id == $data['al_sub1_id']): ?>
                                                            <option value="<?php echo $subjects->al_sub_id; ?>" selected><?php echo $subjects->al_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->al_sub_id; ?>"><?php echo $subjects->al_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_subject_1'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_subject_1" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_subject_1" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                        <select name="subject2" id="subject2">
                                                <?php foreach($data['al_subject_list'] as $subjects):?>
                                                    <?php if($subjects->al_stream_id == 1):?>
                                                        <?php if($subjects->al_sub_id == $data['al_sub2_id']): ?>
                                                            <option value="<?php echo $subjects->al_sub_id; ?>" selected><?php echo $subjects->al_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->al_sub_id; ?>"><?php echo $subjects->al_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_subject_2'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_subject_2" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_subject_2" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th class="A">
                                        <select name="subject3" id="subject3">
                                                <?php foreach($data['al_subject_list'] as $subjects):?>
                                                    <?php if($subjects->al_stream_id == 1):?>
                                                        <?php if($subjects->al_sub_id == $data['al_sub3_id']): ?>
                                                            <option value="<?php echo $subjects->al_sub_id; ?>" selected><?php echo $subjects->al_sub_name; ?></option>
                                                        <?php else: ?>
                                                            <option value="<?php echo $subjects->al_sub_id; ?>"><?php echo $subjects->al_sub_name; ?></option>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                <?php endforeach; ?>
                                            </select>
                                        </th>
                                        <?php 
                                            $grades = ['A', 'B', 'C', 'D', 'E', 'F'];

                                            foreach($grades as $grade) {
                                                if($data['radio_subject_3'] == $grade) {
                                                    echo '<td><input type="radio" name="radio_subject_3" value="'.$grade.'" checked>'.$grade.'</td>';
                                                }
                                                else {
                                                    echo '<td><input type="radio" name="radio_subject_3" value="'.$grade.'">'.$grade.'</td>';
                                                }
                                            }
                                        ?>
                                    </tr>
                                    <tr>
                                        <!-- for error -->
                                        <span class="form-invalid"><?php echo $data['al_results_err']; ?></span><br>
                                    </tr>
                                </table> 
                                </div>
                            </form>
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