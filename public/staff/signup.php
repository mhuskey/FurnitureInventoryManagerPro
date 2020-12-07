<?php
  require_once('../../private/initialize.php');
  
  // Create temporary admin object so that `display_errors()`
  // doens't result in warning for non-POST requests
  $admin = new admin();
  $failed = false;
  
  // If logged in, then redirect admin to `staff/index.php`
  if($session->is_logged_in()) {
    redirect_to(url_for('/staff/index.php'));
  }
  
  if(is_post_request()) {
    // Create record using POST parameters
    $args = $_POST['admin'];
    $admin = new admin($args);
    
    $result = $admin->save();
    
    if($result === true) {
      // Log in new admin
      $session->login($admin);
      $_SESSION['message'] = 'Sign up successful!';
      redirect_to(url_for('/staff/index.php'));
    } else {
      // Signup failed, set `$failed` to `true`
      $failed = true;
    }
    
  }
?>

<?php $page_title = 'Sign Up'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col align-self-center col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h1 class="text-center">Sign Up</h1>
                
                <?php echo display_errors($admin->errors); ?>
                
                <form action="<?php echo url_for('/staff/signup.php'); ?>" method="post">
                  <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" name="admin[first_name]" <?php if(is_blank($admin->first_name)) { echo "autofocus"; } ?> value="<?php if($failed===true) { echo h($admin->first_name); } ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" name="admin[last_name]" <?php if($failed===true && !is_blank($admin->first_name) && is_blank($admin->last_name)) { echo "autofocus"; } ?> value="<?php if($failed===true) { echo h($admin->last_name); } ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail">Email Address</label>
                    <input type="email" class="form-control" name="admin[email]" <?php if($failed===true && !is_blank($admin->first_name) && !is_blank($admin->last_name) && is_blank($admin->email)) { echo "autofocus"; } ?> value="<?php if($failed===true) { echo h($admin->email); } ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" name="admin[username]" <?php if($failed===true && !is_blank($admin->first_name) && !is_blank($admin->last_name) && !is_blank($admin->email) && is_blank($admin->username)) { echo "autofocus"; } ?> value="<?php if($failed===true) { echo h($admin->username); } ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="admin[password]" <?php if($failed===true && !is_blank($admin->first_name) && !is_blank($admin->last_name) && !is_blank($admin->email) && !is_blank($admin->username)) { echo "autofocus"; } ?> />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword">Confirm Password</label>
                    <input type="password" class="form-control" name="admin[confirm_password]" />
                  </div>
                  
                  <p>
                    Passwords must be at least 6 characters, and include at least one uppercase letter, lowercase letter, number, and symbol.
                  </p>
                  <br />
                  
                  <button type="submit" class="btn btn-primary btn-block btn-margin btn-no-left-margin">Sign Up</button>
                </form>
                
                <p>Already a member? <a href="<?php echo url_for('/staff/login.php'); ?>">Log in here</a>.</p><br />
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
