<?php 
include ('./../bdd/boostrap.php');

  if (!empty($_POST['type']) && ($_POST['type'] == 'ouiNon' || $_POST['type'] == 'choix')){
    $alert='';
    $question = $_POST['question'];
    $type = $_POST['type'];
    $l=sizeof($_POST);

    $datas = ['question' => $question  ,
                'type' => $type]; 


      $sqlq = "INSERT INTO questions (question, type) VALUES( :question, :type)"; 

      $stmtr = $dbh->prepare( $sqlq ); 

      $stmtr->execute([':question' => $datas['question'],   
                    ':type' => $datas['type']
                  ]);
    
    $lastid=$dbh->lastInsertId();

    for ($i=0; $i < $l-2 ; $i++) {
 
      $poss=$_POST['possibilitées'.$i.''];
      
      $sqlp="INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('$poss','$lastid')";

      $stmt = $dbh->prepare( $sqlp );
      $stmtp->execute();
    }
    header('Location:./../admin-create.php');
  }
  if ($_GET['type']== 'sexe'){

      $type=$_GET['type'];
      $question='Quelle est votre sexe ?';

      $sqlq = "INSERT INTO questions (question, type) VALUES( :question, :type)";
      $stmtr = $dbh->prepare( $sqlq ); 

      $stmtr->execute([':question' => $question,   
                    ':type' => $type
                  ]);
      $lastid=$dbh->lastInsertId();

      $sqls = "INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('Homme','$lastid')";
      $stmt = $dbh->prepare( $sqls );
      $stmt->execute();

      $sqls = "INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('Femme','$lastid')";
      $stmt = $dbh->prepare( $sqls );
      $stmt->execute();

      header('Location:./../admin-create.php');

  }
  if ($_GET['type']== 'age'){

      $type=$_GET['type'];
      $question='Quelle est votre age ?';

      $sqlq = "INSERT INTO questions (question, type) VALUES( :question, :type)";
      $stmtr = $dbh->prepare( $sqlq ); 

      $stmtr->execute([':question' => $question,   
                    ':type' => $type
                  ]);
      $lastid=$dbh->lastInsertId();

      $sqls = "INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('<18','$lastid')";
      $stmt = $dbh->prepare( $sqls );
      $stmt->execute();

      $sqls = "INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('18-20','$lastid')";
      $stmt = $dbh->prepare( $sqls );
      $stmt->execute();

      $sqls = "INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('20-25','$lastid')";
      $stmt = $dbh->prepare( $sqls );
      $stmt->execute();

      $sqls = "INSERT INTO `possibilitee` (`possibilitee`,idQuestion) VALUES ('25-30','$lastid')";
      $stmt = $dbh->prepare( $sqls );
      $stmt->execute();

      header('Location:./../admin-create.php');

  }

 ?>