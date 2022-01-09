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
                        <h1>
                            <a href="<?php echo URLROOT; ?>/C_S_CV/index">my cv</a>
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('file_upload');?>

                        <div>
                            <a href="<?php echo URLROOT; ?>/C_S_CV/uploadCustomCV"><button class="btn2">Upload Your CV</button></a>
                        </div>

                        <br>
                        <form action="<?php echo URLROOT; ?>/C_S_CV/generateCV" method="post">
                            <h2>SKILLS</h2>
                            <p>Please enter 4 skills you have. Also use the corresponding progress bar to indicate your skill level.</p>
                            <br>
                            <table class="std_cv_skill_table">
                                <tr>
                                    <th colspan="1">Skill</th>
                                    <th colspan="2">Ability level</th>
                                </tr>
                                <tr>
                                    <td><input type="text" name="skill1" id="skill1" required></td>
                                    <td style="width: 30%;"><input type="range" name="skill1_value" id="skill1_value" class="ability_prg" oninput="fetch_skill1()"></td>
                                    <td><p id="skill1_value_text" class="amount_text">50 %</p></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="skill2" id="skill2" required></td>
                                    <td style="width: 30%;"><input type="range" name="skill2_value" id="skill2_value" class="ability_prg" oninput="fetch_skill2()"></td>
                                    <td><p id="skill2_value_text" class="amount_text">50 %</p></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="skill3" id="skill3" required></td>
                                    <td style="width: 30%;"><input type="range" name="skill3_value" id="skill3_value" class="ability_prg" oninput="fetch_skill3()"></td>
                                    <td><p id="skill3_value_text" class="amount_text">50 %</p></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="skill4" id="skill4" required></td>
                                    <td style="width: 30%;"><input type="range" name="skill4_value" id="skill4_value" class="ability_prg" oninput="fetch_skill4()"></td>
                                    <td><p id="skill4_value_text" class="amount_text">50 %</p></td>
                                </tr>
                            </table>

                            <br><hr><br>

                            <h2>EXPEREINCE</h2>
                            <input type="radio"  name="exp_have" value="Yes" oninput="enableCusEXP()" checked>I have some experience
                            <br>
                            <input type="radio"  name="exp_have" value="No" oninput="disableCusEXP()">Currently I don't have any experience
                            <br><br>

                            <div id="custom_exp">
                            <p>Please enter 2 latest experiences you have. Also use the corresponding progress bar to indicate your skill level.</p>
                            <br>
                            <table class="std_cv_exp_table">
                                <tr>
                                    <th colspan="2">Experience 1</th>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Job </td>
                                    <td><input type="text" name="exp1_job" id="exp1_job" required></td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Company worked at </td>
                                    <td><input type="text" name="exp1_com" id="exp1_com" required></td>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Year  </td>
                                    <td>
                                        <select name="exp1_year" id="exp1_year" style="width: 100px; height: 30px; text-align: center;">
                                            <?php for($i = date('Y'); $i >= date('Y') - 100; $i--): ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <table class="std_cv_exp_table">
                                <tr>
                                    <th colspan="2">Experience 2</th>
                                </tr>
                                <tr>
                                    <td style="width: 20%;">Job </td>
                                    <td><input type="text" name="exp2_job" id="exp2_job" required></td>
                                </tr>
                                <tr style="width: 20%;">
                                    <td>Company worked at </td>
                                    <td><input type="text" name="exp2_com" id="exp2_com" required></td>
                                </tr>
                                <tr style="width: 20%;">
                                    <td>Year </td>
                                    <td>
                                        <select name="exp2_year" id="exp2_year" style="width: 100px; height: 30px; text-align: center;">
                                            <?php for($i = date('Y'); $i >= date('Y') - 100; $i--): ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            </div>
                            <br>

                            <button type="submit" class="cv_generate_btn" id="btn">GENERATE</button>
                        </form>
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz © 2021. All Rights Reserved.</p>
                    </div>
                </div>
            </main>
        </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>

<!-- java script form validation -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/studentRelated/opt_cv/generateCV.js"></script>
