<?php
    session_start();

    // Flash message helper
    // EXAMPLE - flash('register_success', 'You are now registered', 'alert alert-success');
    // DISPLAY IN VIEW - <?php echo flash('register_success');
    function flash($name = '', $message = '', $class = 'form-flash') {
        if(!empty($name)) {
            if(!empty($message) && empty($_SESSION[$name])) {
                // Unsetting
                if(!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }

                if(!empty($_SESSION[$name.'_class'])) {
                    unset($_SESSION[$name.'_class']);
                }

                // Setting
                $_SESSION[$name] = $message;
                $_SESSION[$name.'_class'] = $class;
            }
            else if(empty($message) && !empty($_SESSION[$name])) {
                $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : '';
                echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
                unset($_SESSION[$name]);
                unset($_SESSION[$name.'_class']);
            }
        }
    }


    function isLoggedIn() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }
        else {
            return false;
        }
    }

    function getActorTypeForIcons($actorType) {
        switch($actorType) {
            case 'Student': 
                    return 'student';
                      break;
            case 'Organization': 
                    return 'organization';
                      break;
            case 'Mentor': 
                    return 'mentor';
                      break;
            case 'Admin':
                    return 'admin';
                      break;
            default: 
                      break;
          }
    }

    function getActorSpecializedTypeForIcons($actorType, $specializedActorType) {
      if($actorType == 'Student') {
        switch($specializedActorType) {
          case 'Beginner': 
                  return 'beginner';
                    break;
          case 'OL qualified': 
                  return 'olqualified';
                    break;
          case 'AL qualified': 
                  return 'alqualified';
                    break;
          case 'Undergraduate Graduate':
                  return 'undergradgrad';
                    break;
          default: 
                    break;
        }
      }
      else if($actorType == 'Organization') {
        switch($specializedActorType) {
          case 'University': 
                  return 'university';
                    break;
          case 'Company': 
                  return 'company';
                    break;
          default: 
                    break;
        }
      }
      else if($actorType == 'Mentor') {
        switch($specializedActorType) {
          case 'Professional Guider': 
                  return 'profguider';
                    break;
          case 'Teacher': 
                  return 'teacher';
                    break;
          default: 
                    break;
        }
      }
      else if($actorType == 'Admin') {
        // nothing to be returned
        return 'admin';
      }
    }
?>