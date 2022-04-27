<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  if(is_post_request()) {
    // Create record using POST parameters
    $args = $_POST['furniture'];
    
    $furniture = new Furniture($args);
    $result = $furniture->save();
    
    if($result === true) {
      $new_id = $furniture->id;
      $session->message('The furniture item was created successfully.');
      redirect_to(url_for('/staff/furniture/show.php?id=' . $new_id));
    } else {
      // show errors
    }
    
  } else {
    // If not a POST request, just display the blank form
    $furniture = new Furniture;
  }
?>

<?php $page_title = 'Create Furniture Item'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col align-self-center col-10 offset-1 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                <h1 class="text-center">Create Furniture Item</h1>
                
                <?php echo display_errors($furniture->errors); ?>
                
                <h5 class="text-center"><a class="back-link" href="<?php echo url_for('/staff/furniture/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Furniture Items</a></h5><br />
                
                <form action="<?php echo url_for('/staff/furniture/new.php'); ?>" method="post">
                  <div class="form-group">
                    <label for="inputFirstName">Brand</label>
                    <input type="text" class="form-control" name="furniture[brand]" <?php echo "autofocus"; ?> value="<?php echo h($furniture->brand); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputLastName">Item</label>
                    <input type="text" class="form-control" name="furniture[item]" value="<?php echo h($furniture->item); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail">Stock</label>
                    <input type="text" class="form-control" name="furniture[stock]" value="<?php echo h($furniture->stock); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername">Category</label>
                    <input type="text" class="form-control" name="furniture[category]" value="<?php echo h($furniture->category); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername">Price</label>
                    <input type="text" class="form-control" name="furniture[price]" value="<?php echo h($furniture->price); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername">Weight</label>
                    <input type="text" class="form-control" name="furniture[weight_lbs]" value="<?php echo h($furniture->weight_lbs); ?>" />
                  </div>
                  
                  <div class="form-group">
                    <label for="inputUsername">Cubes</label>
                    <input type="text" class="form-control" name="furniture[cubes]" value="<?php echo h($furniture->cubes); ?>" />
                  </div>
                  <br />
                  
                  <br />
                  
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-margin btn-no-left-margin">Create Item</button>
                    
                    <a href="<?php echo url_for('/staff/furniture/index.php'); ?>"><button type="button" class="btn btn-secondary btn-margin">Cancel</button></a><br />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
