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
                'id' => $id,
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

        // Account delete
        public function deleteAccount($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Check for confirm text
                $text_to_be_matched = 'I am '.$_SESSION['user_name'].'. Delete my account.';
                if($text_to_be_matched != $_POST['acc_delete_confirmation_text']) {
                    redirect('Account_Settings/accountSettings/'.$id);
                }

                // Check for owner
                if($id != $_SESSION['user_id']) {
                    redirect('Whiz/index');
                }

            
                // validate and upload profile image
                switch($_SESSION['actor_type']) {
                    case 'Student': 
                        $folderName = 'student';
                        break;
                    case 'Organization': 
                        $folderName = 'organization';
                        break;
                    case 'Mentor': 
                        $folderName = 'mentor';
                        break;
                    case 'Admin':
                        $folderName = 'admin';
                        break;
                    default: 
                        break;
                }

                $img = PUBROOT.'/profileimages/'.$folderName.'/'.$_SESSION['user_profile_image'];
                
                $res1 = $this->accSettingsModel->deleteAccount($id);
                if($res1) {
                    $res2 = deleteImage($img);
                }
                
                if($res1 && $res2) {
                    flash('post_message', 'Account Removed');
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
                redirect('Account_Settings/accountSettings/'.$id);
            }
        }
    }
?>