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
                        <h1><a href="<?php echo URLROOT;?>/Posts_C_M_Banners/index">Banner</a> > Create
                        >
                        Payment
                        </h1>
                    </div>

                    <!-- MIDDLE PANEL -->
                    <div class="middle-panel-single">
                        <?php echo $_SESSION['post_to_be_payed']; ?>
                            <form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
                                <input type="hidden" name="merchant_id" value="1219553">    <!-- Replace your Merchant ID -->
                                <input type="hidden" name="return_url" value="http://localhost/whiz/Posts_C_M_Banners/index">
                                <input type="hidden" name="cancel_url" value="http://localhost/whiz/Posts_C_M_Banners/add">
                                <input type="hidden" name="notify_url" value="http://localhost/whiz/Posts_C_M_Banners/payment">  
                                <br><br>Item Details<br>
                                <input type="text" name="order_id" value="<?php echo $data['order_id']; ?>">
                                <input type="text" name="items" value="<?php echo $data['items']; ?>"><br>
                                <input type="text" name="currency" value="<?php echo $data['currency']; ?>">
                                <input type="text" name="amount" value="<?php echo $data['amount']; ?>">  
                                <br><br>Customer Details<br>
                                <input type="text" name="first_name" value="<?php echo $data['first_name']; ?>">
                                <input type="text" name="last_name" value="<?php echo $data['last_name']; ?>"><br>
                                <input type="text" name="email" value="<?php echo $data['email']; ?>">
                                <input type="text" name="phone" value="<?php echo $data['phone']; ?>"><br>
                                <input type="text" name="address" value="<?php echo $data['address']; ?>">
                                <input type="text" name="city" value="<?php echo $data['city']; ?>">
                                <input type="hidden" name="country" value="<?php echo $data['country']; ?>"><br><br> 
                                <input type="submit" value="Pay Now">   
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