<?php 
include '../assets/php/db.php';
include '../assets/php/function.php';
session_start();
if (isset($_COOKIE['login'])) {
	$_SESSION['id'] = $_COOKIE['id'];
	$_SESSION['username'] = $_COOKIE['key'];
	$_SESSION['login'] = true
	?>
	<script type="text/javascript">
		window.location.href = "index.php";
	</script>
	<?php
} ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
 <body>

    <section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
              <div class="form-03-main">
                <div class="logo">
                  <img src="../assets/images/user.png">
                </div>

<?php if (isset($_POST['submit'])): 

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$login = query("SELECT * FROM `user` WHERE username='$username'");
if (count($login) == 1) {
if (password_verify($login[0]['password'], $password)) {
	if ($_POST['remember']=="remember") {
		setcookie('login', 'true',time()+259200);
		setcookie('id', ''.$login[0]['id'].'',time()+259200);
		setcookie('key', hash('sha256', $username), time()+259200);
		$_SESSION['id'] = $login[0]['id'];
		$_SESSION['username'] = hash('sha256', $username);
		$_SESSION['login'] = true;
	}else{
	$_SESSION['id'] = $login[0]['id'];
	$_SESSION['username'] = hash('sha256', $username);
	$_SESSION['login'] = true;
	}
	?>
	<script type="text/javascript">
		window.location.href = "index.php"
	</script>
	<?php
}else{
	?>
<div class="alert alert-danger" role="alert">
  Username atau password salah, silahkan coba lagi
</div>
	<?php
}}else{
	?>
<div class="alert alert-danger" role="alert">
  Username atau password salah, silahkan coba lagi
</div>
	<?php
}
 endif ?>
                <form method="post">
                <div class="form-group" style="padding: 20px 20px;">
                  <input type="username" name="username" class="form-control _ge_de_ol" type="text" placeholder="Enter username" required="" aria-required="true">
                </div>

                <div class="form-group" style="padding: 20px 20px;">
                  <input type="password" name="password" class="form-control _ge_de_ol" type="text" placeholder="Enter Password" required="" aria-required="true">
                </div>

                <div class="checkbox form-group" style="padding: 10px 10px;">
                  <div class="form-check">

                    <input class="form-check-input" type="checkbox" value="remember" name="remember">
                    <label class="form-check-label" for="remember">
                      Tetap Login
                    </label>
                  </div>
                  
                </div>

                <div class="form-group" style="padding: 10px 10px;">

                    <button class="btn _btn_04" type="submit" name="submit">Login</button>
                  </div>
                  <div class="form-group nm_lk"><a href="register.php">Belum punya akun? <strong>Register</strong></a></div>
                </div>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </body>
</html>
