<?php
  require_once('../../private/initialize.php');
  
  // Log out the admin
  $session->logout();
  $_SESSION['message'] = 'Log out successful!';
  redirect_to(url_for('/staff/login.php'));
?>
