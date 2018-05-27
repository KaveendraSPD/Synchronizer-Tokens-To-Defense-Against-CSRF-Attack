<?php
//Kaveendra S.P.D
//uncomment *** marked comments if you want to see flow of the process
//***echo "<script> alert('Token issuer invoked '); </script>";
session_start();
//checking request type and loging status
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
  //extract user session id from ajax request
  $SESSION_ID = $_POST['cookieValue'];
  //***echo "<script> alert($SESSION_ID); </script>";
  if (!isset ($_SESSION['LoginState'])){
      ob_start();
      header('Location: localhost/login.html');
      ob_end_flush();
      die();
  } else {
      //opening matched token file and retrive CSRF token using $SESSION_ID
      $TOKEN_FILE = fopen(getcwd().'\tokens\\'.$SESSION_ID.".txt", "r") or die ("Invalid Token !!!");
      $TOKEN = fread($TOKEN_FILE, filesize(getcwd().'\tokens\\'.$SESSION_ID.".txt"));
      //***echo "<script> alert($TOKEN); </script>";
      fclose($TOKEN_FILE);
      //generating ajax response
	    header('Content-Type: application/json');
      echo json_encode($TOKEN);
  }

} else {
  ob_start();
  header('Location: localhost/login.html');
  ob_end_flush();
  die();
}
?>
