<?php 

class C_M_Settings extends Controller{
    public function __construct() {
        $this->mentorSettingsModel = $this->model('M_M_Settings');
    }

    public function settings(){
        $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);

        switch($_SESSION['specialized_actor_type']) {
            // For beginner
            case 'Professional Guider':
               $mentorData = $this->mentorSettingsModel->getMentorDetails($id);

                $data = [
                    'name' => $mentorData->name,
                    'email' => $mentorData->email,
                    'password' => $mentorData->password,
                    'gender' => $mentorData->gender,
                    'institute' => $mentorData->institute,
                    'address' => $mentorData->address,
                    'phn_no' => $mentorData->phn_no
                ];

                $this->view('mentors/opt_settings/default/v_def_guider_settings', $data);
                break;
            // For Teacher
            case 'Teacher':
               $mentorData = $this->mentorSettingsModel->getMentorDetails($id);
 
                $data = [
                    'name' => $mentorData->name,
                    'email' => $mentorData->email,
                    'password' => $mentorData->password,
                    'gender' => $mentorData->gender,
                    // 'institute' => $mentorData->institute,
                    'address' => $mentorData->address,
                    'phn_no' => $mentorData->phn_no
                ];
 
                $this->view('mentors/opt_settings/default/v_def_teacher_settings', $data);
                break;            
            default:
                break;
        }
    }

    public function editSettingsGuider() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'gender' => trim($_POST['gender']),
                'institute' => trim($_POST['institute']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'gender_err' => '',
                'institute_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];

            // Validate title
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate body
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate body
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Validate body
            if(empty($data['gender'])) {
                $data['gender_err'] = 'Please enter gender';
            }

            // Validate body
            if(empty($data['institute'])) {
                $data['institute_err'] = 'Please enter institute';
            }

            // Validate body
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate body
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['gender_err'])
                && empty($data['institute_err']) && empty($data['address_err']) && empty($data['phn_no_err'])) {
                // Validated                    
                $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
                if($this->mentorSettingsModel->updateGuiderSettings($id, $data)) {
                    flash('settings_message', 'Profile data updated');
                    redirect('C_M_Settings/settings');
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
                'name' => $mentorData->name,
                'email' => $mentorData->email,
                'password' => $mentorData->password,
                'gender' => $mentorData->gender,
                'institute' => $mentorData->institute,
                'address' => $mentorData->address,
                'phn_no' => $mentorData->phn_no,

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'gender_err' => '',
                'institute_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];
        }

        $this->view('mentors/opt_settings/edit/v_edit_guider_settings', $data);
    }

    public function editSettingsTeacher() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'gender' => trim($_POST['gender']),
                // 'institute' => trim($_POST['institute']),
                'address' => trim($_POST['address']),
                'phn_no' => trim($_POST['phn_no']),

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'gender_err' => '',
                // 'institute_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];

            // Validate title
            if(empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }

            // Validate body
            if(empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            }

            // Validate body
            if(empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }

            // Validate body
            if(empty($data['gender'])) {
                $data['gender_err'] = 'Please enter gender';
            }

            // Validate body
            // if(empty($data['institute'])) {
            //     $data['institute_err'] = 'Please enter date of birth';
            // }

            // Validate body
            if(empty($data['address'])) {
                $data['address_err'] = 'Please enter address';
            }

            // Validate body
            if(empty($data['phn_no'])) {
                $data['phn_no_err'] = 'Please enter phone number';
            }

            // Make sure no errors
            if(empty($data['name_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['gender_err'])
                && empty($data['address_err']) && empty($data['phn_no_err'])) {
                // Validated                    
                $id = $this->mentorSettingsModel->findMentorIdbyEmail($_SESSION['user_email']);
                if($this->mentorSettingsModel->updateTeachetSettings($id, $data)) {
                    flash('settings_message', 'Profile data updated');
                    redirect('C_M_Settings/settings');
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
                'name' => $mentorData->name,
                'email' => $mentorData->email,
                'password' => $mentorData->password,
                'gender' => $mentorData->gender,
                // 'institute' => $mentorData->institute,
                'address' => $mentorData->address,
                'phn_no' => $mentorData->phn_no,

                'name_err' => '',
                'email_err' => '',
                'password_err' => '',
                'gender_err' => '',
                // 'institute_err' => '',
                'address_err' => '',
                'phn_no_err' => '',
            ];
        }

        $this->view('mentors/opt_settings/edit/v_edit_teacher_settings', $data);
    }
}

?>