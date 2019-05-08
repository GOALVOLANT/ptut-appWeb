<?php 
include './bdd/boostrap.php';

  $sql = "SELECT log FROM admin";
    $admin = $dbh->query( $sql );

foreach ($admin as $a) {
  $log=$a['log'];
}

if ($log === 0) {
  header('Location: admin-login.php');
}
else{
  header('Location: admin-create.php');
}


 ?>