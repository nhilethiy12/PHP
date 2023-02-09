<?php require_once PATH_TO_MODUL.'header.php';?>
<?php require_once PATH_TO_MODUL.'slide.php';?>
  <div class="container">
  <?php include_once PATH_TO_VIEW.$viewname.'.php';?>
  </div>
  <footer class="container-fluid bg-dark row"> 
       <?php require_once PATH_TO_MODUL.'bottommenu1.php';?> 
       <?php require_once PATH_TO_MODUL.'bottommenu2.php';?> 
        <div class ="col-md-2 p-5 text-end"><i class="fab fa-facebook-f text-white-50"></i> 
        <i class="fab fa-twitter-square text-white-50"></i> 
        <i class="fab fa-google text-white-50"></i>
      </div>
      </footer>
   <!--Modal-->
   <?php require_once PATH_TO_MODUL.'cart.php';?>
  </body>
</html>