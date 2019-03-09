<?php include('header.php'); ?>
<?php
$get = $_GET['id'];
if(isset($_POST['submit'])) {
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$mail = $_POST['mail'];
	$rango = $_POST['rango'];
	$name = rand().'.'.pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
	move_uploaded_file($_FILES['files']['tmp_name'], 'images/'.$name);
	mysqli_query($link, "UPDATE users SET user = '$user', pass = '$pass', mail = '$mail', rango = '$rango', img = '$name' WHERE id_user = '$get'");
	echo '<script>window.location="users.php"</script>';
}
$query = mysqli_query($link, "SELECT * FROM users WHERE id_user = '$get'");
$data = mysqli_fetch_array($query);
?>
				<form method="post" action="" enctype="multipart/form-data">
					
					<div class="form-group">
						<label for="user">Usuario</label>
						<input type="text" id="user" name="user" class="form-control" value="<?php echo $data['user']; ?>">
					</div>
					<div class="form-group">
						<label for="pass">Contraseña</label>
						<input type="password" id="pass" name="pass" class="form-control" value="<?php echo $data['pass']; ?>">
					</div>
					<div class="form-group">
						<label for="mail">Correo electrónico</label>
						<input type="mail" id="mail" name="mail" class="form-control" value="<?php echo $data['mail']; ?>">
					</div>
					<label for="rango">Rango</label>
					<div class="radio">
						<label>
							<?php if($data['rango'] == 'administrador') {?>
							<input type="radio" name="rango" value="Administrador" checked>
							<?php } else { ?>
							<input type="radio" name="rango" value="Administrador">
							<?php } ?>
							Administrador
						</label>
					</div>
					<div class="radio">
						<label>
							<?php if($data['rango'] == 'editor') {?>
							<input type="radio" name="rango" value="Editor" checked>
							<?php } else { ?>
							<input type="radio" name="rango" value="Editor">
							<?php } ?>
							Editor
						</label>
					</div>

					<div class="form-group"><img src="images/<?php echo $data['img']; ?>" width="256"></div>

					<div class="form-group">
			
			<div class="input-group">
				
				<input type="file" class="inputfile" name="files" multiple onchange="previewImage(this,[256],4);">
			
				<div class="imagePreview"></div>
				</div>

				
			
		</div>
					

					<button type="submit" name="submit" class="btn btn-primary">Guardar</button>
				</form>
				
<?php include('footer.php'); ?>