<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

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
                      <th>Manufacturer</th>
                      <th>Item</th>
                      <th>Stock</th>
                      <th>Category</th>
                      <th>Weight</th>
                      <th>Cubes</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  
                  <?php
                    $parser = new ParseCSV(PRIVATE_PATH . '/furniture_inventory.csv');
                    $furniture_array = $parser->parse();
                  ?>
                  
                  <?php  
                    foreach ($furniture_array as $args) { ?>
                      <?php $furniture = new Furniture($args) ?>
                      <tbody>
                        <tr>
                          <td class="align-middle"><?php echo h($furniture->manufacturer); ?></td>
                          <td class="align-middle"><?php echo h($furniture->item); ?></td>
                          <td class="align-middle"><?php echo h($furniture->stock); ?></td>
                          <td class="align-middle"><?php echo h($furniture->category); ?></td>
                          <td class="align-middle"><?php echo h($furniture->weight_lbs()) . ' / ' . h($furniture->weight_kgs()); ?></td>
                          <td class="align-middle"><?php echo h($furniture->cubes); ?></td>
                          <td class="align-middle"><?php echo '$' . h($furniture->price); ?></td>
                        </tr>
                      </tbody>
                  <?php } ?>
                </table>
                <br />
                <p>
                  <a href="<?php echo url_for('/upload.php'); ?>"><button type="button" class="btn btn-outline-primary">Upload Inventory</button></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
