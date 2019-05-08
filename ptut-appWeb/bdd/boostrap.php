<?php  
include('./config/configlocal.php'); 
 
try {   $dbh = new PDO(     'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=UTF8', DB_USER, DB_PWD,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
} 
catch ( PDOException $e ) {     
  echo '<p>Ce service est pour le moment indisponible.</p>';     
  die(); 
}
 ?>