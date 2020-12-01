<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php $page_title = 'Upload Furniture CSV'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<?php
  if(is_post_request()) {
    $original_file = $_FILES['inventory']['name'];
    $file_type = strtolower(pathinfo($original_file,PATHINFO_EXTENSION));
    
    // Rename uploaded file to populate table
    $_FILES['inventory']['name'] = '/furniture_inventory.csv';
    
    $valid_upload = 1;
    
    $upload_file = PRIVATE_PATH . $_FILES['inventory']['name'];
    
    // Check if file exists
    if($_FILES['inventory']['size'] === 0) {
      $errors[] = 'No file selected to upload.';
    }
    
    // Check file size
    if($_FILES['inventory']['size'] > 1000000) {
      $errors[] = 'File size must be less than 1 MB.';
      $valid_upload = 0;
    }
    
    // Allow certain file formats
    if($file_type && $file_type != "csv") {
      $errors[] = 'Only CSV files are allowed.';
      $valid_upload = 0;
    }
    
    if($valid_upload == 1) {
      $tmp_name = $_FILES['inventory']['tmp_name'];
      if(move_uploaded_file($tmp_name, $upload_file)) {
        // Delete existing `furniture` table
        $sql  = "DROP TABLE furniture;";
        echo $sql . "<br /><br />";
        $db->query($sql);
        
        // Create new `furniture` table
        $sql  = "CREATE TABLE furniture (";
        $sql .= "id INT(11) AUTO_INCREMENT PRIMARY KEY, ";
        $sql .= "brand VARCHAR(255) NOT NULL, ";
        $sql .= "item VARCHAR(255) NOT NULL, ";
        $sql .= "stock INT(4) NOT NULL, ";
        $sql .= "category VARCHAR(255) NOT NULL, ";
        $sql .= "price DECIMAL(7,2) NOT NULL, ";
        $sql .= "weight_lbs DECIMAL(7,2) NOT NULL, ";
        $sql .= "cubes DECIMAL(7,2) NOT NULL);";
        $db->query($sql);
        
        // Load CSV file and populate `furniture` table
        $path = PRIVATE_PATH . '/furniture_inventory.csv';
        $sql  = "LOAD DATA LOCAL INFILE '" . $path . "'
        INTO TABLE furniture
        FIELDS TERMINATED BY ','
        OPTIONALLY ENCLOSED BY '\"'
        LINES TERMINATED BY '\n'
        IGNORE 1 LINES
        (id, brand, item, stock, category, price, weight_lbs, cubes)";
        $db->query($sql);
        
        redirect_to(url_for('/furniture_inventory.php'));
      }
    }
  }
?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1">
                <h2>Update Inventory</h2>
                
                <p>Select and upload a CSV file from your computer to update the <a href="<?php echo url_for('/furniture_inventory.php'); ?>">Furniture Inventory page</a>.</p>
                <br />
                
                <h3>Import CSV</h3>
                <hr />
                <h4 class="text-danger">Warning: uploading a CSV will delete and replace all current furniture items.</h4>
                <h4 class="text-danger">This process is permanent and cannot be reversed.</h4>
                <hr />
                <form action="upload.php" method="post" enctype="multipart/form-data">
                  <input type="file" name="inventory" class="form-control-file">
                  <br />
                  <button type="submit" class="btn btn-primary">Upload CSV</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
