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
                            Post revenues
                        </h1>
                    </div>
                    
                    

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <h2><?php echo $data['title']; ?></h2>
                        <br>
                    
                        <table>
                            <tr>
                                <th>Transaction Id</th>
                                <th>User</th>
                                <th>Amount</th>
                                <th></th>
                            </tr>
                            <?php foreach($data['transactions'] as $transaction): ?>
                                <tr>
                                    <td><?php echo $transaction->transaction_id; ?></td>
                                    <td>
                                        <?php switch($transaction->actor_type){
                                            case 'Mentor':
                                                echo '<a href="'.URLROOT.'/C_M_Settings/settings/'.$transaction->user_id.'/'.$_SESSION['user_id'].'" class="post-link">'.$transaction->first_name.' '.$transaction->last_name.'</a>';
                                                break;

                                            case 'Organization':
                                                echo '<a href="'.URLROOT.'/C_O_Settings/settings/'.$transaction->user_id.'/'.$_SESSION['user_id'].'" class="post-link">'.$transaction->first_name.' '.$transaction->last_name.'</a>';
                                                break;
                                        } ?>
                                        
                                    </td>
                                    <td>Rs. <?php echo $transaction->amount; ?>.00</td>
                                    <td>
                                        <?php switch($transaction->type){
                                            case 'noticepost':
                                                echo '<a href="'.URLROOT.'/C_S_Stu_To_Notices/show/'.$transaction->post_id.'" class="form-link">VIEW POST</a>';
                                                break;

                                            case 'jobpost':
                                                echo '<a href="'.URLROOT.'/C_S_Stu_To_Company/show/'.$transaction->post_id.'" class="form-link">VIEW POST</a>';
                                                break;

                                            case 'poster':
                                                echo '<a href="'.URLROOT.'/C_S_Stu_To_Teacher/show/'.$transaction->post_id.'" class="form-link">VIEW POST</a>';
                                                break;

                                            case 'banner':
                                                echo '<a href="'.URLROOT.'/C_S_Stu_To_ProfessionalGuider/show/'.$transaction->post_id.'" class="form-link">VIEW POST</a>';
                                                break;
                                        }
                                        ?>
                                        
                                    </td>
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