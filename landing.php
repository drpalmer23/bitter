<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bitter</title>
    <link rel="shortcut icon" href="images/crowThumb.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href='http://fonts.googleapis.com/css?family=Amatic+SC:700,400' rel='stylesheet' type='text/css'>
</head>
<body class="landing">
    <div class="header">
        <a class="logo-link" href="#">
            <span class="logo">
                <img src="images/crowThumb.png">
            </span>
        </a>
    </div>

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
                <form>
                    <label>Username or Email:</label>
                    <input class="username" type="text" name="username" placeholder="ex: BitterBOB or BOB&#64;email.com"> 
                    <label>Password:</label>
                    <input class="password" type="password" name="password" placeholder="min: 6 characters, 1 number">
                    <button class="signin" type="submit">Sign In</button>
                    <input class="remember-me" type="checkbox" checked="checked" name="remember-me"> 
                    <span>Remember me</span>
                    <a href="#">Forgot password<span class="question-mark">???</span></a>
                </form>
            </div>
            <div class="register">
                <h2>New to Bitter<span class="question-mark">???  Sign Up Here</span></h2>
                <form>
                    <label>First Name:</label>
                    <input class="first-name" type="text" name="first-name" placeholder="ex: Bobby"></input>
                    <label>Last Name:</label>
                    <input class="last-name" type="text" name="last-name" placeholder="ex: Bittersworth">
                    <label>Email:</label>
                    <input class="email" type="text" name="email" placeholder="ex: BitterBOB or BOB&#64;email.com"></input>
                    <label>Password:</label>
                    <input class="password" type="password" name="password" placeholder="min: 6 characters, 1 number"></input>
                    <label>Birthdate:</label>
                    <input class="dob" type="date" name="dob"></input>
                    <button class="register" type="submit">Sign Up for Bitter</button>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="main.js"></script>
</html>