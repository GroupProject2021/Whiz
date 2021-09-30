<?php

class C_S_Settings extends Controller {
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
                $uniData = this->settingsModel->getUniversityDetails($org_id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'name' => $organizationData->name,
                    'address' => $organizationData->address,
                    'email' => $organizationData->email,
                    'password' => $organizationData->password,
                    'phn_no' => $organizationData->phn_no,
                    'website' => $organizationData->website_address,
                    'founder' => $organizationData->founder,
                    'found_year' => $organizationData->founded_year,

                    'approval' => $uniData->ugc_approval,
                    'rank' => $uniData->world_rank,
                    'amount' => $uniData->student_amount,
                    'rate' => $uniData->graduate_job_rate,
                    'description' => $uniData->description,
                    'type' => $uniData->uni_type
                ];

                $this->view('organization/opt_settings/v_organization_profile', $data);
                break;

            // For Company
            case 'Company':
                $comData = this->settingsModel->getCompanyDetails($org_id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'name' => $organizationData->name,
                    'address' => $organizationData->address,
                    'email' => $organizationData->email,
                    'password' => $organizationData->password,
                    'phn_no' => $organizationData->phn_no,
                    'website' => $organizationData->website_address,
                    'founder' => $organizationData->founder,
                    'found_year' => $organizationData->founded_year,

                    'cur_emp' => $comData->cur_emp,
                    'size' => $comData->size,
                    'registered' => $comData->registered,
                    'overview' => $comData->overview,
                    'service' => $comData->service
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
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
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

                'profile_image_err' => '',
                'uniname_err' => '',
                'address_err' => '',
                'email_err' => '',
                'password_err' => '',
                'confirm_password_err' => '',
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

            // validate and upload profile image
            if(uploadImage($data['profile_image']['tmp_name'], $data['profile_image_name'], '/profileimages/organization/')) {
                flash('profile_image_upload', 'Profile picture uploaded successfully');
            }
            else {
                // upload unsuccessfull
                $data['profile_image_err'] = 'Profile picture uploading unsuccessful';
            }

            // Validate name
            if(empty($data['uniname'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate address
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate email
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
            }

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
            if(empty($data['profile_image_err']) && empty($data['uniname_err']) && empty($data['address_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) 
            && empty($data['phn_no_err']) && empty($data['website_err']) && empty($data['founded_year_err']) && empty($data['founder_err']) && empty($data['approved_err']) 
            && empty($data['rank_err']) && empty($data['amount_err']) && empty($data['rate_err']) && empty($data['descrip_err']) && empty($data['type_err']) ) {
                // Validated           
                $id = $this->settingsModel->findOrganizationIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateUniversitySettings($id, $data)) {
                    flash('settings_message', 'University data updated');
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
            $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $studentData = $this->settingsModel->getStudentDetails($id);

            $data = [
                'name' => $studentData->name,
                'email' => $studentData->email,
                'password' => $studentData->password,
                'gender' => $studentData->gender,
                'date_of_birth' => $studentData->date_of_birth,
                'address' => $studentData->address,
                'phn_no' => $studentData->phn_no,

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'gender_err' => '',
                'date_of_birth_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];
        }

        $this->view('organization/opt_settings/edit/v_edit_org_settings', $data);
    }

    public function editSettingsCompany() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = [
                'district_list' => $district_list,
                'ol_subject_list' => $ol_subject_list,

                'ol_school' => trim($_POST['ol_school']),
                'ol_district' => trim($_POST['ol_district']),
                'ol_sub1_id' => $_POST['religion'],
                'radio_religion' => $_POST['radio_religion'],
                'ol_sub2_id' => $_POST['primary_language'],
                'radio_primary_language' => $_POST['radio_primary_language'],
                'ol_sub3_id' => $_POST['secondary_language'],
                'radio_secondary_language' => $_POST['radio_secondary_language'],
                'ol_sub4_id' => $_POST['history'],
                'radio_history' => $_POST['radio_history'],
                'ol_sub5_id' => $_POST['science'],
                'radio_science' => $_POST['radio_science'],
                'ol_sub6_id' => $_POST['mathematics'],
                'radio_mathematics' => $_POST['radio_mathematics'],
                'ol_sub7_id' => $_POST['basket1'],
                'radio_basket_1' => $_POST['radio_basket_1'],
                'ol_sub8_id' => $_POST['basket2'],
                'radio_basket_2' => $_POST['radio_basket_2'],
                'ol_sub9_id' => $_POST['basket3'],
                'radio_basket_3' => $_POST['radio_basket_3'],
                
                'ol_school_err' => '',
                'ol_district_err' => '',
                'ol_results_err' => ''
            ];

            // Validate OL school
            if(empty($data['ol_school'])) {
                $data['ol_school_err'] = 'Please enter your OL school name';
            }

            // Validate OL district
            if(empty($data['ol_district'])) {
                $data['ol_district_err'] = 'Please enter your OL district';
            }

            // Validate Ol results
            if(empty($data['radio_religion']) || empty($data['radio_primary_language']) || empty($data['radio_secondary_language']) ||
                empty($data['radio_history']) || empty($data['radio_science']) || empty($data['radio_mathematics']) ||
                empty($data['radio_basket_1']) || empty($data['radio_basket_2']) || empty($data['radio_basket_3'])) {
                    $data['ol_results_err'] = 'Please check whether you have selected all the ol result check boxes';
            }

            // Make sure all errors are empty
            if(empty($data['ol_school_err']) && empty($data['ol_district_err']) && empty($data['ol_results_err'])) {
                // Validated                    
                $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateStudentOLSettings($id, $data)) {
                    flash('settings_message', 'OL data updated');
                    redirect('C_S_Settings/settings');
                }
                else {
                    die('Something went wrong');
                }            
            }
            else {
                // Load with errors
                $this->view('students/opt_settings/edit/v_edit_ol_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $studentData = $this->settingsModel->getStudentOLDetails($id);

            // Init data
            $data = [
                'district_list' => $district_list,
                'ol_subject_list' => $ol_subject_list,

                'ol_school' => $studentData->ol_school,
                'ol_district' => $studentData->ol_district,
                'ol_sub1_id' => $studentData->ol_sub1_id,
                'radio_religion' => $studentData->ol_sub1_grade,
                'ol_sub2_id' => $studentData->ol_sub2_id,
                'radio_primary_language' => $studentData->ol_sub2_grade,
                'ol_sub3_id' => $studentData->ol_sub3_id,
                'radio_secondary_language' => $studentData->ol_sub3_grade,
                'ol_sub4_id' => $studentData->ol_sub4_id,
                'radio_history' => $studentData->ol_sub4_grade,
                'ol_sub5_id' => $studentData->ol_sub5_id,
                'radio_science' => $studentData->ol_sub5_grade,
                'ol_sub6_id' => $studentData->ol_sub6_id,
                'radio_mathematics' => $studentData->ol_sub6_grade,
                'ol_sub7_id' => $studentData->ol_sub7_id,
                'radio_basket_1' => $studentData->ol_sub7_grade,
                'ol_sub8_id' => $studentData->ol_sub8_id,
                'radio_basket_2' => $studentData->ol_sub8_grade,
                'ol_sub9_id' => $studentData->ol_sub9_id,
                'radio_basket_3' => $studentData->ol_sub9_grade,

                'ol_school_err' => '',
                'ol_district_err' => '',
                'ol_results_err' => ''
            ];
        }

        $this->view('students/opt_settings/edit/v_edit_ol_settings', $data);
    }

    public function editSettingsAL() {
        $district_list = $this->settingsModel->getDistricts();
        $stream_list = $this->settingsModel->getStreams();
        $al_subject_list = $this->settingsModel->getALSubjects();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            // Init data
            $data = [
                'district_list' => $district_list,
                'stream_list' => $stream_list,
                'al_subject_list' => $al_subject_list,                    

                'al_school' => trim($_POST['al_school']),
                'stream' => trim($_POST['stream']),
                'z_score' => trim($_POST['z_score']),
                'al_district' => trim($_POST['al_district']),
                'general_test_grade' => trim($_POST['general_test_grade']),
                'radio_general_english' => $_POST['radio_general_english'],
                'al_sub1_id' => $_POST['subject1'],
                'radio_subject_1' => $_POST['radio_subject_1'],
                'al_sub2_id' => $_POST['subject2'],
                'radio_subject_2' => $_POST['radio_subject_2'],
                'al_sub3_id' => $_POST['subject3'],
                'radio_subject_3' => $_POST['radio_subject_3'],

                'al_school_err' => '',
                'stream_err' => '',
                'z_score_err' => '',
                'al_district_err' => '',
                'general_test_grade_err' => '',
                'radio_general_english_err' => '',
                'al_results_err' => ''
            ];

            // Validate AL school
            if(empty($data['al_school'])) {
                $data['al_school_err'] = 'Please enter your AL school name';
            }

            // Validate stream
            if(empty($data['stream'])) {
                $data['stream_err'] = 'Please enter your stream';
            }

            // Validate z score
            if(empty($data['z_score'])) {
                $data['z_score_err'] = 'Please enter your z score';
            }

            // Validate AL district
            if(empty($data['al_district'])) {
                $data['al_district_err'] = 'Please enter your AL district';
            }

            // Validate general test grade
            if(empty($data['radio_general_english'])) {
                $data['radio_general_english_err'] = 'Please enter your general test grade';
            }

            // Validate general english grade
            if(empty($data['general_english_grade'])) {
                $data['general_english_grade_err'] = 'Please enter your english grade';
            }

            if(empty($data['radio_subject_1']) || empty($data['radio_subject_2']) || empty($data['radio_subject_3'])) {
                $data['al_results_err'] = 'Please check whether you have selected all the al result check boxes';
            }

            // Make sure all errors are empty
            if(empty($data['al_school_err']) && empty($data['stream_err']) && empty($data['z_score_err'])
                && empty($data['al_district_err']) && empty($data['general_test_grade_err']) && empty($data['radio_general_english_err'])
                && empty($data['al_results_err'])) {
                // Validated                    
                $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateStudentALSettings($id, $data)) {
                    flash('settings_message', 'AL data updated');
                    redirect('C_S_Settings/settings');
                }
                else {
                    die('Something went wrong');
                }                  
            }
            else {
                // Load view with errors
                $this->view('students/opt_settings/edit/v_edit_al_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $studentData = $this->settingsModel->getStudentALDetails($id);

            // Init data
            $data = [
                'district_list' => $district_list,
                'stream_list' => $stream_list,
                'al_subject_list' => $al_subject_list, 

                'al_school' => $studentData->al_school,
                'stream' => $studentData->stream,
                'z_score' => $studentData->z_score,
                'al_district' => $studentData->al_district,
                'general_test_grade' => $studentData->al_general_test_grade,
                'radio_general_english' => $studentData->al_general_english_grade,  
                'al_sub1_id' => $studentData->al_sub1_id,                  
                'radio_subject_1' => $studentData->al_sub1_grade,
                'al_sub2_id' => $studentData->al_sub2_id,
                'radio_subject_2' => $studentData->al_sub2_grade,
                'al_sub3_id' => $studentData->al_sub3_id,
                'radio_subject_3' => $studentData->al_sub3_grade,

                'al_school_err' => '',
                'stream_err' => '',
                'z_score_err' => '',
                'al_district_err' => '',
                'general_test_grade_err' => '',
                'radio_general_english_err' => '',
                'al_results_err' => ''
            ];
        }

        $this->view('students/opt_settings/edit/v_edit_al_settings', $data);
    }

    public function editSettingsUG() {
        $uni_type_list = $this->settingsModel->getUniTypes();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'uni_type_list' => $uni_type_list,

                'uni_type' => $_POST['uni_type'],
                'degree' => trim($_POST['degree']),
                'uni_name' => trim($_POST['uni_name']),
                'gpa' => trim($_POST['gpa']),

                'degree_err' => '',
                'uni_name_err' => '',
                'gpa_err' => ''
            ];

            // Validate
            if(empty($data['degree'])) {
                $data['degree_err'] = 'Please enter degree name';
            }

            if(empty($data['uni_name'])) {
                $data['uni_name_err'] = 'Please enter university name';
            }

            if(empty($data['gpa'])) {
                $data['gpa_err'] = 'Please enter gpa';
            }

            // Make sure no errors
            if(empty($data['degree_err']) && empty($data['uni_name_err']) && empty($data['gpa_err'])) {
                // Validated                    
                $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateStudentUGSettings($id, $data)) {
                    flash('settings_message', 'University data updated');
                    redirect('C_S_Settings/settings');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('students/opt_settings/edit/v_edit_ug_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $studentData = $this->settingsModel->getStudentUniversity($id);

            $data = [
                'uni_type_list' => $uni_type_list,

                'uni_type' => $studentData->uni_type,
                'degree' => $studentData->degree,
                'uni_name' => $studentData->uni_name,
                'gpa' => $studentData->gpa,

                'degree_err' => '',
                'uni_name_err' => '',
                'gpa_err' => ''
            ];
        }       

        $this->view('students/opt_settings/edit/v_edit_ug_settings', $data);
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
                $this->view('students/opt_settings/v_student_profile', $data);
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
            $this->view('students/opt_settings/v_student_profile', $data);
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