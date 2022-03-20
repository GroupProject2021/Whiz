<?php

class C_O_Settings extends Controller {
    public function __construct() {
        $this->settingsModel = $this->model('M_O_Setting');
        $this->accSettingsModel = $this->model('Account_Setting');
        $this->commonModel = $this->model('Common');

        $this->coursePostsPostModel = $this->model('Post_CoursePosts');
        $this->jobAdsPostModel = $this->model('Post_JobAds');
    }

     // Settings
     public function settings($id, $viewer) {
        // $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
        $userData = $this->settingsModel->getUserDetails($id);

        // settings redirection
        profileRedirect('Organization', $userData->actor_type, $id);

        // social platform details
        $socialData = $this->settingsModel->getSocialPlatformData($id);

        $followerCount = $this->countFollowers($id);
        $followingCount = $this->countFollowings($id);
        $isAlreadyFollow = $this->checkFollowability($id);

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
        
        // $org_id = $this->settingsModel->findOrganizationIdbyEmail($userData->email);
        $organizationData = $this->settingsModel->getOrganizationDetails($id);

        switch($userData->specialized_actor_type) {
            // For University
            case 'University':
                $uniData = $this->settingsModel->getUniversityDetails($id);
                $posts = $this->coursePostsPostModel->getPostsById($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $organizationData->first_name,
                    'last_name' => $organizationData->last_name,
                    'address' => $organizationData->address,
                    'email' => $organizationData->email,
                    'phn_no' => $organizationData->phone_no,
                    'website' => $organizationData->website_address,
                    'founder' => $organizationData->founder,
                    'founded_year' => $organizationData->founded_year,

                    'approval' => $uniData->ugc_approval,
                    'rank' => $uniData->world_rank,
                    'amount' => $uniData->student_amount,
                    'rate' => $uniData->graduate_job_rate,
                    'descrip' => $uniData->description,
                    'type' => $uniData->uni_type,

                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData,

                    'is_pri_gen_details_locked' => $isGenDetailsLocked,
                    'is_pri_soc_details_locked' => $isSocDetailsLocked,

                    'is_already_reported' => $isAlreadyReported,

                    'posts' => $posts
                ];

                $this->view('organization/opt_settings/v_organization_profile', $data);
                break;

            // For Company
            case 'Company':
                $comData = $this->settingsModel->getCompanyDetails($id);
                $posts = $this->jobAdsPostModel->getPostsById($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $organizationData->first_name,
                    'last_name' => $organizationData->last_name,
                    'address' => $organizationData->address,
                    'email' => $organizationData->email,
                    'phn_no' => $organizationData->phone_no,
                    'website' => $organizationData->website_address,
                    'founder' => $organizationData->founder,
                    'founded_year' => $organizationData->founded_year,

                    'cur_emp' => $comData->current_emplyee_amount,
                    'size' => $comData->company_size,
                    'registered' => $comData->registered,
                    'overview' => $comData->overview,
                    'services' => $comData->services,

                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData,

                    'is_pri_gen_details_locked' => $isGenDetailsLocked,
                    'is_pri_soc_details_locked' => $isSocDetailsLocked,

                    'is_already_reported' => $isAlreadyReported,

                    'posts' => $posts
                ];

                $this->view('organization/opt_settings/v_organization_profile', $data);
                break;
        }
        
    }


    // Edit university settings
    public function editSettingsUniversity() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'uniid' => trim($_POST['uniid']),
                'uniname' => trim($_POST['uniname']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),
                'website' => trim($_POST['website']),
                'founder' => trim($_POST['founder']),
                'founded_year' => trim($_POST['founded_year']),

                'approved' => trim($_POST['approved']),
                'rank' => trim($_POST['rank']),
                'amount' => trim($_POST['amount']),
                'rate' => trim($_POST['rate']),
                'descrip' => trim($_POST['descrip']),
                'type' => trim($_POST['type']),

                'uniname_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
                'website_err' => '',
                'founder_err' => '',
                'founded_year_err' => '',
                'approved_err' => '',
                'rank_err' => '',
                'amount_err' => '',
                'rate_err' => '',
                'descrip_err' => '',
                'type_err' => ''
            ];

            // Validate name
            if(empty($data['uniname'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate phone number
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
            }
            else if(strlen($data['phn_no']) != 10 || is_numeric($data['phn_no']) == false) {
                $data['phn_no_err'] = 'Please enter valid phone number';
            }

            // Validate website
            if(empty($data['website'])) {
                $data['website_err'] = 'Please enter website';
            }

            // Validate founder
            if(empty($data['founder'])) {
                $data['founder_err'] = 'Please enter founder';
            }

            // Validate founded_year
            if(empty($data['founded_year'])) {
                $data['founded_year_err'] = 'Please enter founded year';
            }
            else if(is_numeric($data['founded_year']) == false) {
                $data['founded_year_err'] = 'Please enter valid year';
            }

            // Validate approved
            if(empty($data['approved'])) {
                $data['approved_err'] = 'Please select approved or not';
            }

            // Validate rank
            if(empty($data['rank'])) {
                $data['rank_err'] = 'Please enter rank';
            }

            // Validate amount
            if(empty($data['amount'])) {
                $data['amount_err'] = 'Please enter student amount';
            }

            // Validate rate
            if(empty($data['rate'])) {
                $data['rate_err'] = 'Please enter rate';
            }
            else if(is_numeric($data['rate']) == false || $data['rate'] > 100) {
                $data['rate_err'] = 'Please enter valid rate';
            }

            // Validate description
            if(empty($data['descrip'])) {
                $data['descrip_err'] = 'Please enter description';
            }

            // Validate type
            if(empty($data['type'])) {
                $data['type_err'] = 'Please select university type';
            }

            // Make sure errors are empty
            if(empty($data['uniname_err']) && empty($data['address_err']) && empty($data['phn_no_err']) && empty($data['website_err']) 
            && empty($data['founded_year_err']) && empty($data['founder_err']) && empty($data['approved_err']) && empty($data['rank_err']) 
            && empty($data['amount_err']) && empty($data['rate_err']) && empty($data['descrip_err']) && empty($data['type_err']) ) {
                // Validated           
                if($this->settingsModel->updateUniversitySettings($_SESSION['user_id'], $data)) {
                    flash('settings_message', 'University data updated');
                    $this->updateUserSessions($_SESSION['user_id']);

                    redirect('C_O_Settings/settings/'.$data['uniid'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/edit/v_edit_university_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $orgData = $this->settingsModel->getOrganizationDetails($id);
            $uniData = $this->settingsModel->getUniversityDetails($id);

            $data = [
                'uniid' => $orgData->org_id,
                'uniname' => $orgData->first_name,
                'address' => $orgData->address,
                'phn_no' => $orgData->phone_no,
                'website' => $orgData->website_address,
                'founder' => $orgData->founder,
                'founded_year' => $orgData->founded_year,

                'approved' => $uniData->ugc_approval,
                'rank' => $uniData->world_rank,
                'amount' => $uniData->student_amount,
                'rate' => $uniData->graduate_job_rate,
                'descrip' => $uniData->description,
                'type' => $uniData->uni_type,

                'uniname_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
                'website_err' => '',
                'founder_err' => '',
                'founded_year_err' => '',
                'approved_err' => '',
                'rank_err' => '',
                'amount_err' => '',
                'rate_err' => '',
                'descrip_err' => '',
                'type_err' => ''
            ];
        }

        $this->view('organization/opt_settings/edit/v_edit_university_settings', $data);
    }

    // Edit company settings
    public function editSettingsCompany() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'comid' => trim($_POST['comid']),
                'comname' => trim($_POST['comname']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),
                'website' => trim($_POST['website']),
                'founder' => trim($_POST['founder']),
                'founded_year' => trim($_POST['founded_year']),

                'cur_emp' => trim($_POST['cur_emp']),
                'emp_size' => trim($_POST['emp_size']),
                'registered' => trim($_POST['registered']),
                'overview' => trim($_POST['overview']),
                'services' => trim($_POST['services']),

                'comname_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
                'website_err' => '',
                'founder_err' => '',
                'founded_year_err' => '',
                'cur_emp_err' => '',
                'emp_size_err' => '',
                'registered_err' => '',
                'overview_err' => '',
                'services_err' => ''
            ];

            // Validate name
            if(empty($data['comname'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate phone number
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
            }
            else if(strlen($data['phn_no']) != 10 || is_numeric($data['phn_no']) == false) {
                $data['phn_no_err'] = 'Please enter valid phone number';
            }

            // Validate website
            if(empty($data['website'])) {
                $data['website_err'] = 'Please enter website';
            }

            // Validate founder
            if(empty($data['founder'])) {
                $data['founder_err'] = 'Please enter founder';
            }

            // Validate founded_year
            if(empty($data['founded_year'])) {
                $data['founded_year_err'] = 'Please enter founded year';
            }
            else if(is_numeric($data['founded_year']) == false) {
                $data['founded_year_err'] = 'Please enter valid year';
            }

            // Validate registered
            if(empty($data['registered'])) {
                $data['registered_err'] = 'Please select registered or not';
            }

            // Validate current emp
            if(empty($data['cur_emp'])) {
                $data['cur_emp_err'] = 'Please enter no. of employees';
            }
            else if(is_numeric($data['cur_emp']) == false) {
                $data['cur_emp_err'] = 'Please enter valid amount';
            }

            // Validate emp amount
            if(empty($data['emp_size'])) {
                $data['emp_size_err'] = 'Please enter employees amount';
            }
            else if(is_numeric($data['emp_size']) == false) {
                $data['emp_size_err'] = 'Please enter valid amount';
            }
            else if($data['emp_size'] < $data['cur_emp']) {
                $data['emp_size_err'] = 'Please enter valid employees amount less than current employees';
            }

            // Validate overview
            if(empty($data['overview'])) {
                $data['overview'] = 'Please enter overview';
            }

            // Validate type
            if(empty($data['services'])) {
                $data['services_err'] = 'Please enter services';
            }


            // Make sure errors are empty
            if(empty($data['comname_err']) && empty($data['address_err']) && empty($data['phn_no_err']) && empty($data['website_err']) 
            && empty($data['founded_year_err']) && empty($data['founder_err']) && empty($data['cur_emp_err']) && empty($data['emp_size_err']) 
            && empty($data['registered_err']) && empty($data['overview_err']) && empty($data['services_err']) ) {
                // Validated           
                if($this->settingsModel->updateCompanySettings($_SESSION['user_id'], $data)) {
                    flash('settings_message', 'Company data updated');
                    $this->updateUserSessions($_SESSION['user_id']);

                    redirect('C_O_Settings/settings/'.$data['comid'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/edit/v_edit_company_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $orgData = $this->settingsModel->getOrganizationDetails($id);
            $comData = $this->settingsModel->getCompanyDetails($id);

            $data = [
                'comid' => $orgData->org_id,
                'comname' => $orgData->first_name,
                'address' => $orgData->address,
                'phn_no' => $orgData->phone_no,
                'website' => $orgData->website_address,
                'founder' => $orgData->founder,
                'founded_year' => $orgData->founded_year,

                'cur_emp' => $comData->current_emplyee_amount,
                'emp_size' => $comData->company_size,
                'registered' => $comData->registered,
                'overview' => $comData->overview,
                'services' => $comData->services,

                'comname_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
                'website_err' => '',
                'founder_err' => '',
                'founded_year_err' => '',
                'cur_emp_err' => '',
                'emp_size_err' => '',
                'registered_err' => '',
                'overview_err' => '',
                'services_err' => ''
            ];
        }

        $this->view('organization/opt_settings/edit/v_edit_company_settings', $data);
    }

    // I THINK THIS FUNCTION CAN BE REMOVED
    //delete account
    public function deleteAccount($id,$type) {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Check for owner
            if($id != $_SESSION['user_id']) {
                redirect('C_O_Settings/settings/'.$id.'/'.$_SESSION['user_id']);
            }

        
            // validate and upload profile image
            $proImage = PUBROOT.'/profileimages/organization/'.$_SESSION['user_profile_image'];
            $res1 = deleteImage($proImage);
            $res2 = $this->settingsModel->deleteAccount($id,$type);
            
            if($res1 && $res2) {
                //flash('post_message', 'Account Removed');
                unset($_SESSION['user_id']);
                unset($_SESSION['user_email']);
                unset($_SESSION['user_name']);
                unset($_SESSION['actor_type']);
                unset($_SESSION['specialized_actor_type']);
                unset($_SESSION['status']);
                unset($_SESSION['user_profile_image']);

                redirect('Whiz/index');
            }
            else {
                die('Something went wrong');
            }
        }
        else {
            redirect('C_O_Settings/settings/'.$id.'/'.$_SESSION['user_id']);
        }
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
                'user_id' => trim($_POST['user_id']),
                'profile_image' => $_FILES['profile_image'],
                'profile_image_name' => time().'_'.$_FILES['profile_image']['name'],

                'profile_image_err' => ''
            ];

            // validate and upload profile image
            $oldImage = PUBROOT.'/profileimages/'.getActorTypeForIcons($_SESSION['actor_type']).'/'.$_SESSION['user_profile_image'];

            if(updateImage($oldImage, $data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/organization/')) {
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
                if($this->settingsModel->updateProfilePic($data)) {
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_O_Settings/settings/'.$data['user_id'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/v_organization_profile', $data);
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
            $this->view('organization/opt_settings/v_organization_profile', $data);
        }
    }


    // updates
    public function updateUserSessions($id) {
        $user = $this->settingsModel->getUserDetails($id);

        // taken from the database
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_profile_image'] = $user->profile_image;
        $_SESSION['user_name'] = $user->first_name;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['actor_type'] = $user->actor_type;
        $_SESSION['specialized_actor_type'] = $user->specialized_actor_type;
        $_SESSION['status'] = $user->status;
    }


    // Followers & Followings
    public function countFollowers($id) {
        $count = $this->settingsModel->getFollowerCount($id);

        return $count;
    }

    public function countFollowings($id) {
        $count = $this->settingsModel->getFollowingCount($id);

        return $count;
    }

    public function checkFollowability($id) {
        $me = $_SESSION['user_id'];

        return $this->settingsModel->isAlreadyFollow($me, $id);
    }

    // add social profile links
    public function isSocialPlatformDataExist($id) {
        $result = $this->settingsModel->isSocialPlatformDataExist($id);

        return $result;
    }

    public function addSocialProfileDetails($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Organization'], ['University', 'Company']);

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
                if($this->settingsModel->addSocialPlatformData($id, $data)) {
                    flash('settings_message', 'Social profile data added');
                    //$this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_O_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/v_add_socialdata', $data);
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

        $this->view('organization/opt_settings/v_add_socialdata', $data);
    }

    public function updateSocialProfileDetails($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Organization'], ['University', 'Company']);
        
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
                if($this->settingsModel->updateSocialPlatformData($id, $data)) {
                    flash('settings_message', 'Social profile data updated');
                    //$this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_O_Settings/settings/'.$_SESSION['user_id'].'/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/edit/v_edit_socialdata', $data);
            }
        }
        else {
            $socialData = $this->settingsModel->getSocialPlatformData($id);

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

        $this->view('organization/opt_settings/edit/v_edit_socialdata', $data);
    }
}

?>