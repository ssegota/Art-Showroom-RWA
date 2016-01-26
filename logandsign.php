    <?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

    
    if(!(isset($_SESSION['loggedin']))){
        print("<a href=\"login_form.php\">Log in.</a><br><a href=\"signupform.php\">Sign up.</a>");
    
    }
    else{
        print("<a href=\"profile.php\">".$_SESSION['login_user']."</a><br><a href=\"logout.php\">Log Out.</a>");   
    }
    ?>