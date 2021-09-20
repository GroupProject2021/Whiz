<?php

class C_S_Stream extends Controller {
    public function __construct() {
        $this->streamModel = $this->model('M_S_Stream');
    }

    public function index() {
        $this->view('students/opt_streams/v_stream_selection');
    }
}

?>