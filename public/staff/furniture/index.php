<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  $sql       = "SELECT * FROM furniture";
  $furniture = Furniture::find_by_sql($sql);
?>

<?php $page_title = 'Furniture Index'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center">
                <h1>Furniture</h1>
                
                <a href="<?php echo url_for('/staff/furniture/new.php'); ?>"><button type="button" class="btn btn-primary">Create Item</button></a>
                
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Brand</th>
                      <th>Item</th>
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php foreach($furniture as $item) { ?>
                      <tr>
                        <td class="text-center align-middle"><?php echo h($item->brand); ?></td>
                        <td class="text-center align-middle"><?php echo h($item->item); ?></td>
                        <td class="text-center align-middle"><?php echo h($item->stock); ?></td>
                        <td class="text-center align-middle"><?php echo h($item->category); ?></td>
                        <td class="text-center align-middle"><?php echo h('$' . number_format($item->price, 2)); ?></td>
                        <td class="text-center align-middle"><a class="action" href="<?php echo url_for('/staff/furniture/show.php?id=' . h(u($item->id))); ?>">View</a></td>
                        <td class="text-center align-middle"><a class="action" href="<?php echo url_for('/staff/furniture/edit.php?id=' . h(u($item->id))); ?>">Edit</a></td>
                        <td class="text-center align-middle"><a class="action" href="<?php echo url_for('/staff/furniture/delete.php?id=' . h(u($item->id))); ?>">Delete</a></td>
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
