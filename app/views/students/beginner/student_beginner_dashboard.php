<html lang="en">
    <head>
        <title><?php echo SITENAME; ?></title>
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/style.css">
    </head>
    <body>
        <!-- TOP NAVIGATION BAR -->
        <?php require APPROOT.'/views/inc/components/topnav.php'?>
        
        <h1><?php echo $data['title']; ?></h1>
        <ul>
            <?php foreach($data['posts'] as $post) :?>
            <li><?php echo $post->name; ?></li>
            <?php endforeach;?>
        </ul>
<?php require APPROOT.'/views/inc/footer.php'; ?>