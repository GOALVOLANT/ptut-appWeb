<?php 
  include './../bdd/boostrap.php';
  include './admin-securite.php';

$sql = "SELECT * FROM questions"; 
$questions = $dbh->query( $sql )->fetchAll();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Delete</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <?php include './admin-aside-menu.php' ?>
      <h2 class="text-center">Suprimer une question</h2>
      <div>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col-1">#</th>
              <th scope="col-10">Question</th>
              <th scope="col-1">Supression</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $count=1;
          foreach( $questions as $question) 
              {  
                $libelquestion=$question["question"];
                $idQuestion=$question["idQuestion"];

                echo "<tr><td>$count</td><td>$libelquestion</td><td><form method=\"post\"action=\"./script/delete.php\"><button name=\"op\" value=\"$idQuestion\" class=\"btn btn-danger\">Suprimer</button></form></td></tr>";
                $count=$count+1;
                }
             ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
<script src="./js/Jquery.js"></script>
<script src="./js/admin.js"></script>
<script src="./../assets/boostrap/js/bootstrap.js"></script>
</html>