<?php 

  include './../bdd/boostrap.php';
  include './../admin-securite.php';
  if (!empty($_POST)) {
      $id=$_POST['id'];
      $p="p.idQuestion";
      $q="q.idQuestion";

  
      $sql = "SELECT * FROM questions Where idQuestion = $id"; 
      $questions = $dbh->query( $sql )->fetchAll();

      foreach ($questions as $question) {
        $q=$question['question'];
      }
      
      $sql = "SELECT * FROM possibilitee Where idQuestion = $id"; 
      $p = $dbh->query( $sql )->fetchAll();
  }
  
  if (!empty($_GET)) {
    
    $id=$_GET["id"];
    $l=sizeof($_GET);
    
    for ($i=0; $i < 1000 ; $i++) { 
      
      if (isset($_GET[$i])) {
        
        $res=$_GET[$i];
        echo "$i <--$res |||";
        $p="p.possibilitee";
        $sql = "UPDATE `possibilitee` as p SET $p=$res WHERE idPossibilitee=$id ";
        $dbh->query($sql);  
      }
    }
    // header('Location: ./../admin-update.php');
  }


 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
    <div  id="updateModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo $q ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          </button>
        </div>
        <div class="modal-body">
          <form action="#" method="get">
          <input class="form-control m-2" type="hidden" name="id" value="$id">
          <?php $i=0;

            foreach ($p as $po) {
              $libelPossibilitee=$po['possibilitee'];
              $idPo=$po['idPossibilitee'];
              
              echo "<div class=\"form-check form-check-inline\">
                      <input class=\"form-control m-2\" type=\"text\" name=\"".$idPo."\" value=\"".$libelPossibilitee."\">
                    </div>";
                    $i++;
          }
          ?>
          <div><button type="submit" class="btn btn-primary">Save changes</button></div>
        </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
