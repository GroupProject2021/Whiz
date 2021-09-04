<div class="topnav">
  <!-- Centered link -->
  
  <div class="topnav-centered">
    <a href="<?php echo URLROOT; ?>" class="active">Home</a>
  </div>
 

  <!-- Left-aligned links (default) -->
  <!--
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  -->

  <!-- Right-aligned links -->
  <div class="topnav-right">
    <?php if(isset($_SESSION['user_id'])) : ?>      
      <!-- User profile details -->
      <div class="user-details">
        <div class="user-profile-image">
          <img src="<?php echo URLROOT; ?>/imgs/sidebar/2.jpg">
        </div>
        <div class="user-profile-name">
            <a href=""><?php echo $_SESSION['user_name']; ?></a>
        </div>
      </div>
      <a class="active" href="<?php echo URLROOT; ?>/students/logout">Log Out</a>
    <?php else: ?>
      <a class="active" href="<?php echo URLROOT; ?>/students/register">Register</a>
      <a class="active" href="<?php echo URLROOT; ?>/students/login">Log In</a>
    <?php endif; ?>
  </div>
</div>