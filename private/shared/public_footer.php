    <footer>
      <div class="footer text-center">
        <div class="container">
          <div class="row">
            <div class="col-sm-10 offset-sm-1">
              <p id="copyright">&nbsp; &copy; <?php echo date('Y'); ?> Matthew Huskey</p>
              
              <ul>
                <li class="footer-list" id="github"><a href="https://github.com/mhuskey" target="_blank"><i class="fab fa-github"></i></a></li>
                <li class="footer-list" id="mail"><a href="mailto:matthewhuskey@me.com"><i class="fas fa-envelope"></i></a></li>
                <li class="footer-list" id="linkedin"><a href="https://www.linkedin.com/in/matthew-huskey-17258716b" target="_blank"><i class="fab fa-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    
    <!-- Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>

<?php
  db_disconnect($db);
?>
