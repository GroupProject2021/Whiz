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

    // explore
    public function govCourseExplore($courseId) {
        $courseName = $this->courseModel->getCourseNameById($courseId);
        $associatedGovUniversities = $this->courseModel->getAssociatedGovUnisById($courseId);

        $data = [
            'course_name' => $courseName,
            'associated_universities' => $associatedGovUniversities
        ];

        $this->view('students/opt_courses/v_gov_course_explore', $data);
    }

    // Government course view more
    public function govCourseViewMore($unicode) {
        $govCourse = $this->courseModel->getGovCourseById($unicode);
        $totalIntake = $this->courseModel->getTotalIntake();
        
        $uniDetails = $this->courseModel->getUniDetails($govCourse->uni_name);

        $data = [
            'gov_course' => $govCourse,
            'total_intake' => $totalIntake->total_intake,
            'uni_detials' => $uniDetails
        ];

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
     public function getRecommendedGovCourseList($id) {
        $districtName = $this->courseModel->getStudentDistrict($id);
        $streamId = $this->courseModel->getStudentStream($id);
        $zScore = $this->courseModel->getStudentZScore($id);

        $recommendedCourses = $this->courseModel->getRecommendedGovCourseList($districtName, $streamId, $zScore);

        $data = [
            'recommended_courses' => $recommendedCourses
        ];

        $this->view('students/opt_courses/v_gov_course_recommendation', $data);   
    }
    
    // Admissible government courses
    public function getAdmissibleGovCourseList($id) {
        $districtName = $this->courseModel->getStudentDistrict($id);
        $streamId = $this->courseModel->getStudentStream($id);

        $addmissibleCourses = $this->courseModel->getAdmissibleGovCourseList($districtName, $streamId);

        $data = [
            'admissible_courses' => $addmissibleCourses
        ];

        $this->view('students/opt_courses/v_gov_course_admissibleCourses', $data);
    }
}

?>