<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  $sql  = "SELECT * FROM admins";
  $admins = Admin::find_by_sql($sql);
?>

<?php $page_title = 'Admins'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center">
                <h1>Admins</h1>
                
                <div class="actions">
                  <a class="action" href="<?php echo url_for('/staff/admins/new.php'); ?>">Add Admin</a>
                </div>
                
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>ID</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php foreach($admins as $admin) { ?>
                      <tr>
                        <td class="text-center align-middle"><?php echo h($admin->id); ?></td>
                        <td class="text-center align-middle"><?php echo h($admin->first_name); ?></td>
                        <td class="text-center align-middle"><?php echo h($admin->last_name); ?></td>
                        <td class="text-center align-middle"><?php echo h($admin->email); ?></td>
                        <td class="text-center align-middle"><?php echo h($admin->username); ?></td>
                        <td class="text-center align-middle"><a class="action" href="<?php echo url_for('/staff/admins/show.php?id=' . h(u($admin->id))); ?>">View</a></td>
                        <td class="text-center align-middle"><a class="action" href="<?php echo url_for('/staff/admins/edit.php?id=' . h(u($admin->id))); ?>">Edit</a></td>
                        <td class="text-center align-middle"><a class="action" href="<?php echo url_for('/staff/admins/delete.php?id=' . h(u($admin->id))); ?>">Delete</a></td>
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
