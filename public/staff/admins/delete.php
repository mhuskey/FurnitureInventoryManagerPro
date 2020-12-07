<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

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
                
                <p>Are you sure you want to delete this admin?</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
