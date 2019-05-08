<div class="form-group row">
  <label class=" col-form-label">Question : <?php echo $count ?></label>
  <div class="col-sm-12">
    <div><?php echo $libelquestion ?></div>

<?php
$sqll = "SELECT *  FROM possibilitee WHERE idQuestion=".$idQuestion.""; 
$possibilitees = $dbh->query( $sqll )->fetchAll();

foreach ($possibilitees as $possibilitee) {
            
            $libelPossibilitee=$possibilitee['possibilitee'];

            echo "  <div class=\"form-check form-check-inline\">
                      <input class=\"form-check-input\" type=\"radio\" name=".$idQuestion." value=\"".$libelPossibilitee."\">
                      <label class=\"form-check-label\">".$libelPossibilitee."</label>
                    </div>";
          }
 ?>
</div>