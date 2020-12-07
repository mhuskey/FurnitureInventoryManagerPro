<?php
  function require_login() {
    // Using `global` for scope so that we can check Session status
    global $session;
    if(!$session->is_logged_in()) {
      redirect_to(url_for('staff/login.php'));
    } else {
      // Do nothing, let the rest of the page proceed
    }
  }
  
  function display_errors($errors=array()) {
    $output = '';
    
    if(!empty($errors)) {
      $output .= '<div class="alert alert-danger" id="message" role="alert">';
      $output .= '<h5 class="alert-heading">Please fix the following errors:</h5>';
      $output .= '<ul>';
      foreach($errors as $error) {
        $output .= "<li>" . h($error) . "</li>";
      }
      $output .= "</ul>";
      $output .= "</div><br />";
    }
    return $output;
  }
  
  function get_and_clear_session_message() {
    if(isset($_SESSION['message']) && $_SESSION['message'] != '') {
      $msg = $_SESSION['message'];
      unset($_SESSION['message']);
      return $msg;
    }
  }
  
  function display_session_message() {
    $msg = get_and_clear_session_message();
    if(!is_blank($msg)) {
      return '<div class="alert alert-success alert-dismissible fade show" id="message" role="alert">' . h($msg) .
        '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }
  }
?>
