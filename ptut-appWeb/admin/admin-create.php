<?php 
  include './../bdd/boostrap.php';
  include './admin-securite.php';
  $age=0;
  $sexe=0;


  $sql = "SELECT * FROM questions Where type = 'age' or type ='sexe'"; 
  $questions = $dbh->query( $sql )->fetchAll();
  foreach ($questions as $question) {
    if ($question['type'] == 'sexe') {
    $sexe= 1 ;
    }
   if ($question['type'] == 'age') {
      $age= 1 ;
  }
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Create</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <?php include './admin-aside-menu.php' ?>
      <h2 class="text-center">Créer une question</h2>
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active col-4 text-center" id="nav-ouiNon-tab" data-toggle="tab" href="#nav-ouiNon" role="tab" aria-controls="nav-ouiNon" aria-selected="true">Oui / Non</a>
          <a class="nav-item nav-link col-4 text-center" id="nav-choix-tab" data-toggle="tab" href="#nav-choix" role="tab" aria-controls="nav-choix" aria-selected="false">Question à Choix</a>
          <a class="nav-item nav-link col-4 text-center" id="nav-def-tab" data-toggle="tab" href="#nav-def" role="tab" aria-controls="nav-def" aria-selected="false">Question par défault</a>
        </div>
      </nav>

      <!-- ************************************************************************************************** -->
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active p-5" id="nav-ouiNon" role="tabpanel" aria-labelledby="nav-ouiNon-tab">         
          <h3> Créer une question fermé type oui/non</h3>
            <form action="./script/create.php" method='post'>
              <div class="form-group">
                <label for="formGroupExampleInput">Question</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Entrer une question" name="question">
              </div>
              <button type="submit" class="btn btn-success mb-2" name="type" value='ouiNon'>Créer</button>
            </form>
          </div>
        <div class="tab-pane fade p-5" id="nav-choix" role="tabpanel" aria-labelledby="nav-choix-tab">
          <h3> Créer une question fermé à choix</h3>
            <form action="./script/create.php" method='post'>
              <div class="form-group">
                <label for="formGroupExampleInput">Question</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Entrer une question" name="question">
              </div>
              <div class="form-group">
                  <div class="form-group">
                    <label for="formGroupNbr">Combien de possibilitées de réponse</label>
                    <input type="number" class="form-control col-1" id="possibilitées">
                  </div>
                  <input type="button"class="btn btn-success mb-2 p-2" id="btnNbr" value="Executer">
              </div>
              <div class="form-group" id="result"></div>
              <button type="submit" class="btn btn-success mb-2" name="type" value='choix'>Créer</button>
            </form>
        </div>
        <div class="tab-pane fade p-5" id="nav-def" role="tabpanel" aria-labelledby="nav-def-tab">
          <h3> Créer une question par défault</h3>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Question</th>
                  <th scope="col">Créer</th>
                  <th scope="col">Use</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Sexe</th>
                  <td><form action="./script/create.php"><button type="submit" class="btn btn-success mb-2" name="type" value='sexe'>Créer</button></form></td>
                  <th><input type="hidden" id="sexe" value=<?php echo $sexe ?>>
                      <div id="resSex"></div>
                  </th>
                </tr>
                <tr>
                  <th scope="row">Age</th>
                  <td><form action="./script/create.php"><button type="submit" class="btn btn-success mb-2" name="type" value='age'>Créer</button></form></td>
                  <th><input type="hidden" id="age" value=<?php echo $age ?>>
                      <div id="resAge"></div>
                  </th>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
      <!-- ************************************************************************************************** -->
    </div>
  </div>
</body>
<script src="./js/Jquery.js"></script>
<script src="./js/admin.js"></script>
<script src="./../assets/boostrap/js/bootstrap.js"></script>
</html>