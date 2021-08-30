<div class="topnav">
  <a class="topnav-item" href="#home">Home</a>
  <a class="topnav-item" href="#news">News</a>
  <a class="topnav-item" href="#contact">Contact</a>
  <a class="topnav-item" href="#about">About</a>
  <?php if(isset($_SESSION['user_id'])) : ?>
    <a class="topnav-item-active" href="<?php echo URLROOT; ?>/users/logout">Log Out</a>
  <?php else: ?>
    <a class="topnav-item-active" href="<?php echo URLROOT; ?>/users/register">Register</a>
    <a class="topnav-item-active" href="<?php echo URLROOT; ?>/users/login">Log In</a>
  <?php endif; ?>
</div>