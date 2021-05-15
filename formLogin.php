<?php 
session_start();
include_once('dbConnect.php');
$database = new database();

if(isset($_SESSION['is_login']))
{
    header('location:home.php');
}

if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:home.php');
}

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }

    if($database->login($username,$password,$remember))
    {
      header('location:home.php');
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>FORM LOGIN</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <h1>SELAMAT DATANG DI FORM LOGIN</h1>
      <form class="form-signin" method="post" action="">
        <h1>Please sign in</h1>
        <h2>
        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" class="form-control" placeholder="Username" name="username" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
        <div class="checkbox mb-3">
          <label>
            <input type="checkbox" value="remember-me" name="remember"> Remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
        </h2>
        <a href="register.php">Register</a>
      </form>
  </body>
</html>