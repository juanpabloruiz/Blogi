<?php include('header.php'); ?>

<?php
if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$url = $_POST['url'];
	$mail = $_POST['mail'];
	mysqli_query($link, "UPDATE config SET name = '$name', url = '$url', mail = '$mail'");
	echo '<div class="alert alert-success" role="alert">Datos guardados correctamente</div>';
}
$query = mysqli_query($link, "SELECT * FROM config");
while($data = mysqli_fetch_array($query)) {
?>

				<form method="post" action="">
					
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" id="name" name="name" class="form-control" placeholder="Nombre del sitio web" value="<?php echo $data['name']; ?>">
					</div>

					<div class="form-group">
						<label for="url">Dominio URL</label>
						<input type="text" id="url" name="url" class="form-control" placeholder="www.dominio.com" value="<?php echo $data['url']; ?>">
					</div>

					<div class="form-group">
						<label for="mail">Correo electrónico</label>
						<input type="mail" id="mail" name="mail" class="form-control" placeholder="Email" value="<?php echo $data['mail']; ?>">
					</div>

					<button type="submit" name="submit" class="btn btn-primary">Guardar</button>
				</form>
<?php
}
?>
<?php include('footer.php'); ?>
<?php

?>