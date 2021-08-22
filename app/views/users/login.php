<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT.'/views/inc/navbar.php'; ?>
<h1><?php echo $data['title']; ?></h1>
<form action="" method="post">
    <p>Name: <input type="text" name="name"></p>
    <p>Email: <input type="text" name="email"></p>
    <p>Password: <input type="password" name="pwd"></p>
    <p>Confirm password: <input type="password" name="c_pwd"></p>
    <p><input type="submit" value="submit"></p>
</form>
    <ul>
        <?php foreach($data['users'] as $user) :?>
        <li><?php echo $user->user_name; ?></li>
        <?php endforeach;?>
    </ul>
<?php require APPROOT.'/views/inc/footer.php'; ?>