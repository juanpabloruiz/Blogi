<?php include('header.php'); ?>
<?php
if(isset($_POST['submit'])) {
	$titulo = addslashes($_POST['titulo']);
	$extracto = addslashes($_POST['extracto']);
	$cat = $_POST['cat'];
	$type = $_POST['type'];
	$fecha = date('Y-m-d-H-i');
	mysqli_query($link, "INSERT INTO posts (titulo,extracto,cat,tipo,fecha) VALUES ('$titulo','$extracto','$cat','$type','$fecha')");
	echo '<script>window.location="posts.php"</script>';
}
?>


				<form method="post" action="" >
					
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" id="titulo" name="titulo" class="form-control" placeholder="Título">
					</div>


					<div class="form-group">
						<label for="extracto">Título</label>
						<textarea name="extracto" class="summernote"></textarea>
						
					</div>

					<div class="radio"><div class="form-group">
						<label for="type"><input type="radio" class="" name="type" value="post">Noticia</label>
						
					</div>
				</div>
					<div class="radio">
						<div class="form-group">
<label for="type"><input type="radio" name="type" value="page">Página</label>
</div>
</div>
					<div class="form-group">
						<select class="form-control" name="cat">
							<?php
							$query = mysqli_query($link, "SELECT * FROM cats");
							while($data = mysqli_fetch_array($query)) {
								echo '<option value="'.$data['id_cat'].'">'.$data['cat'].'</option>';
							}
							?>
						</select>
					</div>

									

					<button type="submit" name="submit" class="btn btn-primary">Guardar</button>
				</form>
<?php include('footer.php'); ?>