<?php
session_start();

// Init
include('app/core/initialize.php');

// Controller
class Controller extends AjaxController {
	public function __construct() {
		parent::__construct();

		// Save User
		$user = User::insert($_POST);

		// In the case of the Ajax Controller, the view is an array
		// which can can be accessed as follows. This array will be
		// converted to JSON when this script ends and sent to the client
		// automatically

		// After registering, login user and start session
		$username = $_POST['username'];
        $email = $_POST['username'];
        $pw = $_POST['password'];

        $sql = "
        SELECT user_id, email, user_name, password
        FROM user
        WHERE password = \"{$pw}\"
        AND (email=\"{$email}\" OR user_name=\"{$username}\")
        ";
        $results = db::execute($sql);

           // check for a matching entry for a registered user
        // if ($results->num_rows != 0) {

            // make a $row variable for results
        $row = $results->fetch_assoc();

            // check for password entered by user matches what is in database
            // if ($_POST['password'] == $row['password']) {

        $_SESSION['user_id'] = $row['user_id']; 






		$this->view['redirect'] = 'account.php';

	}

}

$controller = new Controller();