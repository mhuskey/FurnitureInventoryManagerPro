<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Furniture Inventory Manager <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/44ea90186f.js" crossorigin="anonymous"></script>
    
    <!-- Custom CSS -->
    <link rel="stylesheet" media="all" href="<?php echo url_for('/assets/stylesheets/main.css'); ?>" />
  </head>
  
  <body>
    <header role="heading" class="text-center">
      <a href="<?php echo url_for('/index.php'); ?>">
        <img class="icon" src="<?php echo url_for('/assets/images/logo.png') ?>" /><br />
        <h1 class="no-decoration">Furniture Inventory Manager</h1>
      </a>
    </header>
