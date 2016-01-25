<?php
@mysql_connect("localhost", "root", "vertrigo");
@mysql_select_db("rwa_projekt");

// username and password sent from form
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
/*
// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
*/
$mypassword=md5($mypassword);
$sql="SELECT COUNT(*) FROM korisnik WHERE username='". $myusername."' and pass='".$mypassword."'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$number=$row['COUNT(*)'];
// Mysql_num_row is counting table row


// If result matched $myusername and $mypassword, table row must be 1 row

if($number==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername']= "myusername";
header("location:login_success.php");
}
else {
print("Wrong Username or Password");
}
print( $result." " .$sql)
?>