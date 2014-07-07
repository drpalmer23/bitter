<?php
 
session_start();
// Init
include('app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        $username = $_POST['username'];
        $email = $_POST['username'];
        $pw = $_POST['password'];

        $sql = "
        SELECT user_id, email, user_name, password
        FROM user
        WHERE password = \"{$pw}\"
        AND email=\"{$email}\" OR user_name=\"{$username}\"
        ";

        $results = db::execute($sql);

           // check for a matching entry for a registered user
        // if ($results->num_rows != 0) {

             // make a $row variable for results
            $row = $results->fetch_assoc();

            // check for password entered by user matches what is in database
            // if ($_POST['password'] == $row['password']) {

                $_SESSION['user_id'] = $row['user_id']; 

                $this->view['redirect'] = 'home.php';

        //     //password entered doesn't match what is in db
        //     } else{

        //         $status = array('response' => 'error', 
        //             'msg' => 'Invalid password'); 
        //         http_response_code(401);

        //     }
        // //email address is not in the db
        // } else {

        //     $status = array('response' => 'error', 
        //         'msg' => 'Invalid username/email/password combo, please try again');
        //      http_response_code(400); 

        // //email entered by user does not meet reg expression criteria
        // }


        // header('Content-Type: application/json');

        // echo json_encode($status);

    }

}

$controller = new Controller();