<?php require_once('../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Furniture Inventory Manager Pro Staff Area'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1">
                <h1 class="text-center">Furniture Inventory Manager Pro Staff Area</h1>
                
                <div class="row">
                  <div class="col-sm-10 offset-sm-1">
                    <div class="card border-primary mb-4 text-center">
                      <h5 class="card-header text-primary">Departments</h5>
                      <div class="card-body">
                        <p class="card-text">View and edit all furniture in the Furniture Inventory Manager Pro database.</p>
                        <a href="<?php echo url_for('/staff/furniture/index.php'); ?>" class="btn btn-primary">Departments</a>
                      </div>
                    </div>
                  </div>
                  
                  <div class="col-sm-10 offset-sm-1">
                    <div class="card border-success mb-4 text-center">
                      <h5 class="card-header text-success">Profiles</h5>
                      <div class="card-body">
                        <p class="card-text">View and edit Furniture Inventory Managager Pro admins.</p>
                        <a href="<?php echo url_for('/staff/admins/index.php'); ?>" class="btn btn-success">Profiles</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
