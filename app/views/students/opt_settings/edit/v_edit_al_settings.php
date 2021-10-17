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
                        <h1>G.C.E(A/L) details > Edit</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                            <form action="<?php echo URLROOT; ?>/C_S_Settings/editSettingsAL" method="post">
                                <div class="settings-header">
                                    <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_S_Settings/settings/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
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
                                        <td>

                                        </td>
                                        <td>
                                            <!-- school search list -->
                                            <div class="list-group" class="show-list" id="show-list">
                                                <!-- sample element -->
                                                <!-- <div class="show-list-item">HRCC</div> -->
                                            </div>
                                        </td>
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
                                        <td class="B" colspan="6"><p>
                                            <table class="form-table">
                                                <tr>
                                                    <td width="80%">
                                                        <input type="range" min="0" max="4.0000" step="0.0001" class="form-slider" oninput="fetch_z_score_value()" name="z_score" id="z_score" value="<?php echo $data['z_score']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" value="<?php echo $data['z_score'];?>" oninput="fetch_z_score()" name="z_score_value" id="z_score_value">
                                                    </td>
                                                </tr>
                                            </table>
                                        </p></td>
                                        <td class="C"><span class="form-invalid"><?php echo $data['z_score_err']; ?></td>
                                    </tr>
                                    <tr>
                                        <th class="A">General test grade</th>
                                        <td class="B" colspan="6"><p>
                                            <table class="form-table">
                                                <tr>
                                                    <td width="80%">
                                                        <input type="range" min="0" max="100" step="1" class="form-slider" oninput="fetch_general_test_grade_value()" name="general_test_grade" id="general_test_grade" value="<?php echo $data['general_test_grade']; ?>">
                                                    </td>
                                                    <td>
                                                        <input type="text" value="<?php echo $data['general_test_grade']; ?>" oninput="fetch_general_test_grade()" name="general_test_grade_value" id="general_test_grade_value">
                                                    </td>
                                                </tr>
                                            </table>
                                        </p></td>
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
                                                    <?php if($subjects->al_stream_id == $data['stream']):?>
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
                                                    <?php if($subjects->al_stream_id == $data['stream']):?>
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
                                                    <?php if($subjects->al_stream_id == $data['stream']):?>
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
                                </table>

                                <!-- for error -->
                                <span class="form-invalid"><?php echo $data['al_results_err']; ?></span><br>
                                <input type="text" name="subjects_validity" id="subjects_validity" value="<?php $data['subjects_validity']; ?>" style="width: fit-content; display: none;">
                                <div class="form-validation">
                                    <div class="subjects-validation">
                                        <img src="<?php echo URLROOT; ?>/imgs/form/green-tick-icon.png" width="15px" height="15px" alt="green-tick">
                                        Your subject selection are valid
                                    </div>
                                </div>

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
        <!-- javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/al_UpgradeAndEdit.js"></script>

        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>
        <script>
            // stream change
            $('#stream').on("change", function() {
                var streamId = $('#stream').val();

                $.ajax({
                    url: "<?php echo URLROOT;?>/C_S_Settings/changeStream/"+streamId,
                    method: "post"
                }).done (function(res) {
                    // console.log(res); // for testing only
                    subjects = JSON.parse(res);
                    
                    // selection options resetting
                    isSetSelected = false;
                    $('#subject1').children().remove();
                    subjects.forEach(function(subject) {
                        if(isSetSelected) {
                            $('#subject1').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                            isSetSelected = true;
                        }
                        else {
                            $('#subject1').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>');
                        }
                    })

                    isSetSelected = false;
                    $('#subject2').children().remove();
                    subjects.forEach(function(subject) {
                        if(isSetSelected) {
                            $('#subject2').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                        }
                        else {
                            $('#subject2').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>')
                        }
                    })

                    isSetSelected = false;
                    $('#subject3').children().remove();
                    subjects.forEach(function(subject) {
                        if(isSetSelected) {
                            $('#subject3').append('<option value="'+subject.al_sub_id+'" selected>'+subject.al_sub_name+'</option>');
                        }
                        else {
                            $('#subject3').append('<option value="'+subject.al_sub_id+'">'+subject.al_sub_name+'</option>')
                        }
                    })

                    // called form al_UpgradeAndEdit JS file
                    initialUniqueSubjectsSetting();
                })
            })
        </script>

        <!-- jquery -->
        <script>
            $(document).ready(function() {
                $("#al_school").keyup(function() {
                    var searchText = $(this).val();
                    
                    if(searchText != '') {
                        $.ajax({
                            url: "<?php echo URLROOT;?>/Students_ProfileUpgrade/schoolList/"+searchText,
                            method: 'post',
                            success: function(response) {
                                $("#show-list").html(response);
                            }
                        });
                    }
                    else {
                        $("#show-list").html('');
                    }
                });

                $(document).on("click", ".show-list-item", function() {
                    $("#al_school").val($(this).text());
                    $("#show-list").html('');
                })
            });
        </script>
<?php require APPROOT.'/views/inc/footer.php'; ?>