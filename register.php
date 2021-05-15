<?php 
include_once('dbConnect.php');
$database = new database();
if(isset($_POST['register']))
{
    $username = $_POST['username'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $nama = $_POST['nama'];
    if($database->register($username,$password,$nama))
    {
      header('location:formLogin.php');
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <title>FORM REGISTER</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body class="d-flex flex-column h-100">
<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Formulir Register</h1>
    <p class="lead">Silahkan Daftarkan Diri Anda</p>
    <hr/>
    <form method="post" action="">
    <div class="form-group row">
      <label for="username" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username">
      </div>
    </div>

    <div class="form-group row">
      <label for="nama" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
      </div>
    </div>


  <div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <a href="login.php" class="btn btn-success">Login</a>
      <button type="submit" class="btn btn-primary" name="register">Register</button>
    </div>
  </div>
</form>
  </div>
</main>
</body>
</html>