<?php session_start(); ?>
<?php
if(isset($_SESSION['user'])) {
	echo '<script>window.location="dash.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Ingreso al sistema</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="page-header"><img src="img/logo.jpg" alt="Logotipo" class="img-responsive center-block"></div>
		<form method="post" action="" class="col-md-4 panel panel-default col-md-offset-4">
			<div class="panel-body">
				<?php
				if(isset($_POST['submit'])) {
					include('config.php');
					$user_post = $_POST['user'];
					$pass_post = $_POST['pass'];
					
					$query = mysqli_query($link, "SELECT * FROM users WHERE user = '$user_post'");
					$data = mysqli_fetch_array($query);
					$user = $data['user'];
					$pass = $data['pass'];
					$img = $data['img'];
					if($user_post !== $user) {
						echo '<div class="alert alert-danger">El usuario no existe</div>';
					} elseif($pass_post !== $pass) {
						echo '<div class="alert alert-danger">La contraseña es incorrecta</div>';
					} elseif($user_post == $user && $pass_post == $pass) {
						$_SESSION['user'] = $user_post;
						$_SESSION['img'] = $img;
						echo '<script>window.location="dash.php"</script>';
					}
				}
				?>
				<div class="form-group">
					<input type="text" name="user" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" name="pass" class="form-control">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Ingresar</button>
			</div>
		</form>
	</div>
</body>
</html>
