<?php
    class Account_Settings extends Controller {
        public function __construct() {
            //$this->userModel = $this->model('User');
            $this->accSettingsModel = $this->model('Account_Setting');
        }
        
        // Addiotion account settings - Privary protections
        public function accountSettings($id) {
            $data = [
                'isProfileLocked' => $this->accSettingsModel->isUserLockedProfile($id)
            ];

            $this->view('common/user_settings', $data);
        }

        public function lockProfile($id) {
            if($this->accSettingsModel->enableLockProfile($id)) {
                flash('acc_settings_msg', 'You have enable locked profile');

                redirect('Account_Settings/accountSettings/'.$id);
            }
            else 
            {
                die('Something went wrong');
            }
        }
    }
?>