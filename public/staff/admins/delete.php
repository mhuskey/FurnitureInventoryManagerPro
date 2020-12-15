<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/admins/index.php'));
  }
  $id = $_GET['id'];
  
  $admin = Admin::find_by_id($id);
  if($admin == false) {
    redirect_to(url_for('staff/admins/index.php'));
  }
  
  if(is_post_request()) {
    // Delete admin
    $result = $admin->delete();
    $session->message('The admin was deleted successfully.');
    redirect_to(url_for('/staff/admins/index.php'));
  } else {
    // Display form
  }
?>

<?php $page_title = 'Delete Admin'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center">
                <h1>Delete Admin</h1>
                
                <h5><a class="back-link" href="<?php echo url_for('/staff/admins/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Admins</a></h5><br />
                
                <p>Are you sure you want to delete this admin?</p><br />
                
                <h5><?php echo h($admin->full_name()) . " - " . $admin->username; ?></h5><br /><br />
                
                <form action="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin->id))); ?>" method="post">
                  <a href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin->id))); ?>"><button type="button" class="btn btn-secondary btn-margin">Cancel</button></a>
                  <button type="submit" class="btn btn-danger btn-margin" name="commit">Delete Admin</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
