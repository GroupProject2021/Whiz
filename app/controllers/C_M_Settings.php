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
}

?>