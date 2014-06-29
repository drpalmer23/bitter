<?php

// Init
include($_SERVER['DOCUMENT_ROOT'] . '/bitter/app/core/initialize.php');

// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();
	
        // Add Files Payload
        Payload::js('/bitter/examples/register/register.js');
        Payload::css('/bitter/bower_components/ReptileForms/dist/reptileforms.min.css');
    }

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<h1><?php echo $welcome; ?></h1>