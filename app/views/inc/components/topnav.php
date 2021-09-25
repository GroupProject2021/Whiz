<div class="topnav">
  <!-- Centered link -->
  
  <!-- <div class="topnav-centered">
    
  </div> -->

  <!--<a href="//<?php echo URLROOT; ?>/index" class="active">Home</a> -->

  <!-- Left-aligned links (default) -->
  <!--
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  -->

  <!-- Right-aligned links -->
  <div class="topnav-right">    
    <p style="color: white;">
    </p>
    <?php if(isset($_SESSION['user_id'])) : ?>      
      <!-- User profile details -->
      <div class="user-details">
        <div class="user-profile-image">
          <?php
            echo '<img src="'.URLROOT.'/profileimages/';

            switch($_SESSION['actor_type']) {
              case 'Student': 
                        echo 'student/';
                        break;
              case 'Organization': 
                        echo 'organization/';
                        break;
              case 'Mentor': 
                        echo 'mentor/';
                        break;
              case 'Admin':
                        echo 'admin/';
                        break;
              default: 
                        break;
            }

            echo $_SESSION['user_profile_image'].'?>" alt="profile_image">'
          ?>
        </div>
        <div class="user-profile-name">
            <a href="<?php echo URLROOT; ?>/commons/userDashboardRedirect"><?php echo $_SESSION['user_name']; ?></a>
        </div>
      </div>

      <!-- log out -->
      <a class="active" href="<?php echo URLROOT; ?>/commons/logout">Log Out</a>
      
    <?php else: ?>
      <!-- register -->
      <a class="active" href="<?php echo URLROOT; ?>/commons/registerredirect">Register</a>

      <!-- log in -->
      <a class="active" href="<?php echo URLROOT; ?>/commons/login">Log In</a>
    <?php endif; ?>
  </div>
</div>