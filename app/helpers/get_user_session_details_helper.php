<?php
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
        return '';
      }
    }
?>