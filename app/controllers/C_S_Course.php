<?php

class C_S_Course extends Controller {
    public function __construct() {
        $this->courseModel = $this->model('M_S_Course');
    }

    // Index
    public function index() {
        $this->view('students/opt_courses/v_course_selection');
    }

    // Get government course list
    public function govCourseList() {
        $govCourses = $this->courseModel->getGovCourseList();

        $data = [
            'courses' => $govCourses
        ];

        $this->view('students/opt_courses/v_gov_course_list', $data);
    }

    public function govUniversityList() {
        $govUniversities = $this->courseModel->getGovUniversityList();

        $data = [
            'universities' => $govUniversities
        ];

        $this->view('students/opt_courses/v_gov_university_list', $data);
    }

    // Government course view more
    public function govCourseViewMore($id) {
        $data = [];

        $this->view('students/opt_courses/v_gov_course_viewMore', $data);
    }

    // Government course selecttion
    public function filteredGovCourseList() {
        $govCourses = $this->courseModel->getGovCourseList();

        $data = [
            'courses' => $govCourses
        ];

        $this->view('students/opt_courses/v_gov_course_list_filtered_from_streamSelection', $data);
    }

     // Government course recommendation
     public function getRecommendedGovCourseList() {
        $govCourses = $this->courseModel->getGovCourseList();

        $data = [
            'courses' => $govCourses
        ];

        $this->view('students/opt_courses/v_gov_course_recommendation', $data);
    }
}

?>