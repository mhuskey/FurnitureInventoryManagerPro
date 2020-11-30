<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1">
                <h2>Main Menu</h2>
                
                <ul>
                  <li><a href="<?php echo url_for('/staff/furniture/index.php'); ?>">Furniture</a></li>
                  <li><a href="<?php echo url_for('/staff/admins/index.php'); ?>">Admins</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
