<?php
    class C_M_Complaints extends Controller{
        public function __construct()
        {
            $this->complaintModel = $this->model('M_M_Complaints');
        }

        // Complaint
        public function complaint() {
            // Get posts
            $posts = $this->complaintModel->getComplaints();

            $data = [
                'posts' => $posts
            ];

            $this->view('mentors/opt_complaint/v_complaint_index', $data);
        }

        // Add complaint
        public function add() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'content_err' => '',
                    
                ];

                

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate content
                if(empty($data['content'])) {
                    $data['content_err'] = 'Please enter title';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['content_err'])) {
                    // Validated
                    if($this->complaintModel->add($data)) {
                        flash('post_message', 'Complaint sent');
                        redirect('C_M_Complaints/complaint');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/opt_complaint/v_complaint_add', $data);
                }
            }
            else {
                $data = [
                    
                    'id' => '',
                    'title' => '',
                    'content' => '',
                    
                ];
            }

            $this->view('mentors/opt_complaint/v_complaint_add', $data);
        }

        // Edit complaint
        public function edit($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanetize the POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                
                $data = [
                    'id' => $id,
                    'title' => trim($_POST['title']),
                    'content' => trim($_POST['content']),
                    'user_id' => $_SESSION['user_id'],
                    'title_err' => '',
                    'content_err' => ''
                ];

                // validate and upload profile image
                $post = $this->complaintModel->getComplaintById($id);
            

                // Validate title
                if(empty($data['title'])) {
                    $data['title_err'] = 'Please enter title';
                }

                // Validate content
                if(empty($data['content'])) {
                    $data['content_err'] = 'Please enter title';
                }

                // Make sure no errors
                if(empty($data['title_err']) && empty($data['content_err'])) {
                    // Validated
                    if($this->complaintModel->update($data)) {
                        flash('post_message', 'Complaint updated');
                        redirect('C_M_Complaints/complaint');
                    }
                    else {
                        die('Something went wrong');
                    }
                }
                else {
                    // Load view with errors
                    $this->view('mentors/opt_complaint/v_complaint_edit', $data);
                }
            }
            else {
                // Get existing post from model
                $post = $this->complaintModel->getComplaintById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('C_M_Complaints/complaint');
                }

                $data = [
                    
                    'id' => $id,
                    'title' => $post->title,
                    'content' => $post->content,                    
                    'title_err' => '',
                    'content_err' => ''
                ];
            }

            $this->view('mentors/opt_complaint/v_complaint_edit', $data);
        }

        // Delete complaint
        public function delete($id) {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get existing post from model
                $post = $this->complaintModel->getComplaintById($id);

                // Check for owner
                if($post->user_id != $_SESSION['user_id']) {
                    redirect('C_M_Complaints/complaint');
                }
                
                if($this->complaintModel->delete($id)) {
                    flash('post_message', 'Complaint Removed');
                    redirect('C_M_Complaints/complaint');
                }
                else {
                    die('Something went wrong');
                }
            }
            else {
                redirect('C_M_Complaints/complaint');
            }
        }
    }
?>