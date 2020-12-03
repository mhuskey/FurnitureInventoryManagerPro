<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'About'; ?>
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
          <div class="container min-vh-100">
            <div class="row">
              <div class="col-sm-10 offset-sm-1">
                <h2>About This App</h2>
                <p>Furntiure Inventory Manager Pro is a PHP web app, using object-oriented programming to easily view store's inventory. Registered users can log in to create, edit, and delete furniture. They can also upload a CSV file to populate the MySQL database. While this example app uses furniture, it could easily be refactored to support any type of store.</p>
                <br /><br />
                
                <h2>About Me</h2>
                <p>My name is Matthew Huskey, and I am a developer with experience in both front-end and back-end technologies.</p>
                
                <p>More recent technologies include: PHP and MySQL, HTML5, CSS3 and Bootstrap, and JavaScript and jQuery.</p>
                
                <p>Past experience includes Ruby on Rails, C#, Swift, and iOS development.</p>
                <br /><br />
                
                <p class="text-center">
                  <a href="https://matthewhuskey.com" target="_blank"><button type="button" class="btn btn-outline-primary btn-margin btn-no-left-margin">My Portfolio</button></a>
                  
                  <a href="mailto:matthewhuskey@me.com"><button type="button" class="btn btn-outline-danger btn-margin">Contact Me</button></a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
