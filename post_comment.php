<?php

// Init
include('app/core/initialize.php');

// Controller
class Controller extends AjaxController {
    public function __construct() {
        parent::__construct();

        // Save Rant/Comment
        $rant = Rant::insert($_POST);

        // In the case of the Ajax Controller, the view is an array
        // which can can be accessed as follows. This array will be
        // converted to JSON when this script ends and sent to the client
        // automatically
        $this->view['response'] = 'Rant ' . $rant->rant_id . ' was successfully created';

    }

}

$controller = new Controller();