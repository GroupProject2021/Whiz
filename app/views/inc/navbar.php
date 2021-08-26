<div class="topnav">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <?php if(isset($_SESSION['user_id'])) : ?>
    <a class="active" href="<?php echo URLROOT; ?>/users/logout">Log Out</a>
  <?php else: ?>
    <a class="active" href="<?php echo URLROOT; ?>/users/register">Register</a>
    <a class="active" href="<?php echo URLROOT; ?>/users/login">Log In</a>
  <?php endif; ?>
</div>