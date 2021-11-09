<?php

class C_A_Government_University extends Controller {
    public function __construct() {
        $this->govUniModel = $this->model('M_A_Government_University');
    }

    // Index
    public function universities() {
        $university_list = $this->govUniModel->getUniversities();

        $data = [
            'university_list' => $university_list
        ];
        
        $this->view('admin/opt_gov_universities/v_universities', $data);
    }

    public function courses() {
        $courses_list = $this->govUniModel->getCourses();

        $data = [
            'courses_list' => $courses_list
        ];
        
        $this->view('admin/opt_gov_universities/v_courses', $data);
    }

    public function courseAndUniversities() {
        $courses_university_list = $this->govUniModel->getCourseAndUniversities();

        $data = [
            'courses_university_list' => $courses_university_list
        ];
        
        $this->view('admin/opt_gov_universities/v_course_university', $data);
    }

    // add
    public function addCourseUniversity() {
        $courses_list = $this->govUniModel->getCourses();
        $university_list = $this->govUniModel->getUniversities();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'course' => $_POST['courses'],
                'university' => $_POST['universities'],
                'courses_list' => $courses_list,
                'universities_list' => $university_list,
                'purposed_intake' => $_POST['purposed_intake'],
                'duration' => $_POST['duration'],
                'description' => $_POST['description'],

                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];

            // Validate gender
            if(empty($data['purposed_intake'])) {
                $data['purposed_intake_err'] = 'Please enter purposes intake';
            }

            // Validate date of birth
            if(empty($data['duration'])) {
                $data['duration_err'] = 'Please enter duration';
            }

            // Validate address
            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Make sure no errors
            if(empty($data['purposed_intake_err']) && empty($data['duration_err']) && empty($data['description_err'])) {
                // Validated                    
                if($this->govUniModel->addCourseUniversity($data)) {
                    flash('gov_uni_message', 'New record added');
                    
                    redirect('C_A_Government_University/courseAndUniversities');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_gov_universities/add/v_add_course_university', $data);
            }
        }
        else {         
            $data = [
                'course' => '',
                'university' => '',
                'courses_list' => $courses_list,
                'universities_list' => $university_list,
                'purposed_intake' => '',
                'duration' => '',
                'description' => '',

                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/add/v_add_course_university', $data);
    }

    // add
    public function editCourseUniversity($id) {
        $courses_list = $this->govUniModel->getCourses();
        $university_list = $this->govUniModel->getUniversities();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,
                'course' => $_POST['courses'],
                'university' => $_POST['universities'],
                'courses_list' => $courses_list,
                'universities_list' => $university_list,
                'purposed_intake' => $_POST['purposed_intake'],
                'duration' => $_POST['duration'],
                'description' => $_POST['description'],

                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];

            // Validate gender
            if(empty($data['purposed_intake'])) {
                $data['purposed_intake_err'] = 'Please enter purposes intake';
            }

            // Validate date of birth
            if(empty($data['duration'])) {
                $data['duration_err'] = 'Please enter duration';
            }

            // Validate address
            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Make sure no errors
            if(empty($data['purposed_intake_err']) && empty($data['duration_err']) && empty($data['description_err'])) {
                // Validated                    
                if($this->govUniModel->editCourseUniversity($data)) {
                    flash('gov_uni_message', 'Existing record updated');
                    
                    redirect('C_A_Government_University/courseAndUniversities');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_gov_universities/edit/v_edit_course_university', $data);
            }
        }
        else {        
            $courseUniData = $this->govUniModel->getCourseAndUniversityById($id); 

            $data = [
                'id' => $id,
                'course' => $courseUniData->gov_course_id,
                'university' => $courseUniData->gov_uni_id,
                'courses_list' => $courses_list,
                'universities_list' => $university_list,
                'purposed_intake' => $courseUniData->purposed_intake,
                'duration' => $courseUniData->duration,
                'description' => $courseUniData->description,

                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/edit/v_edit_course_university', $data);
    }

    public function deleteCourseUniversity($id) {
        if($this->govUniModel->deleteCourseUniversity($id)) {
            flash('gov_uni_message', 'Existing record deleted');
            
            redirect('C_A_Government_University/courseAndUniversities');
        }
        else {
            die('Something went wrong');
        }
    }
}

?>