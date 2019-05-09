<?php 

$req = $dbh->query('SELECT COUNT(idQuestion) as Nb FROM questions');
$donnees = $req->fetch();
$req->closeCursor();
 ?>
<div class="container p-0 d-inline-flex">
    <nav class="col-2 bg-dark text-light text-center p-2 position-fixed" id ="pannel" style="height: 100vh;">
        <h4> Pannel Admin</h4>
        <hr>
        <div class="d-flex flex-column align-items-start ">
        <a href="./admin-create.php" class="btn btn-link text-light">Create</a>
        <a href="./admin-delete.php" class="btn btn-link text-light">Delete</a>
        <a href="./admin-update.php" class="btn btn-link text-light">Update</a>
        <a href="#" class="btn btn-link text-light">Graphics</a>
        <form method="post" class="mb-3"><input type="submit" class="btn btn-link text-light" name="view" value="View"><span class="badge badge-light"><?php echo $donnees['Nb'] ?></span></form>
        </div>

        <form method="post"><input type="submit" class="btn btn-primary" name="deco" value="Deconnexion"></form>
    </nav>
    <div class="container" style="margin-left: 30%;">
