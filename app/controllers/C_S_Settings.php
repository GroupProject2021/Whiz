<?php

class C_S_Settings extends Controller {
    public function __construct() {
        $this->settingsModel = $this->model('M_S_Settings');
    }

    // Settings
    public function settings($id) {
        // $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
        $userData = $this->settingsModel->getUserDetails($id);

        // settings redirection
        profileRedirect('Student', $userData->actor_type, $id);

        // social platform details
        $socialData = $this->settingsModel->getSocialPlatformData($id);

        $followerCount = $this->countFollowers($id);
        $followingCount = $this->countFollowings($id);
        $isAlreadyFollow = $this->checkFollowability($id);

        switch($userData->specialized_actor_type) {
            // For beginner
            case 'Beginner':
               $studentData = $this->settingsModel->getStudentDetails($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,                    
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $studentData->first_name,
                    'last_name' => $studentData->last_name,
                    'email' => $studentData->email,
                    'gender' => $studentData->gender,
                    'date_of_birth' => $studentData->date_of_birth,
                    'address' => $studentData->address,
                    'phn_no' => $studentData->phn_no,

                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData
                ];

                $this->view('students/opt_settings/v_student_profile', $data);
                break;
            // For OL qualified
            case 'OL qualified':
                $studentData = $this->settingsModel->getStudentDetails($id);
                $studentOLData = $this->settingsModel->getStudentOLDetails($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,            
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $studentData->first_name,
                    'last_name' => $studentData->last_name,
                    'email' => $studentData->email,
                    'gender' => $studentData->gender,
                    'date_of_birth' => $studentData->date_of_birth,
                    'address' => $studentData->address,
                    'phn_no' => $studentData->phn_no,

                    'ol_school' => $studentOLData->ol_school,
                    'ol_district' => $studentOLData->ol_district,
                    'ol_sub1_name' => $this->settingsModel->getOLSubjectName($studentOLData->ol_sub1_id),
                    'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                    'ol_sub2_name' => $this->settingsModel->getOLSubjectName($studentOLData->ol_sub2_id),
                    'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                    'ol_sub3_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub3_id),
                    'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                    'ol_sub4_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub4_id),
                    'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                    'ol_sub5_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub5_id),
                    'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                    'ol_sub6_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub6_id),
                    'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                    'ol_sub7_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub7_id),
                    'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                    'ol_sub8_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub8_id),
                    'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                    'ol_sub9_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub9_id),
                    'ol_sub9_grade' => $studentOLData->ol_sub9_grade,
                    
                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData
                ];

                $this->view('students/opt_settings/v_student_profile', $data);
                break;

            // For AL qualified
            case 'AL qualified':
                $studentData = $this->settingsModel->getStudentDetails($id);                    
                $studentOLData = $this->settingsModel->getStudentOLDetails($id);
                $studentALData = $this->settingsModel->getStudentALDetails($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,            
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $studentData->first_name,
                    'last_name' => $studentData->last_name,
                    'email' => $studentData->email,
                    'gender' => $studentData->gender,
                    'date_of_birth' => $studentData->date_of_birth,
                    'address' => $studentData->address,
                    'phn_no' => $studentData->phn_no,

                    'ol_school' => $studentOLData->ol_school,
                    'ol_district' => $studentOLData->ol_district,
                    'ol_sub1_name' => $this->settingsModel->getOLSubjectName($studentOLData->ol_sub1_id),
                    'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                    'ol_sub2_name' => $this->settingsModel->getOLSubjectName($studentOLData->ol_sub2_id),
                    'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                    'ol_sub3_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub3_id),
                    'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                    'ol_sub4_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub4_id),
                    'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                    'ol_sub5_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub5_id),
                    'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                    'ol_sub6_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub6_id),
                    'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                    'ol_sub7_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub7_id),
                    'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                    'ol_sub8_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub8_id),
                    'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                    'ol_sub9_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub9_id),
                    'ol_sub9_grade' => $studentOLData->ol_sub9_grade,

                    'al_school' => $studentALData->al_school,
                    'al_district' => $studentALData->al_district,
                    'stream' => $studentALData->stream,
                    'stream_name' => $this->settingsModel->getStreamNameById($studentALData->stream),
                    'z_score' => $studentALData->z_score,
                    'al_general_test_grade' => $studentALData->al_general_test_grade,
                    'al_general_english_grade' => $studentALData->al_general_english_grade,
                    'al_sub1_name' =>  $this->settingsModel->getALSubjectName($studentALData->al_sub1_id),
                    'al_sub1_grade' => $studentALData->al_sub1_grade,
                    'al_sub2_name' =>  $this->settingsModel->getALSubjectName($studentALData->al_sub2_id),
                    'al_sub2_grade' => $studentALData->al_sub2_grade,
                    'al_sub3_name' =>  $this->settingsModel->getALSubjectName($studentALData->al_sub3_id),
                    'al_sub3_grade' => $studentALData->al_sub3_grade,
                    
                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData
                ];

                $this->view('students/opt_settings/v_student_profile', $data);
                break;

            // For Undergraduate Graduate
            case 'Undergraduate Graduate':
                $studentData = $this->settingsModel->getStudentDetails($id);                    
                $studentOLData = $this->settingsModel->getStudentOLDetails($id);
                $studentALData = $this->settingsModel->getStudentALDetails($id);
                $uniData = $this->settingsModel->getStudentUniversity($id);

                $data = [
                    'user' => $userData,
                    'followerCount' => $followerCount,        
                    'followingCount' => $followingCount,
                    'isAlreadyFollow' => $isAlreadyFollow,
                    'first_name' => $studentData->first_name,
                    'last_name' => $studentData->last_name,
                    'email' => $studentData->email,
                    'gender' => $studentData->gender,
                    'date_of_birth' => $studentData->date_of_birth,
                    'address' => $studentData->address,
                    'phn_no' => $studentData->phn_no,

                    'ol_school' => $studentOLData->ol_school,
                    'ol_district' => $studentOLData->ol_district,
                    'ol_sub1_name' => $this->settingsModel->getOLSubjectName($studentOLData->ol_sub1_id),
                    'ol_sub1_grade' => $studentOLData->ol_sub1_grade,
                    'ol_sub2_name' => $this->settingsModel->getOLSubjectName($studentOLData->ol_sub2_id),
                    'ol_sub2_grade' => $studentOLData->ol_sub2_grade,
                    'ol_sub3_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub3_id),
                    'ol_sub3_grade' => $studentOLData->ol_sub3_grade,
                    'ol_sub4_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub4_id),
                    'ol_sub4_grade' => $studentOLData->ol_sub4_grade,
                    'ol_sub5_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub5_id),
                    'ol_sub5_grade' => $studentOLData->ol_sub5_grade,
                    'ol_sub6_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub6_id),
                    'ol_sub6_grade' => $studentOLData->ol_sub6_grade,
                    'ol_sub7_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub7_id),
                    'ol_sub7_grade' => $studentOLData->ol_sub7_grade,
                    'ol_sub8_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub8_id),
                    'ol_sub8_grade' => $studentOLData->ol_sub8_grade,
                    'ol_sub9_name' =>  $this->settingsModel->getOLSubjectName($studentOLData->ol_sub9_id),
                    'ol_sub9_grade' => $studentOLData->ol_sub9_grade,

                    'al_school' => $studentALData->al_school,
                    'al_district' => $studentALData->al_district,
                    'stream' => $studentALData->stream,
                    'stream_name' => $this->settingsModel->getStreamNameById($studentALData->stream),
                    'z_score' => $studentALData->z_score,
                    'al_general_test_grade' => $studentALData->al_general_test_grade,
                    'al_general_english_grade' => $studentALData->al_general_english_grade,
                    'al_sub1_name' =>  $this->settingsModel->getALSubjectName($studentALData->al_sub1_id),
                    'al_sub1_grade' => $studentALData->al_sub1_grade,
                    'al_sub2_name' =>  $this->settingsModel->getALSubjectName($studentALData->al_sub2_id),
                    'al_sub2_grade' => $studentALData->al_sub2_grade,
                    'al_sub3_name' =>  $this->settingsModel->getALSubjectName($studentALData->al_sub3_id),
                    'al_sub3_grade' => $studentALData->al_sub3_grade,

                    'uni_type' => $uniData->uni_type,
                    'uni_name' => $uniData->uni_name,
                    'degree' => $uniData->degree,
                    'gpa' => $uniData->gpa,
                    
                    'isSocialDataExist' => $this->isSocialPlatformDataExist($id),
                    'socialData' => $socialData
                ];

                $this->view('students/opt_settings/v_student_profile', $data);
                break;
            default:
                break;
        }
        
    }

    // change stream
    public function changeStream($streamId) {
        $res = $this->settingsModel->getALSubjectsById($streamId);

        echo json_encode($res);
    }

    // add social profile links
    public function isSocialPlatformDataExist($id) {
        $result = $this->settingsModel->isSocialPlatformDataExist($id);

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
                if($this->settingsModel->addSocialPlatformData($id, $data)) {
                    flash('settings_message', 'Social profile data added');
                    //$this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('students/opt_settings/add/v_add_socialdata', $data);
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

        $this->view('students/opt_settings/add/v_add_socialdata', $data);
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
                if($this->settingsModel->updateSocialPlatformData($id, $data)) {
                    flash('settings_message', 'Social profile data updated');
                    //$this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('students/opt_settings/edit/v_edit_socialdata', $data);
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

        $this->view('students/opt_settings/edit/v_edit_socialdata', $data);
    }


    // Edit beginner settings
    public function editSettingsBeginner() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'first_name' => trim($_POST['first_name']),
                'last_name' => trim($_POST['last_name']),
                'gender' => trim($_POST['gender']),
                'date_of_birth' => trim($_POST['date_of_birth']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),

                'name_err' => '',
                'gender_err' => '',
                'date_of_birth_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];

            // Validate name
            if(empty($data['first_name']) || empty($data['last_name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate gender
            if(empty($data['gender'])) {
                $data['gender_err'] = 'Please enter gender';
            }

            // Validate date of birth
            if(empty($data['date_of_birth'])) {
                $data['date_of_birth_err'] = 'Please enter date of birth';
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
                && empty($data['date_of_birth_err']) && empty($data['address_err']) && empty($data['phn_no_err'])) {
                // Validated                    
                $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateStudentSettings($id, $data)) {
                    flash('settings_message', 'Student data updated');
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('students/opt_settings/edit/v_edit_beg_settings', $data);
            }
        }
        else {
            $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
            // Get existing post from model                
            $studentData = $this->settingsModel->getStudentDetails($id);

            $data = [
                'first_name' => $studentData->first_name,                
                'last_name' => $studentData->last_name,
                'gender' => $studentData->gender,
                'date_of_birth' => $studentData->date_of_birth,
                'address' => $studentData->address,
                'phn_no' => $studentData->phn_no,

                'name_err' => '',
                'gender_err' => '',
                'date_of_birth_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];
        }

        $this->view('students/opt_settings/edit/v_edit_beg_settings', $data);
    }

    // Edit OL Qualified settings
    public function editSettingsOL() {
        $district_list = $this->settingsModel->getDistricts();
        $ol_subject_list = $this->settingsModel->getOLSubjects();
        
        $fileName = $this->settingsModel->isOLFileExists($_SESSION['user_id']);

        if($fileName != NULL) {
            $isOLFileExists = true;
        }
        else {
            $isOLFileExists = false;
        }

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
                'file' => $_FILES['file_to_be_upload'],
                'file_name' => time().'_'.$_FILES['file_to_be_upload']['name'],
                'is_ol_file_exists' => $isOLFileExists,
                
                'ol_school_err' => '',
                'ol_district_err' => '',
                'ol_results_err' => '',
                'file_err' => ''
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

            // validate and upload file
            if($data['file']['name'] == null) {
                if($fileName != null) {
                    $data['file_name'] = $fileName;
                }
            }
            elseif($data['file_name'] != $fileName) {
                if(updateFile(PUBROOT.'/files/OL_Result_Sheets/'.$fileName, $data['file']['tmp_name'], $data['file_name'], '/files/OL_Result_Sheets/')) {
                    flash('file_upload', 'File updated successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['file_err'] = 'File uploading unsuccessful';
                }
            }
            else{
                if(uploadFile($data['file']['tmp_name'], $data['file_name'], '/files/OL_Result_Sheets/')) {
                    flash('file_upload', 'File uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['file_err'] = 'File uploading unsuccessful';
                }
            }

            // Make sure all errors are empty
            if(empty($data['ol_school_err']) && empty($data['ol_district_err']) && empty($data['ol_results_err']) && empty($data['file_err'])) {
                // Validated                    
                $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateStudentOLSettings($id, $data)) {
                    flash('settings_message', 'OL data updated');
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
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
                'file' => '',
                'file_name' => $fileName,
                'is_ol_file_exists' => $isOLFileExists,

                'ol_school_err' => '',
                'ol_district_err' => '',
                'ol_results_err' => '',
                'file_err' => ''
            ];
        }

        $this->view('students/opt_settings/edit/v_edit_ol_settings', $data);
    }

    // Edit AL Qualified settings
    public function editSettingsAL() {
        $district_list = $this->settingsModel->getDistricts();
        $stream_list = $this->settingsModel->getStreams();
        $al_subject_list = $this->settingsModel->getALSubjects();      
        
        $fileName = $this->settingsModel->isALFileExists($_SESSION['user_id']);

        if($fileName != NULL) {
            $isALFileExists = true;
        }
        else {
            $isALFileExists = false;
        }

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
                'subjects_validity' => $_POST['subjects_validity'],
                'file' => $_FILES['file_to_be_upload'],
                'file_name' => time().'_'.$_FILES['file_to_be_upload']['name'],
                'is_al_file_exists' => $isALFileExists,

                'al_school_err' => '',
                'stream_err' => '',
                'z_score_err' => '',
                'al_district_err' => '',
                'general_test_grade_err' => '',
                'radio_general_english_err' => '',
                'al_results_err' => '',
                'file_err' => ''
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
            else {
                if($data['subjects_validity'] == 'not valid') {
                    $data['al_results_err'] = "Please select different subjects";
                }
            }

            // validate and upload file
            if($data['file']['name'] == null) {
                if($fileName != null) {
                    $data['file_name'] = $fileName;
                }
            }
            elseif($data['file_name'] != $fileName) {
                if(updateFile(PUBROOT.'/files/AL_Result_Sheets/'.$fileName, $data['file']['tmp_name'], $data['file_name'], '/files/AL_Result_Sheets/')) {
                    flash('file_upload', 'File updated successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['file_err'] = 'File uploading unsuccessful';
                }
            }
            else{
                if(uploadFile($data['file']['tmp_name'], $data['file_name'], '/files/AL_Result_Sheets/')) {
                    flash('file_upload', 'File uploaded successfully');
                }
                else {
                    // upload unsuccessfull
                    $data['file_err'] = 'File uploading unsuccessful';
                }
            }

            // Make sure all errors are empty
            if(empty($data['al_school_err']) && empty($data['stream_err']) && empty($data['z_score_err'])
                && empty($data['al_district_err']) && empty($data['general_test_grade_err']) && empty($data['radio_general_english_err'])
                && empty($data['al_results_err']) && empty($data['file_err'])) {
                // Validated                    
                $id = $this->settingsModel->findStudentIdbyEmail($_SESSION['user_email']);
                if($this->settingsModel->updateStudentALSettings($id, $data)) {
                    flash('settings_message', 'AL data updated');
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
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
                'subjects_validity' => 'valid',
                'file' => '',
                'file_name' => $fileName,
                'is_al_file_exists' => $isALFileExists,

                'al_school_err' => '',
                'stream_err' => '',
                'z_score_err' => '',
                'al_district_err' => '',
                'general_test_grade_err' => '',
                'radio_general_english_err' => '',
                'al_results_err' => '',
                'file_err' => ''
            ];
        }

        $this->view('students/opt_settings/edit/v_edit_al_settings', $data);
    }

    // Edit Undergraduate/Graduate settings
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
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
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
                    $this->updateUserSessions($_SESSION['user_id']);
                    
                    redirect('C_S_Settings/settings/'.$_SESSION['user_id']);
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