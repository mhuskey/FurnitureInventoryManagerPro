<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  if(!isset($_GET['id'])) {
    redirect_to(url_for('staff/admins/index.php'));
  }
  $id = $_GET['id'];
  $admin = Admin::find_by_id($id);
  if($admin == false) {
    redirect_to(url_for('staff/admins/index.php'));
  }
  
  if(is_post_request()) {
    // Save record using POST parameters
    $args = $_POST['admin'];
    
    $admin->merge_attributes($args);
    $result = $admin->save();
    
    if($result === true) {
      $session->message("The admin was updated successfully.");
      redirect_to(url_for('/staff/admins/show.php?id=' . $admin->id));
    } else {
      // Show errors
    }
    
  } else {
    // Not a POST request
  }
?>

<?php $page_title = 'Edit Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col align-self-center col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h1>Edit Admin</h1>
                
                <?php echo display_errors($admin->errors); ?>
                
                <h5 class="text-center"><a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Admins</a></h5><br />
                
                <form action="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($id))); ?>" method="post">
                  <div class="form-group">
                    <label for="inputFirstName">First Name</label>
                    <input type="text" class="form-control" name="admin[first_name]" value="<?php echo h($admin->first_name); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputLastName">Last Name</label>
                    <input type="text" class="form-control" name="admin[last_name]" value="<?php echo h($admin->last_name); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail">Email Address</label>
                    <input type="email" class="form-control" name="admin[email]" value="<?php echo h($admin->email); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername">Username</label>
                    <input type="text" class="form-control" name="admin[username]" value="<?php echo h($admin->username); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" class="form-control" name="admin[password]" value="" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputPassword">Confirm Password</label>
                    <input type="password" class="form-control" name="admin[confirm_password]" value="" />
                  </div>
                  
                  <p>
                    Passwords must be at least 6 characters, and include at least one uppercase letter, lowercase letter, number, and symbol.
                  </p>
                  <br />
                  
                  <button type="submit" class="btn btn-primary btn-block btn-margin btn-no-left-margin">Edit Admin</button><br />
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
