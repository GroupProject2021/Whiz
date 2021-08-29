<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/sidenav.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/topnav.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/login_style.css">
    </head>
    <body id="main">
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>

        <!-- SIDE NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/sidenav.php'?>
        
        
        <h1><?php echo $data['title']; ?></h1>
        <ul>
            <?php foreach($data['posts'] as $post) :?>
            <li><?php echo $post->name; ?></li>
            <?php endforeach;?>
        </ul>

        <!-- Scritps -->
        <script src="<?php echo URLROOT;?>/js/components/sidenav.js"></script>
    </body>
</html>