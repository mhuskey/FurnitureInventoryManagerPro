<?php require_once('../../../private/initialize.php'); ?>

<?php require_login(); ?>

<?php
  if(!isset($_GET['id'])) {
    redirect_to(url_for('/staff/furniture/index.php'));
  }
  $id = $_GET['id'];
  
  $furniture = Furniture::find_by_id($id);
  if($furniture == false) {
    redirect_to(url_for('/staff/furniture/index.php'));
  }
  
  if(is_post_request()) {
    // Delete Furniture item
    $result = $furniture->delete();
    $session->message('The furniture item was deleted successfully.');
    redirect_to(url_for('/staff/furniture/index.php'));
  } else {
    // Display form
  }
?>

<?php $page_title = 'Delete Furniture Item'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

    <!-- Main Content -->
    <main role="main">
      <section>
        <div class="main-content">
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1 text-center">
                <h1>Delete Furniture Item</h1>
                
                <h5><a class="back-link" href="<?php echo url_for('/staff/furniture/index.php'); ?>"> <i class="fas fa-chevron-circle-left"></i> Back to Furniture Items</a></h5><br />
                
                <h5>Are you sure you want to delete this furniture item?</h5><br />
                <h3><?php echo h($furniture->brand) . ': ' . h($furniture->item); ?></h3><br /><br />
                
                <form action="<?php echo url_for('/staff/furniture/delete.php?id=' . h(u($furniture->id))); ?>" method="post">
                  <button type="submit" class="btn btn-danger btn-margin" name="commit">Delete Item</button>
                  
                  <a href="<?php echo url_for('/staff/furniture/show.php?id=' . h(u($furniture->id))); ?>"><button type="button" class="btn btn-secondary btn-margin">Cancel</button></a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
