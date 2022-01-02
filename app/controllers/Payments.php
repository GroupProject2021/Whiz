<?php
    class Payments extends Controller {
        public function __construct() {
            if(!isLoggedIn()){
                redirect('users/login');
            }
            
            // For payments
            $this->paymentModel = $this->model('Payment');
        }

        // payment gateway
        /*
            Initially payment gateway list down all the user details that it need to be payed
            Then at the call back it must be notified to the DB to update the post as payed (BUT CURRENTLY notify_url CALLBACK NOT WORKING)
            -- post -> payed = 0 means not payed
            -- post -> payed = 1 means payed
        */
        public function payment() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // to do
                    $merchant_id         = $_POST['merchant_id'];
                    $order_id             = $_POST['order_id'];
                    $payhere_amount     = $_POST['payhere_amount'];
                    $payhere_currency    = $_POST['payhere_currency'];
                    $status_code         = $_POST['status_code'];
                    $md5sig                = $_POST['md5sig'];

                    $merchant_secret = PG_MERCHANT_ID; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

                    $local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

                    if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
                            //TODO: Update your database as payment success
                            $postToBePayed = $_SESSION['post_to_be_payed'];
                            $this->paymentModel->recordPaymentAsCompleted($postToBePayed);
                            unset($_SESSION['post_to_be_payed']);
                    }
            }
            else {
                // Check whether this is a actual payment or not
                if(!isset($_SESSION['post_to_be_payed']))
                    redirect('Whiz/index');

                $id = $_SESSION['user_id'];
                $userDetails = $this->paymentModel->getUserDetailsForPayments($id);

                // Getting actor details
                switch($_SESSION['actor_type']) {
                    case 'Organization':
                            $actorDetails = $this->paymentModel->getOrganizationDetailsForPayments($id);
                            break;
                    case 'Mentor': 
                            $actorDetails = $this->paymentModel->getMentorDetailsForPayments($id);
                            break;
                    default: 
                            break;
                }

                // getting specialized actor details for determine items
                switch($_SESSION['specialized_actor_type']) {
                    case 'University':
                            $item = 'Course post';
                            $amount = 100;
                            break;
                    case 'Company':
                            $item = 'Advertiment';
                            $amount = 150;
                            break;
                    case 'Professional Guider':
                            $item = 'Banner';
                            $amount = 100;
                            break;
                    case 'Teacher':
                            $item = 'Poster';
                            $amount = 100;
                            break;
                    default: 
                            break;
                }

                $paymentData = [
                    'order_id' => $_SESSION['post_to_be_payed'],
                    'items' => $item,
                    'currency' => 'LKR',
                    'amount' => 100,

                    'first_name' => $userDetails->first_name,
                    'last_name' => $userDetails->last_name,
                    'email' => $userDetails->email,
                    'phone' => $actorDetails->phn_no,
                    'address' => $actorDetails->address,
                    'city' => 'Hanwella',
                    'country' => 'Sri Lanka',

                    'cities' => $this->paymentModel->getCities()
                ];
            }

            $this->view('common/payment', $paymentData);
        }
    }
?>