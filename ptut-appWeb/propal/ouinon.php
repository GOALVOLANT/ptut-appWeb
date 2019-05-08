<div class="form-group row">
  <label class=" col-form-label">Question <?php echo $count; ?> :</label>
  <div class="col-sm-12">
    <?php echo $libelquestion; ?>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name=<?php echo $libelquestion; ?> value="oui">
    <label class="form-check-label">Oui</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" name=<?php echo $libelquestion; ?> value="non">
    <label class="form-check-label">Non</label>
  </div>
  </div>