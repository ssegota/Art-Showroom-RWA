    <?php

    session_start();

    
    if(!(isset($_SESSION['loggedin']))/* && !$_SESSION['loggedin']==1*/){
        print("<a href=\"login_form.php\">Log in.</a><br><a href=\"signup_form.php\">Sign up.</a>");
    
    }
    else{
        print("Welcome <a href=\"profile.php\">". $_SESSION['login_user'] .".</a><br><a href=\"logout.php\">Log Out.</a>");   
    }
    ?>