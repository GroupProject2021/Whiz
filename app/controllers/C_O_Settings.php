<?php

class C_O_Settings extends Controller {
    public function __construct() {
        $this->settingsModel = $this->model('M_O_Setting');
    }

    public function test() {
        $data = [];
        $this->view('organization/opt_settings/v_organization_profile', $data);
    }

     // Settings
     public function settings($id) {
        // $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
        $userData = $this->settingsModel->getUserDetails($id);
        $followerCount = $this->countFollowers($id);
        $followingCount = $this->countFollowings($id);
        $isAlreadyFollow = $this->checkFollowability($id);

        $org_id = $this->settingsModel->findOrganizationIdbyEmail($userData->email);
        $organizationData = $this->settingsModel->getOrganizationDetails($org_id);

        switch($userData->specialized_actor_type) {
            // For University
            case 'University':
                $uniData = $this->settingsModel->getUniversityDetails($org_id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'uniname' => $organizationData->org_name,
                    'address' => $organizationData->address,
                    'email' => $organizationData->email,
                    //'password' => $organizationData->password,
                    'phn_no' => $organizationData->phone_no,
                    'website' => $organizationData->website_address,
                    'founder' => $organizationData->founder,
                    'founded_year' => $organizationData->founded_year,

                    'approval' => $uniData->ugc_approval,
                    'rank' => $uniData->world_rank,
                    'amount' => $uniData->student_amount,
                    'rate' => $uniData->graduate_job_rate,
                    'descrip' => $uniData->description,
                    'type' => $uniData->uni_type
                ];

                $this->view('organization/opt_settings/v_organization_profile', $data);
                break;

            // For Company
            case 'Company':
                $comData = $this->settingsModel->getCompanyDetails($org_id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'comname' => $organizationData->name,
                    'address' => $organizationData->address,
                    'email' => $organizationData->email,
                    //'password' => $organizationData->password,
                    'phn_no' => $organizationData->phn_no,
                    'website' => $organizationData->website_address,
                    'founder' => $organizationData->founder,
                    'founded_year' => $organizationData->founded_year,

                    'cur_emp' => $comData->cur_emp,
                    'size' => $comData->size,
                    'registered' => $comData->registered,
                    'overview' => $comData->overview,
                    'services' => $comData->services
                ];

                $this->view('organization/opt_settings/v_organization_profile', $data);
                break;
        }
        
    }


    // editings
    public function editSettingsUniversity() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'uniname' => trim($_POST['uniname']),
                'address' => trim($_POST['address']),
                //'email' => trim($_POST['email']),
                //'password' => trim($_POST['password']),
                //'confirm_password' => trim($_POST['confirm_password']),
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
                //'email_err' => '',
                //'password_err' => '',
                //'confirm_password_err' => '',
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

            /*// Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            else if (!str_contains($data['email'],'@')){
                $data['email_err'] = 'Enter valid email'; 
            }
            // Check email
            else if($this->commonModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken'; 
            }

            // Validata password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            else if(strlen($data['password']) < 8) {
                $data['password_err'] = 'Password must be having at least 8 characters';
            }
            else {
                if(!preg_match('@[0-9]@', $data['password'])) {
                    $data['password_err'] = 'Please must be having at least one number';
                }

                if(!preg_match('@[A-Z]@', $data['password'])) {
                    $data['password_err'] = 'Password must be having at least one uppercase letter';
                }
                
                if(!preg_match('@[^\w]@', $data['password'])) {
                    $data['password_err'] = 'Password must be having at least 1 special character';
                }
            }

            // Validata confirm password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            }
            else if($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }*/

            // Validate phone number
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
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

            // Validate description
            if(empty($data['descrip'])) {
                $data['descrip_err'] = 'Please enter description';
            }

            // Validate type
            if(empty($data['type'])) {
                $data['type_err'] = 'Please select company type';
            }

            // Make sure errors are empty
            if(empty($data['uniname_err']) && empty($data['address_err']) && empty($data['phn_no_err']) && empty($data['website_err']) 
            && empty($data['founded_year_err']) && empty($data['founder_err']) && empty($data['approved_err']) && empty($data['rank_err']) 
            && empty($data['amount_err']) && empty($data['rate_err']) && empty($data['descrip_err']) && empty($data['type_err']) ) {
                // Validated           
                //$id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateUniversitySettings($_SESSION['user_id'], $data)) {
                    flash('settings_message', 'University data updated');
                    $this->updateUserSessions($_SESSION['user_id']);
                    redirect('C_O_Settings/settings');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/v_edit_org_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $orgData = $this->settingsModel->getOrganizationDetails($id);
            $uniData = $this->settingsModel->getUniversityDetails($id);

            $data = [
                'uniname' => $orgData->org_name,
                'address' => $orgData->address,
                //'email' => trim($_POST['email']),
                //'password' => trim($_POST['password']),
                //'confirm_password' => trim($_POST['confirm_password']),
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
                //'email_err' => '',
                //'password_err' => '',
                //'confirm_password_err' => '',
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

        $this->view('organization/opt_settings/v_edit_org_settings', $data);
    }

    public function editSettingsCompany() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'comname' => trim($_POST['comname']),
                'address' => trim($_POST['address']),
                //'email' => trim($_POST['email']),
                //'password' => trim($_POST['password']),
                //'confirm_password' => trim($_POST['confirm_password']),
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
                //'email_err' => '',
                //'password_err' => '',
                //'confirm_password_err' => '',
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

            /*// Validate email
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }
            else if (!str_contains($data['email'],'@')){
                $data['email_err'] = 'Enter valid email'; 
            }
            // Check email
            else if($this->commonModel->findUserByEmail($data['email'])) {
                $data['email_err'] = 'Email is already taken'; 
            }

            // Validata password
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            else if(strlen($data['password']) < 8) {
                $data['password_err'] = 'Password must be having at least 8 characters';
            }
            else {
                if(!preg_match('@[0-9]@', $data['password'])) {
                    $data['password_err'] = 'Please must be having at least one number';
                }

                if(!preg_match('@[A-Z]@', $data['password'])) {
                    $data['password_err'] = 'Password must be having at least one uppercase letter';
                }
                
                if(!preg_match('@[^\w]@', $data['password'])) {
                    $data['password_err'] = 'Password must be having at least 1 special character';
                }
            }

            // Validata confirm password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = 'Please confirm password';
            }
            else if($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = 'Passwords do not match';
            }*/

            // Validate phone number
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
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

            // Validate registered
            if(empty($data['registered'])) {
                $data['registered_err'] = 'Please select registered or not';
            }

            // Validate current emp
            if(empty($data['cur_emp'])) {
                $data['cur_emp_err'] = 'Please enter no. of employees';
            }

            // Validate emp amount
            if(empty($data['emp_size'])) {
                $data['emp_size_err'] = 'Please enter employees amount';
            }
            else {
                if($data['emp_size'] < $data['cur_emp']) {
                    $data['emp_size_err'] = 'Please enter valid employees amount less than current employees';
                }
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
                //$id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateCompanySettings($_SESSION['user_id'], $data)) {
                    flash('settings_message', 'Company data updated');
                    $this->updateUserSessions($_SESSION['user_id']);
                    redirect('C_O_Settings/settings');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('organization/opt_settings/v_edit_org_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $orgData = $this->settingsModel->getOrganizationDetails($id);
            $comData = $this->settingsModel->getCompanyDetails($id);

            $data = [
                'comname' => $orgData->org_name,
                'address' => $orgData->address,
                //'email' => trim($_POST['email']),
                //'password' => trim($_POST['password']),
                //'confirm_password' => trim($_POST['confirm_password']),
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
                //'email_err' => '',
                //'password_err' => '',
                //'confirm_password_err' => '',
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

        $this->view('organization/opt_settings/v_edit_org_settings', $data);
    }

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

            if(updateImage($oldImage, $data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/student/')) {
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
                    // set the verification sent email                        
                    // sendVerificationCode($data['email']);

                    // Redirect
                    // flash('register_success', '<center>You are registered! <br> We sent a verification code to your email <br>'.$data['email'].'</center>');
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_S_Settings/settings');
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
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['actor_type'] = $user->actor_type;
        $_SESSION['specialized_actor_type'] = $user->specialized_actor_type;
        $_SESSION['status'] = $user->status;
    }

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