<?php  
  include './bdd/boostrap.php';

  $sql = "SELECT * FROM questions";
  $questions = $dbh->query( $sql )->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Questionnaire</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid position-relative p-5 d-inline-flex">
    <form action="">
  <?php 
  $count=1;
  foreach ($questions as $question) {
      $libelquestion=$question['question'];
      $type=$question['type'];
      $idQuestion=$question['idQuestion'];

        if ($type==="ouiNon") {
          include ('./propal/ouinon.php');
        }

        if ($type==="choix") {
            include ('./propal/choix.php');
        }

        if ($type==="sexe" || $type==="age") {
          include ('./propal/default.php');
        }

      $count=$count+1;
      }
  ?>
<!--   <button type="submit" class="btn btn-primary">Envoyer</button> -->
  </form>
  </div>
</body>
</html>