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

<body class="home">
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

            <div class="write-new">
              <div class="text">
                  <form id="new-post" action="" method="POST">
                    <textarea name="new-post" form="new-post" class="new-post" cols="30" rows="10" maxlength="255" placeholder="Write New Rant..." required></textarea>
                    <!-- <input type="text" class="new-post" value="Lorem ipsum dolor sit amet, nonummy ligula volutpat hac integer nonummy. Suspendisse ultricies, congue etiam tellus, erat libero, nulla eleifend, mauris pellentesque. Suspendisse integer praesent vel, integer gravida mauris, fringilla vehicula lacinia non" name="new-post" placeholder="Write New Rant..." required> -->
                    <div class="post-options">
                        <button type="submit">Post  Rant</button>
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

        <div class="rants-stream">
            <h1>Rants &amp; Raves</h1>
            <div class="new-rants">
                <span># new rants</span>
            </div>
            <div class="rant">
                <img class="user-pic" src="">
                <div class="content">
                    <span class="full-name">mmmmmmmmmmmmmmmmmm mmmmmmmmmmmmmmm</span>
                    <span class="user-name">@mmmmmmmmmmmmmmm</span>
                    <span class="rant-age">365days</span>
                    <p class="comment">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At odit amet iste itaque maiores temporibus similique cumque, maxime molestias consequatur.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique possimus, provident deserunt cupiditate. Excepturi quidem aliquid similique expedita facilis maxime.
                    </p>
                    <div class="footer">
                        <a href="#" class="reply">
                            <span class="icon">X</span>
                            <span class="icon-name">Reply</span>
                        </a>
                        <!-- future share, favorite buttons here -->
                    </div>
                </div>
            </div>   

            <div class="rant">
                <img class="user-pic" src="">
                <div class="content">
                    <span class="full-name">
                        <span class="first-name">Bobby</span> 
                        <span class="last-name">Bittersworth</span>
                    </span>
                    <span class="user-name">@BitterBob</span>
                    <span class="rant-age">2m</span>
                    <p class="comment">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique possimus, provident deserunt cupiditate. Excepturi quidem aliquid similique expedita facilis maxime.
                    </p>
                    <div class="footer">
                        <a href="#" class="reply">
                            <span class="icon">X</span>
                            <span class="icon-name">Reply</span>
                        </a>
                        <!-- future share, favorite buttons here -->
                    </div>
                </div>
            </div>    

            <div class="rant">
                <div class="user-pic">
                    <img src="">
                </div>
                <div class="content">
                    <span class="full-name">
                        <span class="first-name">Bobby</span> 
                        <span class="last-name">Bittersworth</span>
                    </span>
                    <span class="user-name">@BitterBob</span>
                    <span class="rant-age">2m</span>
                    <p class="comment">
                        Lorem ipsum dolor sit amet.
                    </p>
                    <div class="footer">
                        <a href="#" class="reply">
                            <span class="icon">X</span>
                            <span class="icon-name">Reply</span>
                        </a>
                        <!-- future share, favorite buttons here -->
                    </div>
                </div>
            </div>             
        </div>

        <div class="right-boxes">
            <div class="who-to-follow">
                <h1>Who to Follow</h1>
                <div>
                    <div>
                        <img class="user-pic" src="">
                        <span class="full-name">MMmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmm</span>
                        <span class="user-name">@mmmmmmmmmmmmmmm</span> 
                        <button class="follow">Follow</button>
                    </div>  
                    <div>
                        <img class="user-pic" src="">
                        <span class="full-name">MMmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmm</span>
                        <span class="user-name">@mmmmmmmmmmmmmmm</span> 
                        <button class="follow">Follow</button>
                    </div>  
                    <div>
                        <img class="user-pic" src="">
                        <span class="full-name">MMmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmm</span>
                        <span class="user-name">@mmmmmmmmmmmmmmm</span> 
                        <button class="follow">Follow</button>
                    </div>  
                    <div>
                        <img class="user-pic" src="">
                        <span class="full-name">MMmmmmmmmmmmmmmmm mmmmmmmmmmmmmmmm</span>
                        <span class="user-name">@mmmmmmmmmmmmmmm</span> 
                        <button class="follow">Follow</button>
                    </div>  
                </div>
            </div>          
            <div class="about-bitter">
                <h1>About Bitter</h1>
                <div>
                    Bitter&#8482; is what you, the user's, make it. Bitter is still in it's infancy stages of development and working on adding many more applications. <br>
                    Stay tuned to see what's next. 
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>