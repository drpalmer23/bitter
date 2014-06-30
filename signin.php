<?php

// Init
include('app/core/initialize.php');

// Controller
class Controller extends AppController {
	public function __construct() {
		parent::__construct();

		// Create welcome variable in view
		$this->view->welcome = 'Welcome to MVC';
	
    }

}

$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<body class="landing">

    <div class="main">
        <div class="content">
            <div class="welcome">
                <h1>Welcome to Bitter.</h1>
                <p>"If you have nothing nice to say... <br>
                well, now you have a place to say it."</p>
                <p>Rant, rave, vent, shout, get it all out. <br>
                Follow what others are Ranting about,<br>
                then Rant along or about others' Rants.</p>
            </div>
            <div class="login">
                <form class="rf-login" action="" method="POST">
                    <input class="username" title="Username or Email:" type="text" name="username" placeholder="ex: BitterBOB123  or  BOBBY&#64;email.com"> 
                    <input class="password" title="Password:" type="password" name="password" placeholder="min: 6 characters, 1 number">
                    <button class="signin" type="submit">Sign In</button>
                    <input class="remember-me" type="checkbox" checked="checked" name="remember-me"> 
                    <span>Remember me</span>
                    <a href="#">Forgot password<span class="question-mark">???</span></a>
                </form>
            </div>
            <div class="register">
                <h2>New to Bitter<span class="question-mark">???  Sign Up Here</span></h2>
                <form class="rf-register" action= "reg.php" method="POST">
                    <input class="first-name" title="First Name:" type="text" name="first-name" placeholder="ex: Bobby"></input>
                    <input class="last-name" title="Last Name:" type="text" name="last-name" placeholder="ex: Bittersworth">
                    <input class="username" title="Username:" type="text" name="username" placeholder="ex: BitterBOB123" maxlength="15" required>
                    <input class="email" title="Email:"type="text" name="email" placeholder="ex: BitterBOB or BOB&#64;email.com" maxlength="100" required></input>
                    <input class="password" title="Password:" type="password" name="password" placeholder="min: 6 characters, 1 number" required></input>
                    <input class="dob" title="Birthdate:" type="date" name="dob" required></input>
                    <button class="register" type="submit">Sign Up for Bitter</button>
                </form>
            </div>
        </div>
    </div>

</form>

</body>


