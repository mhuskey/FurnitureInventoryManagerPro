<?php require_once('../private/initialize.php'); ?>

<?php
  $sql  = "SELECT * FROM furniture";
  $furniture = Furniture::find_by_sql($sql);
?>

<?php $page_title = 'Inventory'; ?>
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
                <h2>Our Furniture Inventory</h2>
              </div>
              
              <div class="col-sm-10 offset-sm-1 text-center align-middle">
                <table class="table table-striped table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th>Brand</th>
                      <th>Item</th>
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Price</th>
                      <th>Weight</th>
                      <th>Cubes</th>
                    </tr>
                  </thead>
                  
                  <?php foreach($furniture as $item) { ?>
                    <tr>
                      <td><?php echo h($item->brand); ?></td>
                      <td><?php echo h($item->item); ?></td>
                      <td><?php echo h($item->stock); ?></td>
                      <td><?php echo h($item->category); ?></td>
                      <td><?php echo h('$' . number_format($item->price, 2)); ?></td>
                      <td><?php echo h($item->weight_lbs); ?></td>
                      <td><?php echo h($item->cubes); ?></td>
                    </tr>
                  <?php } ?>
                </table>
                <br />
                
                <?php
                  if($session->is_logged_in()) {
                    echo "<p>
                      <a href=" . url_for('/staff/furniture/upload.php') . "><button type='button' class='btn btn-outline-primary btn-margin'>Upload Inventory</button></a>
                    </p>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>