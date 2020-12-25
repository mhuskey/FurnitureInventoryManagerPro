<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  $id    = $_GET['id'] ?? '1';
  
  $furniture = Furniture::find_by_id($id);
?>

<?php $page_title = 'Show Furniture: ' . h($furniture->item); ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center">
                <h1>Furniture Item: <?php echo h($furniture->item); ?></h1>
                
                <h5><a class="back-link" href="<?php echo url_for('/staff/furniture/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Furniture</a></h5><br />
                
                <!-- Furniture Card -->
                <div class="col-sm-10 offset-sm-1">
                  <div class="card border-dark mb-3 text-center">
                    <h5 class="card-header text-white bg-secondary">ID</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->id); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Brand</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->brand); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Item</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->item); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Stock</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->stock); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Category</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->category); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Price</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h('$' . number_format($furniture->price, 2)); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Weight</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->weight_lbs); ?></h5>
                    </div>
                    
                    <h5 class="card-header text-white bg-secondary">Cubes</h5>
                    <div class="card-body">
                      <h5 class="card-text"><?php echo h($furniture->cubes); ?></h5>
                    </div>
                  </div>
                </div>
                <br />
                
                <a href="<?php echo url_for('/staff/furniture/edit.php?id=' . h(u($furniture->id))); ?>"><button type="button" class="btn btn-info btn-margin">Edit Item</button></a>
                
                <a href="<?php echo url_for('/staff/furniture/delete.php?id=' . h(u($furniture->id))); ?>"><button type="button" class="btn btn-danger btn-margin">Delete Item</button></a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
