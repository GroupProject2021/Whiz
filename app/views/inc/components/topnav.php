<div class="topnav">
  <a class="topnav-item" href="#home">Home</a>
  <a class="topnav-item" href="#news">News</a>
  <a class="topnav-item" href="#contact">Contact</a>
  <a class="topnav-item" href="#about">About</a>
  <?php if(isset($_SESSION['user_id'])) : ?>
    <a class="topnav-item-active" href="<?php echo URLROOT; ?>/students/logout">Log Out</a>
  <?php else: ?>
    <a class="topnav-item-active" href="<?php echo URLROOT; ?>/students/register">Register</a>
    <a class="topnav-item-active" href="<?php echo URLROOT; ?>/students/login">Log In</a>
  <?php endif; ?>
</div>