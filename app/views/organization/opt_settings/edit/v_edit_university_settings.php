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
                        <h1>Profile > Edit</h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <div class="settings-form-edit-container">
                        <form action="<?php echo URLROOT.'/C_O_Settings/editSettingsUniversity'; ?>" method="post">
                            <div class="settings-header">
                                    <div class="settings-header-item"><h2>Basic details</h2></div>
                                    <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_O_Settings/settings/'.$data['uniid'].'/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                            </div>                      
                            <br>
                            <div class="table-section">
                            <table class="settings-table">
                                <tr>
                                    <th class="A">University name</th>
                                    <td class="B"><p><input type="text" name="uniname" id="uniname" value="<?php echo $data['uniname'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['uniname_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Address</th>
                                    <td class="B"><p><input type="text" name="address" id="address" value="<?php echo $data['address'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['address_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Phone number</th>
                                    <td class="B"><p><input type="text" name="phn_no" id="phn_no" value="<?php echo $data['phn_no'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['phn_no_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Website</th>
                                    <td class="B"><p><input type="text" name="website" id="website" value="<?php echo $data['website'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['website_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Founder</th>
                                    <td class="B"><p><input type="text" name="founder" id="founder" value="<?php echo $data['founder'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['founder_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Founded year</th>
                                    <td class="B"><p><input type="text" name="founded_year" id="founded_year" value="<?php echo $data['founded_year'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['founded_year_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">UGC approved</th>
                                    <td>
                                        <?php if($data['approved'] == "Yes"): ?>
                                            <input type="radio"  name="approved" value="Yes" checked="checked">Yes                                            
                                            <input type="radio"  name="approved" value="No">No
                                        <?php endif; ?>
                                        <?php if($data['approved'] == "No"): ?>
                                            <input type="radio"  name="approved" value="Yes">Yes   
                                            <input type="radio"  name="approved" value="No" checked="checked">No
                                        <?php endif; ?>
                                    </td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['approved_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">World rank</th>
                                    <td class="B"><p>
                                        <table width="100%">
                                            </tr>
                                            <tr>                        
                                                <td width="75%">
                                                    <input type="range" min="0" max="10000" step="1" oninput="fetch_wr_value()" class="form-slider" placeholder="Enter World rank" name="rank" id="rank" value="<?php echo $data['rank']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" value="<?php echo $data['rank'];?>" oninput="fetch_wr()" name="rank_value" id="rank_value">
                                                    <!-- <span id="gpa_value"></span> -->
                                                </td>
                                            </tr>
                                        </table>
                                    </p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['rank_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Student amount</th>
                                    <td class="B"><p>
                                        <table width="100%">
                                            </tr>
                                            <tr>                        
                                                <td width="75%">
                                                    <input type="range" min="0" max="10000" step="1" oninput="fetch_sa_value()" class="form-slider" placeholder="Enter Student amount" name="amount" id="amount" value="<?php echo $data['amount']; ?>">
                                                </td>
                                                <td>
                                                    <input type="text" value="<?php echo $data['amount'];?>" oninput="fetch_sa()" name="amount_value" id="amount_value">
                                                    <!-- <span id="gpa_value"></span> -->
                                                </td>
                                            </tr>
                                        </table>
                                    </p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['amount_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Graduate job rate</th>
                                    <td class="B"><p><input type="text" name="rate" id="rate" value="<?php echo $data['rate'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['rate_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Description</th>
                                    <td class="B"><p><input type="text" name="descrip" id="descrip" value="<?php echo $data['descrip'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['descrip_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">University type</th>
                                    <td>
                                        <?php if($data['type'] == "Semi Government"): ?>
                                            <input type="radio" name="type" value="Semi Government" checked="checked">Semi-Government(Government Affiliated)<br>
                                            <input type="radio" name="type" value="Private">Private
                                        <?php endif; ?>
                                        <?php if($data['type'] == "Private"): ?>
                                            <input type="radio" name="type" value="Semi Government">Semi-Government(Government Affiliated)<br>
                                            <input type="radio" name="type" value="Private" checked="checked">Private
                                        <?php endif; ?>
                                    </td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['type_err']; ?></td>
                                </tr>
                            </table>
                            </div>
                            <input type="hidden" id="uniid" name="uniid" value="<?php echo $data['uniid'];?>">
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

        <script>
            // student amount range slider
            function fetch_sa_value() {
                var amount_value = document.getElementById("amount").value;
                document.getElementById("amount_value").value = amount_value;
            }

            function fetch_sa() {
                var amount = document.getElementById("amount_value").value;
                document.getElementById("amount").value = amount;
            }

            // world rank range slider
            function fetch_wr_value() {
                var rank_value = document.getElementById("rank").value;
                document.getElementById("rank_value").value = rank_value;
            }

            function fetch_wr() {
                var rank = document.getElementById("rank_value").value;
                document.getElementById("rank").value = rank;
            }
        </script>
        
<?php require APPROOT.'/views/inc/footer.php'; ?>