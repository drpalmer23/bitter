<?php

// session_start();
// 
// if (!isset($_SESSION['user_id'])) {
//     header('Location: index.php');
//     exit();
// }

// Init
include('app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();


    }

}

$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<body class="account">
<div class="main">
    <div class="container">
        <div class="left-boxes">

            <div class="user-summary">
                <div class="cover-photo">Add Cover Photo</div>
                <div class="profile-photo">
                    <img src="images/blankprofilepic.jpg" alt="Add Profile Photo">
                </div>

                <div class="names">
                    <p class="full-name">Bobby Bittersworth</p>
                    <p class="user-name">@BitterBob</p>
                </div>

                <div class="user-activity">
                    <span class="rant-count">
                        <div class="title">Rants</div>
                        <div class="number">1204</div>
                    </span>  
                    <span class="following-count"> 
                        <div class="title">Following</div>
                        <div class="number">163</div>
                    </span>   
                    <span class="follower-count">
                        <div class="title">Followers</div>
                        <div class="number">34</div>
                    </span>
                </div>
            </div>
            <div class="bio">
                <h1>Bio</h1>
                <p>Update your bio</p>
                <form id="bio" action="" method="POST">
                    <textarea name="bio" form="bio" class="bio-text" cols="30" rows="10" maxlength="255" placeholder="Write a bit about yourself..." value="" required></textarea>
                    <button type="submit">Save Bio</button>
                </form>
            </div>
        </div>

        <div class="account-info">
            <h1>Account</h1>
            <p>Update your account settings</p>
            <form class="reptile-form update-account" action="" method="POST">
                <input type="text" title="First Name:" class="first-name" name="first-name" value="" required>
                <input type="text" title="Last Name:" class="last-name" name="last-name" value="" required>
                <input type="text" title="Username:" class="username" name="username" value="" required>
                <input type="email" title="Email:" class="email" name="email" value="" required>
                <input type="text" title="Zip Code:" class="zip" name="zip" value="">
                <input type="date" title="Birthdate:" class="dob" name="dob" value="" required>
                <button type="submit">Save</button>
            </form>
        </div>


        <div class="password-reset">
            <h1>Reset Password</h1>
            <p>Click button to reset password</p>
            <div class="button">
                <button id="reset-pw">Reset Password</button>
            </div>
            <form action="" class="reptile-form pw-reset" method="POST">
                <input type="password" title="Current Password:" class="password" name="password" required>
                <input type="password" title="New Password:" class="new-password" name="new-password" required>
                <input type="password" title="Confirm New Password:" class="confirm-pw" name="confirm-pw" required>
                <button type="submit" id="save-pw">Save Password</button>
            </form>
        </div>
        
        <div class="delete-account">
            <h1>Delete Account</h1>
            <p>Click button to leave Bitter</p>
            <div class="button">
                <button id="delete-account">Delete Account</button>
            </div>
        </div>

    </div>
</div>
</body>