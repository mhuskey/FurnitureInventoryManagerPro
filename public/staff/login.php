<?php
  require_once('../../private/initialize.php');
  
  $errors   = [];
  $username = '';
  $password = '';
  $failed   = false;
  
  if(is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validations
    if(is_blank($username)) {
      $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
      $errors[] = "Password cannot be blank.";
      // Login failed, set `$failed` to `true`
      $failed   = true;
    }
    
    // If there were no errors, try to login
    if(empty($errors)) {
      $admin = Admin::find_by_username($username);
      // test if admin found and password is correct
      if($admin != false && $admin->verify_password($password)) {
        // Mark admin as logged in
        $session->login($admin);
        $_SESSION['message'] = 'Log in successful!';
        redirect_to(url_for('/staff/index.php'));
      } else {
        // username not found or password does not match
        // Login failed, set `$failed` to `true`
        $failed   = true;
        $errors[] = "Log in was unsuccessful.";
      }
    }
  }
?>

<?php $page_title = 'Log In'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

  <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container">
            <div class="row">
              <div class="col align-self-center col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h1 class="text-center">Log In</h1>
                
                <?php echo display_errors($errors); ?>
                
                <form action="login.php" method="post">
                  <div class="form-group">
                    <label for="loginInputUsername">Username</label>
                    <input type="text" class="form-control" name="username" <?php if($failed===false) { echo "autofocus"; } ?> value="<?php if($failed===true) { echo h($username); } ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="loginInputPassword">Password</label>
                    <input type="password" class="form-control" name="password" <?php if($failed===true) { echo "autofocus"; } ?> />
                  </div>
                  
                  <button type="submit" class="btn btn-primary btn-block btn-margin btn-no-left-margin">Log In</button><br />
                </form>
                
                <p>Not a member? <a href="<?php echo url_for('/staff/signup.php'); ?>">Sign up here</a>.</p><br />
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
