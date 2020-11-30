<?php require_once('../private/initialize.php'); ?>

<?php
  if($session->is_logged_in()) {
    include(SHARED_PATH . '/staff_header.php');
  } else {
    include(SHARED_PATH . '/public_header.php');
  }
?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center align-middle">
                <img src="<?php echo url_for('/assets/images/hero.jpg'); ?>" class="img-fluid rounded" alt="Hero Image">
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
