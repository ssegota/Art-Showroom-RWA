<?php
if(!isset($login_session))
    print("<a href=\"login_form.php\">Log in.</a> <a href=\"signupform.php\">Sign Up.</a>");
else
print("Welcome.");
?>