<?php require APPROOT.'/views/inc/header.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<ul>
        <?php foreach($data['users'] as $user) :?>
        <li><?php echo $user->user_name; ?></li>
        <?php endforeach;?>
    </ul>
<?php require APPROOT.'/views/inc/footer.php'; ?>