<?php

    $sql = "SELECT log FROM admin";
    $data = $dbh->query($sql); 
    
    foreach ($data as $log) {
      $security=$log['log'];
    }
    
    if ($security == 0) {
      header('Location: admin-login.php');
    }

    if (isset($_POST['deco'])) {
      $sql = "UPDATE admin SET log=0 WHERE idAdmin=1";
      $dbh->query($sql);
      header('Location: ./../');
    }

    if (isset($_POST['view'])) {
      $sql = "UPDATE admin SET log=0 WHERE idAdmin=1";
      $dbh->query($sql);
      header('Location: ./../');
    }
 ?>