<?php

class C_S_Course extends Controller {
    public function __construct() {
        $this->courseModel = $this->model('M_S_Course');
    }

    public function index() {
        $this->view('students/opt_courses/v_course_selection');
    }

    public function govCourseList() {
        $govCourses = $this->courseModel->getGovCourseList();

        $data = [
            'courses' => $govCourses
        ];

        $this->view('students/opt_courses/v_gov_course_list', $data);
    }

    public function govCourseViewMore($id) {
        $data = [];

        $this->view('students/opt_courses/v_gov_course_viewMore', $data);
    }
}

?>