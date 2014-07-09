<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
// Init
include('app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Save Rant/Comment
        if(isset($_POST['parent_rant_id'])) {
            $rant = Rant::insertReply($_POST);
        } else {
            $rant = Rant::insertOriginal($_POST);
        }   

        // In the case of the Ajax Controller, the view is an array
        // which can can be accessed as follows. This array will be
        // converted to JSON when this script ends and sent to the client
        // automatically
        // $this->view['redirect'] = 'home.php';
        header('Location: home.php');
    }

}

$controller = new Controller();