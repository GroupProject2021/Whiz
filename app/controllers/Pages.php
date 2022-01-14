<?php
    class Pages extends Controller {
        public function __construct() {
            $this->postModel = $this->model('Post');
        }

        public function index() {
            $this->view('pages/index');
        }

        public function about() {
            $this->view('pages/about');
        }

        public function help() {
            $this->view('pages/help');
        }

        public function privacy() {
            $this->view('pages/privacy');
        }

        public function contactus() {
            $this->view('pages/contactus');
        }

        public function services() {
            $this->view('pages/services');
        }

        public function seeMore($actorType, $specializedActorType) {
            if($actorType == 'Students') {
                switch($specializedActorType) {
                    case 'Beginner':
                                    $this->view('pages/seeMore/student/v_beginner');
                                    break;
                    case 'OLQualified': 
                                    $this->view('pages/seeMore/student/v_ol_qualified');
                                    break;
                    case 'ALQualified':
                                    $this->view('pages/seeMore/student/v_al_qualified');
                                    break;
                    case 'UndergraduateGraduate':
                                    $this->view('pages/seeMore/student/v_undergrad_grad');
                                    break;
                    default:
                                    break;
                }
            }
            else if($actorType == 'Organizations') {
                switch($specializedActorType) {
                    case 'Company':
                                    $this->view('pages/seeMore/organization/v_company');
                                    break;
                    case 'PrivateUniversity': 
                                    $this->view('pages/seeMore/organization/v_pri_university');
                                    break;
                    default:
                                    break;
                }
            }
            else if($actorType == 'Mentors') {
                switch($specializedActorType) {
                    case 'ProfessionalGuider':
                                    $this->view('pages/seeMore/mentor/v_pro_guider');
                                    break;
                    case 'Teacher': 
                                    $this->view('pages/seeMore/mentor/v_teacher');
                                    break;
                    default:
                                    break;
                }
            }
            else {
            // do nothing
            }
        }
    }
?>