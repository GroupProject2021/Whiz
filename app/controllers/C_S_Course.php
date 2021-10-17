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

    // Government course view more
    public function govCourseViewMore($id) {
        $data = [];

        $this->view('students/opt_courses/v_gov_course_viewMore', $data);
    }
}

?>