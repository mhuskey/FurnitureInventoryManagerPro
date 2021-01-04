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
                
                <h5><a class="back-link" href="<?php echo url_for('/staff/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Staff</a></h5><br />
                
                <a href="<?php echo url_for('/staff/furniture/new.php'); ?>"><button type="button" class="btn btn-primary">Create Item</button></a>
                
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th class="align-middle">Brand</th>
                      <th class="align-middle">Item</th>
                      <th class="align-middle">Stock</th>
                      <th class="align-middle">Category</th>
                      <th class="align-middle">Price</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php foreach($furniture as $item) { ?>
                      <tr>
                        <td class="align-middle"><?php echo h($item->brand); ?></td>
                        <td class="align-middle"><?php echo h($item->item); ?></td>
                        <td class="align-middle"><?php echo h($item->stock); ?></td>
                        <td class="align-middle"><?php echo h($item->category); ?></td>
                        <td class="align-middle"><?php echo h('$' . number_format($item->price, 2)); ?></td>
                        <td class="align-middle"><a href="<?php echo url_for('/staff/furniture/show.php?id=' . h(u($item->id))); ?>"><button type="button" class="btn btn-primary">View</button></a></td>
                        <td class="align-middle"><a href="<?php echo url_for('/staff/furniture/edit.php?id=' . h(u($item->id))); ?>"><button type="button" class="btn btn-info">Edit</button></a></td>
                        <td class="align-middle"><a href="<?php echo url_for('/staff/furniture/delete.php?id=' . h(u($item->id))); ?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
                <br />
                
                <p>
                  <a href="<?php echo url_for('/staff/furniture/upload.php'); ?>"><button type="button" class="btn btn-outline-primary btn-margin">Upload Inventory</button></a>
                </p>
                
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
