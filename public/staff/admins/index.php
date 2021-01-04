<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  $sql    = "SELECT * FROM admins";
  $admins = Admin::find_by_sql($sql);
?>

<?php $page_title = 'Admins Index'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center">
                <h1>Admins</h1>
                
                <h5><a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Staff</a></h5><br />
                
                <a href="<?php echo url_for('/staff/admins/new.php'); ?>"><button type="button" class="btn btn-primary">Create Admin</button></a>
                
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th class="align-middle">ID</th>
                      <th class="align-middle">First Name</th>
                      <th class="align-middle">Last Name</th>
                      <th class="align-middle">Email</th>
                      <th class="align-middle">Username</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  
                  <tbody class="align-middle">
                    <?php foreach($admins as $admin) { ?>
                      <tr class="align-middle">
                        <td class="align-middle"><?php echo h($admin->id); ?></td>
                        <td class="align-middle"><?php echo h($admin->first_name); ?></td>
                        <td class="align-middle"><?php echo h($admin->last_name); ?></td>
                        <td class="align-middle"><?php echo h($admin->email); ?></td>
                        <td class="align-middle"><?php echo h($admin->username); ?></td>
                        <td class="align-middle"><a href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin->id))); ?>"><button type="button" class="btn btn-primary">View</button></a></td>
                        <td class="align-middle"><a href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin->id))); ?>"><button type="button" class="btn btn-info">Edit</button></a></td>
                        <td class="align-middle"><a href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin->id))); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
