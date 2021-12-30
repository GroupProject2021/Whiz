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
                        <form action="<?php echo URLROOT.'/C_O_Settings/editSettingsCompany'; ?>" method="post">
                            <div class="settings-header">
                                    <div class="settings-header-item"><h2>Basic details</h2></div>
                                    <div class="settings-header-item"><a href="<?php echo URLROOT.'/C_O_Settings/settings/'.$data['comid'].'/'.$_SESSION['user_id']; ?>"><input class="cancel-button" type="button" value="Cancel"></a></div>
                                    <div class="settings-header-item"><a href=""><input class="save-button" type="submit" value="Save"></a></div>
                                    <!-- <div class="settings-header-item"><button type="submit">Save</button></div> -->
                            </div>                      
                            <br>
                            <div class="table-section">
                            <table class="settings-table">
                                <tr>
                                    <th class="A">Company name</th>
                                    <td class="B"><p><input type="text" name="comname" id="comname" value="<?php echo $data['comname'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['comname_err']; ?></td>
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
                                    <th class="A">Comapny Size</th>
                                    <td class="B"><p><input type="text" name="emp_size" id="emp_size" value="<?php echo $data['emp_size'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['emp_size_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">No. of Current Employees</th>
                                    <td class="B"><p><input type="text" name="cur_emp" id="cur_emp" value="<?php echo $data['cur_emp'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['cur_emp_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Registered Company?</th>
                                    <td>
                                        <?php if($data['registered'] == "Yes"): ?>
                                            <input type="radio"  name="registered" value="Yes" checked="checked">Yes
                                            <input type="radio"  name="registered" value="No">No
                                        <?php endif; ?>
                                        <?php if($data['registered'] == "No"): ?>
                                            <input type="radio"  name="registered" value="Yes">Yes
                                            <input type="radio"  name="registered" value="No" checked="checked">No
                                        <?php endif; ?>
                                    </td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['registered_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Overview</th>
                                    <td class="B"><p><input type="text" name="overview" id="overview" value="<?php echo $data['overview'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['overview_err']; ?></td>
                                </tr>
                                <tr>
                                    <th class="A">Services</th>
                                    <td class="B"><p><input type="text" name="services" id="services" value="<?php echo $data['services'];?>"></p></td>
                                    <td class="C"><span class="form-invalid"><?php echo $data['services_err']; ?></td>
                                </tr>
                            </table>
                            </div>
                            <input type="hidden" id="comid" name="comid" value="<?php echo $data['comid'];?>">
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