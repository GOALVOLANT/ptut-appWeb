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
   <title>Update Admin</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

 </head>
 <body>
   <?php include './admin-aside-menu.php' ?>
   <h2>Mise à jour d'une question</h2>
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

                echo "<tr><td>$count</td><td>$libelquestion</td><td><button type=\"button\" class=\"btn btn-warning updateBtn\" data-toggle=\"modal\" data-target=\"#updateModal\" data-id= \"$idQuestion\" data-libel= \"$libelquestion\">Update</button></td></tr>";
                $count=$count+1;
                }
             ?>
          </tbody>
        </table>
      </div>
      <!-- ***************************************************** -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <input type="text" id="modalId">
                <form action="#">
                  <?php  
                    $i=1;
                      $cookie=$_COOKIE['profile_viewer_uid'];
                      echo $cookie;
                      $sql = "SELECT * FROM possibilitee WHERE idQuestion=$cookie"; 
                      $p = $dbh->query( $sql )->fetchAll();

                      foreach ($p as $po) {
                        $libelPossibilitee=$po['possibilitee'];
                        $idPo=$po['idPossibilitee'];
                        
                        echo "<div class=\"form-group\">
                                <label class=\"form-label m-2\">Choix : $i</label>
                                <input class=\"form-control m-2\" type=\"text\" name=\"".$idPo."\" value=\"".$libelPossibilitee."\">
                              </div>";
                              $i++;
                    }
                  ?>
                <button type="button" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
<script src="./js/Jquery.js"></script>
<script src="./js/admin.js"></script>
<script src="./../assets/boostrap/js/bootstrap.js"></script>
</body>
</html>