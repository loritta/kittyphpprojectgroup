<?php
//  session_start();
//  $connection = connection('phpcats', 'phpcats', 'Ii0EExX_H~yx');
//  if (!$connection) {
//      die();
//  }
//  
//  if (isset($_GET['flush'])) {
//      $droptemp = "
//    drop table if exists tempCart;
//    ";
//      $connection->exec($droptemp);
//  }

  session_destroy();
  $_SESSION = array();
?><script>window.location.href = "cats.php";</script> <?php
?>