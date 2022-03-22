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
                        Payment gateway
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                            
                            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                                <input type="hidden" name="merchant_id" value="<?php echo PG_MERCHANT_ID; ?>">    <!-- Replace your Merchant ID -->
                                <?php 
                                    switch($_SESSION['specialized_actor_type']) {
                                        case 'University':
                                            echo '<input type="hidden" name="return_url" value="http://localhost/whiz/Posts_C_O_IntakeNotices/updateIntakeNoticeAsPayed">';
                                            echo '<input type="hidden" name="cancel_url" value="http://localhost/whiz/Posts_C_O_IntakeNotices/add">';
                                            break;

                                        case 'Company':
                                            echo '<input type="hidden" name="return_url" value="http://localhost/whiz/Posts_C_O_JobAds/updateJobAdsAsPayed">';
                                            echo '<input type="hidden" name="cancel_url" value="http://localhost/whiz/Posts_C_O_JobAds/add">';
                                            break;

                                        case 'Professional Guider':
                                            echo '<input type="hidden" name="return_url" value="http://localhost/whiz/Posts_C_M_Banners/updateBannerAsPayed">';
                                            echo '<input type="hidden" name="cancel_url" value="http://localhost/whiz/Posts_C_M_Banners/add">';
                                            break;

                                        case 'Teacher':
                                            echo '<input type="hidden" name="return_url" value="http://localhost/whiz/Posts_C_M_Posters/updatePosterAsPayed">';
                                            echo '<input type="hidden" name="cancel_url" value="http://localhost/whiz/Posts_C_M_Posters/add">';
                                            break;
                                    }                                    
                                ?>
                                <input type="hidden" name="notify_url" value="http://localhost/whiz/Payments/payment">
                                
                                <div class="payment-container">
                                    <div class="payment-details">
                                        <h2>Order Details</h2>
                                        <br>
                                        <table>
                                            <tr>
                                                <td><b>Order ID</b></td>
                                                <td colspan="2"><input type="text" name="order_id" value="# <?php echo $data['order_id']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>Order Item</b></td>
                                                <td colspan="2"><input type="text" name="items" value="<?php echo $data['items']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>Price</b></td>
                                                <td><input type="text" name="currency" value="<?php echo $data['currency']; ?>" readonly></td>
                                                <td><input type="text" name="amount" value="<?php echo $data['amount']; ?>" readonly></td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td colspan="3">
                                                    <ul class="payment-details-notices">
                                                        <li><span class="red-bullet">*</span> This order details are placed under the price policies <br> for posts determined by Whiz.</li>
                                                        <li><span class="red-bullet">*</span> Also, inidividual users are not allowed to change these values.</li>
                                                        <li><span class="red-bullet">*</span> Note that these specified prices may change by the time <br> due to organizational decisions.</li>
                                                    </ul>
                                                </td>
                                            </tr>
                                            <tr></tr>
                                        </table>
                                    </div>
                                    <div class="payment-details">
                                        <h2>Cutomer Details</h2>
                                        <br>
                                        <table cellspacing="5">
                                            <tr>
                                                <td><b>Name</b></td>
                                                <td><input type="text" name="first_name" value="<?php echo $data['first_name'];?>" readonly></td>
                                                <td><input type="text" name="last_name" value="<?php echo $data['last_name']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>Email</b></td>
                                                <td colspan="2"><input type="text" name="email" value="<?php echo $data['email']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>Phone</b></td>
                                                <td colspan="2"><input type="text" name="phone" value="<?php echo $data['phone']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>Country</b></td>
                                                <td colspan="2"><input type="text" name="country" value="<?php echo $data['country']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>Address</b></td>
                                                <td colspan="2"><input type="text" name="address" value="<?php echo $data['address']; ?>" readonly></td>
                                            </tr>
                                            <tr>
                                                <td><b>City</b></td>
                                                <td colspan="2">
                                                    <select name="city" id="city">
                                                    <?php foreach($data['cities'] as $city):?>
                                                            <option value="<?php echo $city->city_name; ?>"><?php echo $city->city_name; ?></option>
                                                    <?php endforeach; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr></tr>
                                            <tr>
                                                <td colspan="3"><input type="submit" value="Pay Now" class="paynow-btn">  </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form> 
                    </div>

                    <!-- BOTTOM PANEL -->
                    <div class="bottom-panel">
                        <p>Whiz organization. All rights reserved.</p>
                    </div>
                </div>
            </main>
        </div>
        
        <!-- post add javascript -->
        <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/components/posts/postsAdd.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>