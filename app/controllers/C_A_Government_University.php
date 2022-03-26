<?php

class C_A_Government_University extends Controller {
    public function __construct() {
        $this->govUniModel = $this->model('M_A_Government_University');
    }


    // Index
    public function universities() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $university_list = $this->govUniModel->getUniversities();

        $data = [
            'university_list' => $university_list
        ];
        
        $this->view('admin/opt_gov_universities/v_universities', $data);
    }

    public function courses() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $courses_list = $this->govUniModel->getCourses();

        $data = [
            'courses_list' => $courses_list
        ];
        
        $this->view('admin/opt_gov_universities/v_courses', $data);
    }

    public function courseAndUniversities() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $courses_university_list = $this->govUniModel->getCourseAndUniversities();

        $data = [
            'courses_university_list' => $courses_university_list
        ];
        
        $this->view('admin/opt_gov_universities/v_course_university', $data);
    }


    // add
    public function addUniversity() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'uni_name' => $_POST['uni_name'],
                'description' => $_POST['description'],
                'world_rank' => $_POST['world_rank'],
                'student_amount' => $_POST['student_amount'],
                'graduate_job_rate' => $_POST['graduate_job_rate'],

                'uni_name_err' => '',
                'description_err' => '',
                'world_rank_err' => '',
                'student_amount_err' => '',
                'graduate_job_rate_err' => ''
            ];

            // Validate gender
            if(empty($data['uni_name'])) {
                $data['uni_name_err'] = 'Please enter university name';
            }

            // Validate gender
            if(empty($data['description'])) {
                $data['description_err'] = 'Please enter description';
            }

            // Validate date of birth
            if(empty($data['world_rank'])) {
                $data['world_rank_err'] = 'Please enter world rank';
            }

            // Validate address
            if(empty($data['student_amount'])) {
                $data['student_amount_err'] = 'Please enter student amount';
            }

            // Validate address
            if(empty($data['graduate_job_rate'])) {
                $data['graduate_job_rate_err'] = 'Please enter graduate jo rate';
            }

            // Make sure no errors
            if(empty($data['uni_name_err']) && empty($data['description_err']) && empty($data['world_rank_err']) && empty($data['student_amount_err']) && empty($data['graduate_job_rate_err'])) {
                // Validated                    
                if($this->govUniModel->addUniversity($data)) {
                    flash('gov_uni_message', 'New record added');
                    
                    redirect('C_A_Government_University/universities');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_gov_universities/add/v_add_university', $data);
            }
        }
        else {         
            $data = [                
                'uni_name' => '',
                'description' => '',
                'world_rank' => '',
                'student_amount' => '',
                'graduate_job_rate' => '',

                'uni_name_err' => '',
                'description_err' => '',
                'world_rank_err' => '',
                'student_amount_err' => '',
                'graduate_job_rate_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/add/v_add_university', $data);
    }

    public function addCourse() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'course_id' => $_POST['course_id'],
                'course_name' => $_POST['course_name'],

                'course_id_err' > '',
                'course_name_err' => ''
            ];

            // Validate gender
            if(empty($data['course_id'])) {
                $data['course_id_err'] = 'Please enter course id';
            }

            // Validate gender
            if(empty($data['course_name'])) {
                $data['course_name_err'] = 'Please enter course name';
            }

            // Make sure no errors
            if(empty($data['course_id_err']) && empty($data['course_name_err'])) {
                // Validated                    
                if($this->govUniModel->addCourse($data)) {
                    flash('gov_uni_message', 'New record added');
                    
                    redirect('C_A_Government_University/courses');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_gov_universities/add/v_add_course', $data);
            }
        }
        else {         
            $data = [                
                'course_id' => '',
                'course_name' => '',

                'course_id_err' => '',
                'course_name_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/add/v_add_course', $data);
    }

    public function addCourseUniversity() {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $courses_list = $this->govUniModel->getCourses();
        $university_list = $this->govUniModel->getUniversities();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [                
                'courses_list' => $courses_list,
                'universities_list' => $university_list,

                'course' => $_POST['courses'],
                'university' => $_POST['universities'],
                'unicode' => $_POST['unicode'],
                'purposed_intake' => $_POST['purposed_intake'],
                'duration' => $_POST['duration'],
                'description' => $_POST['description'],

                'unicode_err' => '',
                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];

            // Validate gender
            if(empty($data['unicode'])) {
                $data['unicode_err'] = 'Please enter unicode';
            }

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
            if(empty($data['unicode_err']) && empty($data['purposed_intake_err']) && empty($data['duration_err']) && empty($data['description_err'])) {
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
                'courses_list' => $courses_list,
                'universities_list' => $university_list,

                'course' => '',
                'university' => '',
                'unicode' => '',
                'purposed_intake' => '',
                'duration' => '',
                'description' => '',

                'unicode_err' => '',
                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/add/v_add_course_university', $data);
    }


    // edit
    public function editUniversity($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,

                'uni_name' => $_POST['uni_name'],
                'description' => $_POST['description'],
                'world_rank' => $_POST['world_rank'],
                'student_amount' => $_POST['student_amount'],
                'graduate_job_rate' => $_POST['graduate_job_rate'],

                'uni_name_err' => '',
                'description_err' => '',
                'world_rank_err' => '',
                'student_amount_err' => '',
                'graduate_job_rate_err' => ''
            ];

            // Validate gender
            if(empty($data['uni_name'])) {
                $data['uni_name_err'] = 'Please enter university name';
            }

            // Validate gender
            if(empty($data['description'])) {
                // $data['description_err'] = 'Please enter description';
                $data['description'] = NULL;
            }

            // Validate date of birth
            if(empty($data['world_rank'])) {
                // $data['world_rank_err'] = 'Please enter world rank';
                $data['world_rank'] = NULL;
            }

            // Validate address
            if(empty($data['student_amount'])) {
                // $data['student_amount_err'] = 'Please enter student amount';
                $data['student_amount'] = NULL;
            }

            // Validate address
            if(empty($data['graduate_job_rate'])) {
                // $data['graduate_job_rate_err'] = 'Please enter graduate jo rate';
                $data['graduate_job_rate'] = NULL;
            }

            // Make sure no errors
            if(empty($data['uni_name_err']) && empty($data['description_err']) && empty($data['world_rank_err']) && empty($data['student_amount_err']) && empty($data['graduate_job_rate_err'])) {
                // Validated                    
                if($this->govUniModel->editUniversity($data)) {
                    flash('gov_uni_message', 'New record added');
                    
                    redirect('C_A_Government_University/universities');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_gov_universities/edit/v_edit_university', $data);
            }
        }
        else {        
            $uniData = $this->govUniModel->getUniversityById($id); 

            $data = [     
                'id' => $id,

                'uni_name' => $uniData->uni_name,
                'description' => $uniData->description,
                'world_rank' => $uniData->world_rank,
                'student_amount' => $uniData->student_amount,
                'graduate_job_rate' => $uniData->graduate_job_rate,

                'uni_name_err' => '',
                'description_err' => '',
                'world_rank_err' => '',
                'student_amount_err' => '',
                'graduate_job_rate_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/edit/v_edit_university', $data);
    }

    public function editCourse($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'id' => $id,

                'course_id' => $_POST['course_id'],
                'course_name' => $_POST['course_name'],

                'course_id_err' > '',
                'course_name_err' => ''
            ];

            // Validate gender
            if(empty($data['course_id'])) {
                $data['course_id_err'] = 'Please enter course id';
            }

            // Validate gender
            if(empty($data['course_name'])) {
                $data['course_name_err'] = 'Please enter course name';
            }

            // Make sure no errors
            if(empty($data['course_id_err']) && empty($data['course_name_err'])) {
                // Validated                    
                if($this->govUniModel->editCourse($data)) {
                    flash('gov_uni_message', 'New record added');
                    
                    redirect('C_A_Government_University/courses');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                // Load view with errors
                $this->view('admin/opt_gov_universities/edit/v_edit_course', $data);
            }
        }
        else {         
            $courseData = $this->govUniModel->getCourseById($id); 

            $data = [        
                'id' => $id,

                'course_id' => $courseData->gov_course_id,
                'course_name' => $courseData->gov_course_name,

                'course_id_err' => '',
                'course_name_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/edit/v_edit_course', $data);
    }
    
    public function editCourseUniversity($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        $courses_list = $this->govUniModel->getCourses();
        $university_list = $this->govUniModel->getUniversities();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanetize the POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [                
                'courses_list' => $courses_list,
                'universities_list' => $university_list,

                'id' => $id,
                'course' => $_POST['courses'],
                'university' => $_POST['universities'],
                'unicode' => $_POST['unicode'],
                'purposed_intake' => $_POST['purposed_intake'],
                'duration' => $_POST['duration'],
                'description' => $_POST['description'],

                'unicode_err' => '',
                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];

            // Validate gender
            if(empty($data['unicode'])) {
                $data['purposed_intake_err'] = 'Please enter unicode';
            }

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
            if(empty($data['unicode_err']) && empty($data['purposed_intake_err']) && empty($data['duration_err']) && empty($data['description_err'])) {
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
                'courses_list' => $courses_list,
                'universities_list' => $university_list,

                'id' => $id,
                'course' => $courseUniData->gov_course_id,
                'university' => $courseUniData->gov_uni_id,
                'unicode' => $courseUniData->unicode,
                'purposed_intake' => $courseUniData->purposed_intake,
                'duration' => $courseUniData->duration,
                'description' => $courseUniData->description,

                'unicode_err' => '',
                'purposed_intake_err' => '',
                'duration_err' => '',
                'description_err' => ''
            ];
        }

        $this->view('admin/opt_gov_universities/edit/v_edit_course_university', $data);
    }


    // delete
    public function deleteUniversity($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        if($this->govUniModel->deleteUniversity($id)) {
            flash('gov_uni_message', 'Existing record deleted');
            
            redirect('C_A_Government_University/universities');
        }
        else {
            die('Something went wrong');
        }
    }

    public function deleteCourse($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);

        if($this->govUniModel->deleteCourse($id)) {
            flash('gov_uni_message', 'Existing record deleted');
            
            redirect('C_A_Government_University/courses');
        }
        else {
            die('Something went wrong');
        }
    }

    public function deleteCourseUniversity($id) {
        // Build Security-In : Check actor types to prevent URL tamperings (Unauthorized access)
        URL_tamper_protection(['Admin'], ['Admin']);
        
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