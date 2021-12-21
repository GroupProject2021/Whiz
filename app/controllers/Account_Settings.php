<?php
    class Account_Settings extends Controller {
        public function __construct() {
            //$this->userModel = $this->model('User');
            $this->accSettingsModel = $this->model('Account_Setting');
        }
        
        // Addiotion account settings - Privary protections
        public function accountSettings($id) {
            $locked = $this->accSettingsModel->isUserLockedProfile($id);
            $settings = $this->accSettingsModel->getSettings($id);

            if($locked) {
                $gen = $settings->is_pri_gen_details_visible;
                $soc = $settings->is_pri_soc_details_visible;
            }
            else {
                $gen ='';
                $soc = '';
            }

            $data = [
                'isProfileLocked' => $locked,

                'isGenDetailsLocked' => $gen,
                'isSocDetailsLocked' => $soc
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

        public function unlockProfile($id) {
            if($this->accSettingsModel->disableLockProfile($id)) {
                flash('acc_settings_msg', 'You have disable locked profile');

                redirect('Account_Settings/accountSettings/'.$id);
            }
            else 
            {
                die('Something went wrong');
            }
        }

        public function toggleGeneralDetails($id, $x) {
            $this->accSettingsModel->toggleGeneralDetails($id, $x);
        }

        public function toggleSocialDetails($id, $x) {
            $this->accSettingsModel->toggleSocialDetails($id, $x);
        }
    }
?>