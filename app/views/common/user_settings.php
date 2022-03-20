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
                            settings
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php flash('acc_settings_msg'); ?>

                        <h2>Audience and Visibility</h2>
                        <p>Control who can see your profile and details</p>
                        <br>

                        <?php if(!$data['isProfileLocked']): ?>
                        <form action="<?php echo URLROOT; ?>/Account_Settings/lockProfile/<?php echo $_SESSION['user_id']; ?>" method="post">
                        <div class="lock_profile">
                            <div class="lock_profile_upper">
                                <div class="lock_icon">
                                    <img src="<?php echo URLROOT.'/imgs/pages/settings/shield-icon.png'?>" alt="">
                                </div>
                                <div class="title">
                                    <b>Hide your profile</b>
                                </div>
                                <div class="desc">
                                    Make your valuable educational and social media details more private.
                                </div>
                            </div>
                            <br>
                            <hr>
                            <br>
                            <table>
                                <tr>
                                    <td><img src="<?php echo URLROOT.'/imgs/pages/settings/details-icon.png'?>" alt=""></td>
                                    <td class="right">Your account details will be only visible to your followings</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo URLROOT.'/imgs/pages/settings/social-icon.png'?>" alt=""></td>
                                    <td class="right">Also your social media details will be only visible to your followings</td>
                                </tr>
                                <tr>
                                    <td><img src="<?php echo URLROOT.'/imgs/pages/settings/search-icon.png'?>" alt=""></td>
                                    <td class="right">By the way perople will still be able to search for you and follow your profile</td>
                                </tr>
                            </table>
                            <br>
                            <button class="btn1">Lock your profile</button>
                        </div>
                        </form>
                        <?php else: ?>
                        <form action="<?php echo URLROOT; ?>/Account_Settings/unlockProfile/<?php echo $_SESSION['user_id']; ?>" method="post">
                            <div class="lock_disable_msg">
                                <div class="left">
                                    <img src="<?php echo URLROOT.'/imgs/pages/settings/shield-icon.png'?>" alt="">
                                </div>
                                <div class="right">
                                    <div><b>You have enabled the privacy shield</b></div>
                                    <div>Only your following people will be able to see your profile detials.</div>
                                    <button class="btn1">Disable shield</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <form method="post">
                        <table class="acc-profile-locking">
                            <tr>
                                <td class="left">Hide general details</td>
                                <td class="right">
                                    <?php if($data['isGenDetailsLocked']):?>
                                    <div id="btn1" class="toggle active">
                                        <i class="indicator active"></i>
                                    </div>  
                                    <?php else: ?>
                                    <div id="btn1" class="toggle">
                                        <i class="indicator"></i>
                                    </div>  
                                    <?php endif; ?>                             
                                </td>
                            </tr>
                            <tr>
                                <td class="left">Hide social media details</td>
                                <td class="right">
                                    <?php if($data['isSocDetailsLocked']):?>
                                    <div id="btn2" class="toggle active">
                                        <i class="indicator active"></i>
                                    </div>                 
                                    <?php else: ?>
                                    <div id="btn2" class="toggle">
                                        <i class="indicator"></i>
                                    </div>    
                                    <?php endif; ?>          
                                </td>
                            </tr>
                        </table>
                        </form>
                        <?php endif; ?>

                        <!-- Account delete -->
                        <br><hr><br>
                        <h2>Delete account</h2>
                        <p>This will delete your profile as well as the posts, posts interactions and other activities.</p>
                        <p class="user-settings-red-text">This process is unrecoverable and please make sure to backup the data if you want, before deleting the account. </p>
                        <br>
                        <p>Please type <b>"I am <?php echo $_SESSION['user_name']; ?>. Delete my account."</b> to confirm your action</p>
                        <br>
                        <div class="acc_delete_confirmation">
                            <input type="text" name="acc_delete_confirmation_text" id="acc_delete_confirmation_text" class="acc_delete_confirmation_text" oninput="checkDeleteText()">
                        </div>
                        <br>
                        <form action="<?php echo URLROOT; ?>/Account_Settings/deleteAccount/<?php echo $_SESSION['user_id']; ?>" method="post">
                            <div class = editable>
                                <input type="submit" value="Delete Account Permenently" class="btn7" id="deleteAccBtn" disabled>
                            </div>                            
                        </form>

                    </div>
            </main>
        </div>

<!-- javascript -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/externalLibraries/jQuery/jquery-3.6.0.js"></script>

<script type="text/JavaScript">
    var URLROOT = '<?php echo URLROOT; ?>';            
    var USER_ID= '<?php echo $_SESSION["user_id"]; ?>';
    var DELETE_TEXT = 'I am <?php echo $_SESSION['user_name']; ?>. Delete my account.';
</script>

<!-- javascript -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/profilesRelated/settings.js"></script>

<script>
    

    const acc_delete_confirmation_text = document.getElementById("acc_delete_confirmation_text");
    const text_need_to_be_matched = DELETE_TEXT;

    const deleteAccBtn = document.getElementById("deleteAccBtn");

    function checkDeleteText() {
        if(text_need_to_be_matched == acc_delete_confirmation_text.value) {
            console.log('matched');
            deleteAccBtn.disabled = false;
            deleteAccBtn.className = "btn4";
        }
        else {
            console.log('not matching');
            deleteAccBtn.disabled = true;
            deleteAccBtn.className = "btn7";
        }
    }


</script>

<?php require APPROOT.'/views/inc/footer.php'; ?>