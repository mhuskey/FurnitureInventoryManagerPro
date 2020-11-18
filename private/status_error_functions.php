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
      $output .= "</div>";
    }
    return $output;
  }
  
  function display_session_message() {
    global $session;
    $msg = $session->message();
    
    if(isset($msg) && $msg != '') {
      $session->clear_message();
      return '<div id="message">' . h($msg) . '</div>';
    }
  }
?>
