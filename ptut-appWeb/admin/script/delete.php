<?php

include ('./../bdd/boostrap.php');

if (!empty($_POST)) {
$id = $_POST['op']; 
$sql = "DELETE FROM questions WHERE idQuestion = :id"; 
$stmt = $dbh->prepare($sql); 
$status = $stmt->execute([':id' => $id]); 
if ($status == false) {   
  echo "<p>ERREUR pendant le traitement </p>";  
}
header('Location:./../admin-delete.php');
}

 ?>