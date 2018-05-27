<?php
//Kaveendra S.P.D
//uncomment *** marked comments if you want to see the flow of process
//***echo "<script> alert('CSRF Generation end point called');</script>";
//session creation
session_start();
//set session variable for check user loging status
$_SESSION['LoginState'] = 'SET';

//setting a cookie for current session
$sessionID = session_id();
$expiry = time()+60*60*24;
setcookie('Name', $sessionID, $expiry, '', '', '', TRUE);

//CSRF Token generating process
$CSRF_TOKEN = hash('sha256', $sessionID.rand(1000,10000));

//storing CSRF Token locally
//**echo "session id".$sessionID;
$filename = getcwd().'\tokens\\'.$sessionID.".txt";
//**echo $filename;
$TokenFile = fopen($filename, "w") or die("Unable to Create Token");
fwrite($TokenFile, $CSRF_TOKEN);
fclose($TokenFile);
header('Location: /Home.php');
?>
