<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  $failed = false;
  
  if(is_post_request()) {
    // Create record using POST parameters
    $args = $_POST['admin'];
    
    $admin  = new admin($args);
    $result = $admin->save();
    
    if($result === true) {
      $session->message("The admin was created successfully.");
      redirect_to(url_for('/staff/admins/show.php?id=' . $admin->id));
    } else {
      // Signup failed, set `$failed` to `true`
      $failed = true;
    }
    
  } else {
    // If not a POST request, just display the blank form
    $admin = new admin;
  }
?>

<?php $page_title = 'Create Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col align-self-center col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h1 class="text-center">Create Admin</h1>
                
                <?php echo display_errors($admin->errors); ?>
                
                <h5 class="text-center"><a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Admins</a></h5><br />
                
                <form action="<?php echo url_for('/staff/admins/new.php'); ?>" method="post">
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
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-margin btn-no-left-margin">Create Admin</button>
                    
                    <a href="<?php echo url_for('/staff/admins/index.php'); ?>"><button type="button" class="btn btn-secondary btn-margin">Cancel</button></a><br />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
