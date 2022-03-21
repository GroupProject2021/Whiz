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
                        <h1>
                            <a href="<?php echo URLROOT;?>/C_A_Admin_Dashboard/index">Admin dashboard</a>
                            >
                            Users
                        </h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <h2><?php echo $data['title']; ?></h2>
                        <br>

                    <div class="default-list">
                        <?php
                        // initial user list
                            foreach($data['users'] as $user) {
                                switch($user->actor_type) {
                                    case "Student": 
                                        echo '<a href="'.URLROOT.'/C_S_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                        break;

                                    case "Organization": 
                                        echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                        break;

                                    case "Mentor": 
                                        echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$user->id.'/'.$_SESSION['user_id'].'" class="card-link">';
                                        break;

                                    default:
                                        // do nothing
                                }
                                
                                echo '<div class="user-block">';
                                echo    '<div class="pic"><img src="'.URLROOT.'/profileimages/'.getActorTypeForIcons($user->actor_type).'/'.$user->profile_image.'" alt=""></div>';
                                echo    '<div class="name">'.$user->first_name.' '.$user->last_name.'</div>';
                                if($user->status == 'verified'){
                                    echo    '<div class="verified"><img src="'.URLROOT.'/imgs/verified.png" alt=""></div>';
                                }
                                echo '<div class="types">'.$user->actor_type.' | '.$user->specialized_actor_type.'</div>';
                                echo '</div>';
                                echo '</a>';
                            }
                        ?>
                    </div>
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