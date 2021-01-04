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
          <div class="container">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center align-middle">
                <img src="<?php echo url_for('/assets/images/hero.jpg'); ?>" class="img-fluid rounded" alt="Hero Image"><br /><br />
                
                <h5>Furntiure Inventory Manager Pro is an open source PHP web app.</h5><br />
                
                <h5>Visit <a href="https://matthewhuskey.com" target="_blank">My Portfolio</a> for additional information about me and my apps.</h5><br /><br />
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
