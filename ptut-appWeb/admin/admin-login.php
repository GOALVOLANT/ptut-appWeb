<?php 
  include './bdd/boostrap.php';

    $sql = "SELECT user,password FROM admin";
    $stmt = $dbh->prepare( $sql );
    $admins = $dbh->query( $sql )->fetchAll();

    foreach ($admins as $admin) {
      $user=$admin['user'];
      $password=$admin['password'];
    }
    
    if (!empty($_POST)) {
      $passwordHash=sha1($_POST["password"]);

      if ($user == $_POST["user"] && $passwordHash == $password ) {
        $sql = "UPDATE admin SET log=1 WHERE idAdmin=1";
        $data = $dbh->query($sql); 

        header('Location: admin-create.php');
      }
      }
      else{
        $alert="<div class=\"alert alert-danger text-center\" role=\"alert\">Le mot de passe est incorrect</div>";
      }
 ?> 
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login Admin</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="./../css/style.css">
</head>
<body>
<div class="wrapper d-flex align-items-center">
  <div class="container d-flex justify-content-center">
    <form class="col-4 d-flex flex-column align-items-center border rounded p-3 bg-light" method="post">
      <h2>Admin Access</h2>
      <div class="form-group">
        <label for="inputUser">Username</label>
        <input type="text" class="form-control" id="inputUser" aria-describedby="emailHelp" placeholder="Enter Username" name="user">
      </div>
      <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>
</body>
</html>