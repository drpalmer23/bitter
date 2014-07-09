<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$page_title='Bitter';
// Init
include('app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();

        //show user info in user summary for this session
        $user = new User($_SESSION['user_id']); 
        $this->view->user = $user;


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
                <div class="cover-photo">
                    <img src="images/palm.jpg" alt="Add Cover Photo">
                </div>
                <div class="profile-photo">
                    <img src="images/dp.jpg" alt="Add Profile Photo">
                </div>

                <div class="names">
                    <p class="full-name"><?php echo $user->first_name; ?> <?php echo $user->last_name; ?></p>
                    <p class="user-name">@<?php echo $user->user_name; ?></p>
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
                <form id="bio" action="updatebio.php" method="POST">
                    <textarea name="bio-text" form="bio" class="bio-text" cols="30" rows="10" maxlength="255" placeholder="Write a bit about yourself..." required><?php echo $user->bio; ?></textarea>
                    <button type="submit">Save Bio</button>
                </form>
            </div>
        </div>

        <div class="account-info">
            <h1>Account</h1>
            <p>Update your account settings</p>
            <form class="reptile-form update-account" action="update_account.php" method="POST">
                <input type="text" title="First Name:" class="first-name" name="first-name" value="<?php echo $user->first_name; ?>" required>
                <input type="text" title="Last Name:" class="last-name" name="last-name" value="<?php echo $user->last_name; ?>" required>
                <input type="text" title="Username:" class="username" name="username" value="<?php echo $user->user_name; ?>" required>
                <input type="email" title="Email:" class="email" name="email" value="<?php echo $user->email; ?>" required>
                <input type="text" title="Zip Code:" class="zip" name="zip" placeholder="enter zip" pattern=".{5,}" value="<?php echo $user->zip; ?>">
                <input type="date" title="Birthdate:" class="dob" name="dob" value="<?php echo $user->dob; ?>" required>
                <button type="submit">Save</button>
            </form>
        </div>


        <div class="password-reset">
            <h1>Reset Password</h1>
            <p>Click button to reset password</p>
            <div class="button">
                <button id="reset-pw">Reset Password</button>
            </div>
            <form action="resetPassword.php" class="reptile-form pw-reset" method="POST">
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
                <form id="delete-user" action="delete_user.php" method="POST">
                    <button id="delete-account" type="submit">Delete Account</button>
                    <input type='hidden' name='action' value='delete'>
                </form>
            </div>
        </div>

    </div>
</div>
</body>