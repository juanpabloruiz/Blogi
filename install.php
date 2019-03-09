<?php

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$url = $_POST['url'];
	$server = $_POST['server'];
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail'];
	$db = $_POST['db'];

	$link = new mysqli($server, $user, $pass, $db);


mysqli_query($link, "CREATE TABLE IF NOT EXISTS `config` (
  `id_config` int(133) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  PRIMARY KEY (`id_config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;");

mysqli_query($link, "INSERT INTO `config` (`id_config`, `name`, `url`, `mail`) VALUES
(1, '$name', '$url', '$mail')");



mysqli_query($link, "CREATE TABLE IF NOT EXISTS `posts` (
  `id_post` int(133) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `extracto` text NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;");

mysqli_query($link, "INSERT INTO `posts` (`id_post`, `titulo`, `extracto`, `fecha`) VALUES
(1, 'Mi primer post', '<p>Esta es mi primera nota ingresada...</p>', '2017-07-30')");


mysqli_query($link, "CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(133) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `rango` varchar(255) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;");

mysqli_query($link, "INSERT INTO `users` (`id_user`, `user`, `pass`, `mail`, `rango`, `img`) VALUES
(1, '$user', '$pass', '$mail', 'administrador', '61279.jpeg')");

$gestor = fopen('admin/config.php', 'r+');
fwrite($gestor, '<?php $link = new mysqli('.$server.', '.$user.', '.$pass.', '.$db.'); ?>');
unlink('install.php');
echo '<script>window.location="index.php"</script>';

}




?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Instalación</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<link rel="stylesheet" href="admin/css/bootstrap.min.css">
	<script src="admin/js/jquery-3.2.1.min.js"></script>
	<script src="admin/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="page-header"><h2>Instalación</h2></div>
		<form method="post" action="">
			<div class="form-group"><input type="text" class="form-control" name="name" placeholder="Sitio web"></div>
			<div class="form-group"><input type="text" class="form-control" name="url" placeholder="URL"></div>
			<div class="form-group"><input type="text" class="form-control" name="server" placeholder="Servidor"></div>
			<div class="form-group"><input type="text" class="form-control" name="user" placeholder="Usuario"></div>
			<div class="form-group"><input type="password" class="form-control" name="pass" placeholder="Contraseña"></div>
			<div class="form-group"><input type="mail" class="form-control" name="mail" placeholder="Correo electrónico"></div>
			<div class="form-group"><input type="text" class="form-control" name="db" placeholder="Base de datos"></div>
			<input type="submit" class="btn btn-primary" name="submit" value="Instalar">
		</form>
	</div>
</body>
</html>