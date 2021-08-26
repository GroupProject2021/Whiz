<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/users/login_style.css">
    </head>
    <body>
        <!-- NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/navbar.php'?>
        
        <h1><?php echo $data['title']; ?></h1>
        <ul>
            <?php foreach($data['posts'] as $post) :?>
            <li><?php echo $post->title; ?></li>
            <?php endforeach;?>
        </ul>
<?php require APPROOT.'/views/inc/footer.php'; ?>