<?php

class C_S_Stream extends Controller {
    public function __construct() {
        $this->streamModel = $this->model('M_S_Stream');
    }

    // Index
    public function index() {
        $this->streamSelection();
    }

    // For beginner
    // option 1 - stream selection
    public function streamSelection() {
        $streams = $this->streamModel->getStreams();
            
        $data = [
            'streams' => $streams
        ];

        $this->view('students/opt_streams/v_stream_selection', $data);
    }

    public function streamSelectionRedirect($stream_id) {
        $stream_name = $this->streamModel->getStreamNameById($stream_id);
        $al_subject_list =  $this->streamModel->getALSubjectsById($stream_id);

        $data = [
            'stream_name' => $stream_name,
            'al_subject_list' => $al_subject_list
        ];

        $this->view('students/opt_streams/v_stream_selection_redirect', $data);
    }


    // For OL qualified
    // Option 1 - stream recommendation
    public function streamRecommendation() {
        $streams = $this->streamModel->getStreams();
        $id = $this->streamModel->findStudentIdbyEmail($_SESSION['user_email']);
        $studentOLData = $this->streamModel->getStudentOLDetails($id);

        $recommendedStreamList = $this->whizStreamRecommenadationAlgorithm($studentOLData);

        $data = [
            'streams' => $streams,
            'recommended_streams' => $recommendedStreamList
        ];            

        if($_SESSION['specialized_actor_type'] == 'OL qualified') {
            $this->view('students/opt_streams/v_stream_recommendation', $data);
        }
        else {
            die('Please upgrade to OL qualifed to unlock this feature');
        }
    }

    // Whiz stream recommendation algorithm
    public function whizStreamRecommenadationAlgorithm($studentOLData) {
        // ORDER MATTERS - changing the order of keys may effect the output
        $rankArray = [
            'a' => array('', ''),  // art
            'c' => array('', ''),  // commerce
            's' => array('', ''),  // science
            'm' => array('', ''),  // maths
            't' => array('', ''),  // tech
            'o' => array('', '')   // other
        ];

        $m = $this->getRank($studentOLData->ol_sub6_grade); //taking maths rank
        $s = $this->getRank($studentOLData->ol_sub5_grade); //taking science rank
        $a = $this->getRank($studentOLData->ol_sub2_grade); //taking sinhala rank

        $msa = ceil((($m + $s + $a) / 3)) ;

        if($studentOLData->ol_sub7_id == 12) {
            $c = $this->getRank($studentOLData->ol_sub7_grade); // taking commerce rank
        }
        else {
            $c = $msa;
        }

        if($studentOLData->ol_sub9_id == 46) {
            $t = $this->getRank($studentOLData->ol_sub7_grade); // taking tech rank
        }
        else {
            $t = $msa;
        }

        $o = $msa;

        // set rank array - remember order matters
        $rankArray = [
            'a' => array($a, 1),  // arts
            'c' => array($c, 2),  // commerce
            's' => array($s, 3),  // science
            'm' => array($m, 4),  // maths
            't' => array($t, 5),  // tech
            'o' => array($o, 6)   // other
        ];

        // set array key names as actual stream names
        $rankArray = $this->replaceArrayKeyName($rankArray);
            

        // sort arrays
        arsort($rankArray);

        return $rankArray;
    }

    // Replace array key names
    public function replaceArrayKeyName($array) {
        $replacedArray = [];
        $index = 1;

        foreach($array as $array => $array_value) {
            $replacedArray = array_merge($replacedArray, [$this->streamModel->getStreamNameById($index) => $array_value]);
            $index++;
        }

        return $replacedArray;
    }

    // Get rank
    public function getRank($grade) {
        switch($grade) {
            case 'A': 
                return 6;
                break;
            case 'B': 
                return 5;
                break;
            case 'C': 
                return 4;
                break;
            case 'D': 
                return 3;
                break;
            case 'E': 
                return 2;
                break;
            case 'F': 
                return 1;
                break;
            default:
                //nothing
                break;
            }
        }
}

?>