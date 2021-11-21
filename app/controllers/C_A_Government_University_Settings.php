<?php

class C_A_Government_University_Settings extends Controller {
    public function __construct() {
        $this->govUniModel = $this->model('M_A_Government_University_Settings');
    }

    // Profile management
    // Settings
    public function settings($id) {
        //$followerCount = $this->countFollowers($id);
        //$followingCount = $this->countFollowings($id);
        //$isAlreadyFollow = $this->checkFollowability($id);

        $uniData = $this->govUniModel->getGovUniversityDetails($id);
        $courseOfferingData = $this->govUniModel->getCourseOfferings($uniData->uni_name);

        $data = [
            //'followerCount' => $followerCount,                    
            //'followingCount' => $followingCount,
            //'isAlreadyFollow' => $isAlreadyFollow,
            'uni_name' => $uniData->uni_name,
            'description' => $uniData->description,
            'world_rank' => $uniData->world_rank,
            'student_amount' => $uniData->student_amount,
            'graduate_job_rate' => $uniData->graduate_job_rate,
            'logo' => $uniData->logo,
            'bg_img' => $uniData->bg_img,
            'course_offerings' => $courseOfferingData
        ];

        $this->view('admin/governmentUniversity/opt_settings/v_gov_university_profile', $data);        
    }

    // Edit university settings
    public function editSettingsGovUniversity() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
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

                    redirect('C_O_Settings/settings/'.$_SESSION['user_id']);
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
                    
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
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
}

?>