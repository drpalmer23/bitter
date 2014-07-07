<?php
session_start();


// Init
include('app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // delete User Account
        $user = db::deleteUserRants($_POST);
        $user = db::deleteUser($_POST);

        // In the case of the Ajax Controller, the view is an array
        // which can can be accessed as follows. This array will be
        // converted to JSON when this script ends and sent to the client
        // automatically
        header('Location: index.php');

    }

}

$controller = new Controller();