<?php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

// Init
include('app/core/initialize.php');

// Controller
class Controller extends AppController {
    public function __construct() {
        parent::__construct();
        

        //show user info in user summary for this session
            $user = new User($_SESSION['user_id']);

            $this->view->user = $user;

        //sql query and function to get all rants
            $sql = "
                SELECT *
                FROM rant
                JOIN user USING (user_id)
                ORDER BY parent_rant_id DESC, rant_id 
                ";

            $rant_results = db::execute($sql);

            while ($row = $rant_results->fetch_assoc()) {
                $rant_html .= Rant::getRant($row);
            }

            $this->view->rant_html = $rant_html;

        //sql query and function to get who to follow list
            $sql = "
            SELECT user_name, first_name, last_name
            FROM user
            ORDER BY user_id DESC
            LIMIT 4
            ";

            $wtf_results = db::execute($sql);

            while ($row = $wtf_results->fetch_assoc()) {
                $wtf_html .= user::getMiniProfiles($row);
            }

            $this->view->wtf_html = $wtf_html;
    }

}

$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<body class="home">
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

            <div class="write-new">
              <div class="text">
                  <form id="new-post" action="post.php" method="POST">
                    <textarea name="new-post" form="new-post" class="new-post" cols="30" rows="10" maxlength="255" placeholder="Write New Rant Here..." required></textarea>
                    <div class="post-options">
                    <button id="post-rant" type="submit">Post</button>
                    </div>
                  </form>
              </div> 
            </div>


            <div class="trends">
                <h1>Trending</h1>
                <div>
                    <a href="#">
                        #Bitter
                    </a>
                </div>
                <div>
                    <a href="#">
                        #FIFAWorldCup2014 
                    </a>
                </div>
                <div>
                    <a href="#">
                        #CustomerService
                    </a>
                </div>
            </div>
        </div>

        <div class="rants-raves">
            <h1>Rants &amp; Raves</h1>
            <div class="new-rants">
                <span># new rants</span>
            </div>
            <div class="rant-list">
            <?php echo $rant_html; ?>         
            </div>           
        </div>

        <div class="right-boxes">
            <div class="who-to-follow">
                <h1>Who to Follow</h1>
                <div>
                <?php echo $wtf_html; ?>
                </div>
            </div>          
            <div class="about-bitter">
                <h1>About Bitter</h1>
                <div>
                    Bitter&#8482; offers a place for you rant, rave, vent, or complain, when your bitter about something. Bitter is still in it's early stages of development and working on adding many more applications. <br>
                    Stay tuned to see what's next. 
                </div>
            </div>
        </div>
    </div>
</div>

</body>