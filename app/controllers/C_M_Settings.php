<?php 

class C_M_Settings extends Controller{
    public function __construct() {
        $this->mentorSettingsModel = $this->model('M_M_Settings');        
        $this->commonModel = $this->model('Common');
    }

    // Settings
    public function settings($id, $viewer){
        // $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
        $userData = $this->mentorSettingsModel->getUserDetails($id);

        // settings redirection
        profileRedirect('Mentor', $userData->actor_type, $id);

        $followerCount = $this->countFollowers($id);
        $followingCount = $this->countFollowings($id);
        $isAlreadyFollow = $this->checkFollowability($id);
        $socialData = $this->mentorSettingsModel->getSocialPlatformData($id);
        
        // privacy shield related 
        $locked = $this->accSettingsModel->isUserLockedProfile($id);

        if($locked) {
            // check whether the viewer is in the following list of the profile owner
            if($this->accSettingsModel->checkViewerIsAFollowerOrNot($id, $viewer)) {
                // viewer is followed by the profile owner --> then the content is visible if locked
                $isGenDetailsLocked = false;
                $isSocDetailsLocked = false;
            }
            else {
                // view is not followed by the profile owner --> then the content is visible if it is unlocked at the shield options
                $settings = $this->accSettingsModel->getSettings($id);

                $isGenDetailsLocked = $settings->is_pri_gen_details_visible;
                $isSocDetailsLocked = $settings->is_pri_soc_details_visible;
            }
        }
        else {
            $isGenDetailsLocked = false;
            $isSocDetailsLocked = false;
        }

        // report check (wheter the view already reported the viewing profile or not)
        $isAlreadyReported = $this->commonModel->getIsReportedOrNnot($id, $viewer);

        switch($userData->specialized_actor_type) {
            // For Professional guider
            case 'Professional Guider':
               $mentorData = $this->mentorSettingsModel->getMentorDetails($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $mentorData->first_name,
                    'last_name' => $mentorData->last_name,
                    'email' => $mentorData->email,
                    'gender' => $mentorData->gender,
                    'institute' => $mentorData->institute,
                    'address' => $mentorData->address,
                    'phn_no' => $mentorData->phn_no,
                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData,

                    'is_already_reported' => $isAlreadyReported
                ];

                $this->view('mentors/opt_settings/v_proguider_profile', $data);
                break;
            // For Teacher
            case 'Teacher':
               $mentorData = $this->mentorSettingsModel->getMentorDetails($id);
 
                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $mentorData->first_name,
                    'last_name' => $mentorData->last_name,
                    'email' => $mentorData->email,
                    'gender' => $mentorData->gender,
                    'address' => $mentorData->address,
                    'phn_no' => $mentorData->phn_no,
                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData,

                    'is_already_reported' => $isAlreadyReported
                ];
 
                $this->view('mentors/opt_settings/v_teacher_profile', $data);
                break;            
            default:
                break;
        }
    }


    // Edit professional guider settings
    public function editSettingsGuider() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'first_name' => trim($_POST['first_name']),                
                'last_name' => trim($_POST['last_name']),
                'gender' => trim($_POST['gender']),
                'institute' => trim($_POST['institute']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),

                'name_err' => '',
                'gender_err' => '',
                'institute_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];

            // Validate first name
            if(empty($data['first_name']) || empty($data['last_name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate gender
            if(empty($data['gender'])) {
                $data['gender_err'] = 'Please enter gender';
            }

            // Validate institute
            if(empty($data['institute'])) {
                $data['institute_err'] = 'Please enter institute';
            }

            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate phone number
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['gender_err'])
                && empty($data['institute_err']) && empty($data['address_err']) && empty($data['phn_no_err'])) {
                // Validated                    
                $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
                if($this->mentorSettingsModel->updateGuiderSettings($id, $data)) {
                    flash('settings_message', 'Profile data updated');
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_M_Settings/settings/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_settings/edit/v_edit_guider_settings', $data);
            }
        }
        else {
            $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $mentorData = $this->mentorSettingsModel->getMentorDetails($id);

            $data = [
                'first_name' => $mentorData->first_name,
                'last_name' => $mentorData->last_name,
                'gender' => $mentorData->gender,
                'institute' => $mentorData->institute,
                'address' => $mentorData->address,
                'phn_no' => $mentorData->phn_no,

                'name_err' => '',
                'gender_err' => '',
                'institute_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];
        }

        $this->view('mentors/opt_settings/edit/v_edit_guider_settings', $data);
    }

    // Edit teacher settings
    public function editSettingsTeacher() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'gender' => trim($_POST['gender']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),

                'name_err' => '',
                'gender_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];

            // Validate first name
            if(empty($data['first_name']) || empty($data['last_name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate gender
            if(empty($data['gender'])) {
                $data['gender_err'] = 'Please enter gender';
            }

            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate phone number
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['gender_err'])
                && empty($data['address_err']) && empty($data['phn_no_err'])) {
                // Validated                    
                $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
                if($this->mentorSettingsModel->updateTeacherSettings($id, $data)) {
                    flash('settings_message', 'Profile data updated');
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_M_Settings/settings/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_settings/edit/v_edit_teacher_settings', $data);
            }
        }
        else {
            $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $mentorData = $this->mentorSettingsModel->getMentorDetails($id);

            $data = [
                'first_name' => $mentorData->first_name,
                'last_name' => $mentorData->last_name,
                'gender' => $mentorData->gender,
                'address' => $mentorData->address,
                'phn_no' => $mentorData->phn_no,

                'name_err' => '',
                'gender_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];
        }

        $this->view('mentors/opt_settings/edit/v_edit_teacher_settings', $data);
    }

    // Edit profile picture
    public function editProfilePic() {
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'profile_image' => $_FILES['profile_image'],
                'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],

                'profile_image_err' => ''
            ];

            // validate and upload profile image
            $oldImage = PUBROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'];

            if(updateImage($oldImage, $data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/mentor/')) {
                flash('profile_image_upload', 'Profile picture uploaded successfully');
            }
            else {
                // upload unsuccessfull
                $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
            }

            // Make sure errors are empty
            if(empty($data['profile_image_err'])) {
                // Validated
                // Register User
                if($this->mentorSettingsModel->updateProfilePic($data)) {
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_M_Settings/settings/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_settings/default/v_def_guider_settings', $data);
            }
        }
        else {
            // Init data
            $data = [
                'profile_image' => '',
                'profile_image_name' => '',

                'profile_image_err' => ''
            ];

            // Load view
            $this->view('mentors/opt_settings/default/v_def_guider_settings', $data);
        }
    }


    // updates
    public function updateUserSessions($id) {
        $user = $this->mentorSettingsModel->getUserDetails($id);

        // taken from the database
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_profile_image'] = $user->profile_image;
        $_SESSION['user_name'] = $user->first_name;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['actor_type'] = $user->actor_type;
        $_SESSION['specialized_actor_type'] = $user->specialized_actor_type;
        $_SESSION['status'] = $user->status;
    }


    // followers & followings
    public function countFollowers($id) {
        $count = $this->mentorSettingsModel->getFollowerCount($id);

        return $count;
    }

    public function countFollowings($id) {
        $count = $this->mentorSettingsModel->getFollowingCount($id);

        return $count;
    }

    public function checkFollowability($id) {
        $me = $_SESSION['user_id'];

        return $this->mentorSettingsModel->isAlreadyFollow($me, $id);
    }

    // add social profile links
    public function isSocialPlatformDataExist($id) {
        $result = $this->mentorSettingsModel->isSocialPlatformDataExist($id);

        return $result;
    }

    public function addSocialProfileDetails($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'facebook' => trim($_POST['facebook']),
                'linkedin' => trim($_POST['linkedin']),
                'twitter' => trim($_POST['twitter']),
                'instagram' => trim($_POST['instagram']),
                'medium' => trim($_POST['medium']),
                'printerest' => trim($_POST['printerest']),
                'youtube' => trim($_POST['youtube']),
                'reddit' => trim($_POST['reddit']),

                'facebook_err' => '',
                'linkedin_err' => '',
                'twitter_err' => '',
                'instagram_err' => '',
                'medium_err' => '',
                'printerest_err' => '',
                'youtube_err' => '',
                'reddit_err' => ''
            ];

            // Validate gender
            if(empty($data['facebook_err'])) {
                
            }

            // Validate date of birth
            if(empty($data['linkedin_err'])) {
                
            }

            // Validate address
            if(empty($data['twitter_err'])) {
                
            }

            // Validate phone number
            if(empty($data['instagram_err'])) {
                
            }

            // Make sure no errors
            if(empty($data['facebook_err']) && empty($data['linkedin_err']) && empty($data['twitter_err']) && empty($data['instagram_err'])) {
                // Validated
                if($this->mentorSettingsModel->addSocialPlatformData($id, $data)) {
                    flash('settings_message', 'Social profile data added');
                    //$this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_M_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_settings/v_add_socialdata', $data);
            }
        }
        else {
            $data = [
                'facebook' => '',                
                'linkedin' => '',
                'twitter' => '',
                'instagram' => '',
                'medium' => '',                
                'printerest' => '',
                'youtube' => '',
                'reddit' => '',

                'facebook_err' => '',
                'linkedin_err' => '',
                'twitter_err' => '',
                'instagram_err' => '',
                'medium_err' => '',
                'printerest_err' => '',
                'youtube_err' => '',
                'reddit_err' => ''
            ];
        }

        $this->view('mentors/opt_settings/v_add_socialdata', $data);
    }

    public function updateSocialProfileDetails($id) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'facebook' => trim($_POST['facebook']),
                'linkedin' => trim($_POST['linkedin']),
                'twitter' => trim($_POST['twitter']),
                'instagram' => trim($_POST['instagram']),
                'medium' => trim($_POST['medium']),
                'printerest' => trim($_POST['printerest']),
                'youtube' => trim($_POST['youtube']),
                'reddit' => trim($_POST['reddit']),

                'facebook_err' => '',
                'linkedin_err' => '',
                'twitter_err' => '',
                'instagram_err' => '',
                'medium_err' => '',
                'printerest_err' => '',
                'youtube_err' => '',
                'reddit_err' => ''
            ];

            // Validate gender
            if(empty($data['facebook_err'])) {
                
            }

            // Validate date of birth
            if(empty($data['linkedin_err'])) {
                
            }

            // Validate address
            if(empty($data['twitter_err'])) {
                
            }

            // Validate phone number
            if(empty($data['instagram_err'])) {
                
            }

            // Make sure no errors
            if(empty($data['facebook_err']) && empty($data['linkedin_err']) && empty($data['twitter_err']) && empty($data['instagram_err'])) {
                // Validated
                if($this->mentorSettingsModel->updateSocialPlatformData($id, $data)) {
                    flash('settings_message', 'Social profile data updated');
                    //$this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_M_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('mentors/opt_settings/edit/v_edit_socialdata', $data);
            }
        }
        else {
            $socialData = $this->mentorSettingsModel->getSocialPlatformData($id);

            $data = [
                'facebook' => $socialData->facebook,                
                'linkedin' => $socialData->linkedin,   
                'twitter' => $socialData->twitter,   
                'instagram' => $socialData->instagram,   
                'medium' => $socialData->medium,                
                'printerest' => $socialData->printerest,   
                'youtube' => $socialData->youtube,   
                'reddit' => $socialData->reddit,   

                'facebook_err' => '',
                'linkedin_err' => '',
                'twitter_err' => '',
                'instagram_err' => '',
                'medium_err' => '',
                'printerest_err' => '',
                'youtube_err' => '',
                'reddit_err' => ''
            ];
        }

        $this->view('mentors/opt_settings/edit/v_edit_socialdata', $data);
    }

}

?>