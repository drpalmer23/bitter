<header>
<div class="header">
<div class="container">

        <div class="left-menu">
            <span class="navigation">
                <a href="home.php" class="home-nav">
                    <span class="icon"><i class="fa fa-home"></i></span>
                    <span class="icon-name">Home</span>
                </a>
                <a href="" class="alert-nav">
                    <span class="icon"><i class="fa fa-bell"></i></span>
                    <span class="icon-name">Alerts</span>
                </a>
                <a href="" class="me-nav">
                    <span class="icon"><i class="fa fa-user"></i></span>
                    <span class="icon-name">Me</span>
                </a>
            </span>
        </div>

        <a class="logo-link" href="#">
            <span class="logo">
                <img src="images/crowThumb.png">
            </span>
        </a>

        <div class="right-menu">
            <span class="search-bar">
                <form class="search">
                    <input class="search" name="search" placeholder="Search">
                    <button class="search"><i class="fa fa-search"></i></button>
                </form> 
            </span>  
            <div class="menu">
                <span class="icon"><i class="fa fa-bars"></i></span>
                <div class="menu-content">
                    <a class="profile" href="#">My Profile</a>
                    <a class="account" href="account.php">Edit Account</a>
                    <form id="logOut" action="index.php" method="POST">
                        <button type='submit' class='log-out' class="log-out" href="">Log Out</button>
                        <input type='hidden' name='action' value='logOut'>
                    </form>
                </div>
            </div>
            <!-- need messaging, settings added later -->
        </div>
    </div>
</div>
</header>