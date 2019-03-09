<?php include('header.php'); ?>
<?php
$get = $_GET['id'];
if(isset($_POST['submit'])) {
	$titulo = $_POST['titulo'];
	$extracto = $_POST['extracto'];
	$cat = $_POST['cat'];
	mysqli_query($link, "UPDATE posts SET titulo = '$titulo', extracto = '$extracto', cat = '$cat' WHERE id_post = '$get'");
	echo '<script>window.location="posts.php"</script>';	
}
$query = mysqli_query($link, "SELECT * FROM posts WHERE id_post = '$get'");
$data = mysqli_fetch_array($query);
?>
				<form method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="titulo">Título</label>
						<input type="text" id="titulo" name="titulo" class="form-control" value="<?php echo htmlspecialchars($data['titulo']); ?>">
					</div>
					<div class="form-group">
						<label for="summernote">Extracto</label>
						<textarea id="summernote" name="extracto" placeholder="Escribir aquí el contenido" class="summernote"><?php echo htmlspecialchars($data['extracto']); ?></textarea>
					</div>



					<div class="form-group">
						<select class="form-control" name="cat">
							<?php
							$query = mysqli_query($link, "SELECT * FROM posts WHERE id_post = '$get'");
							$data = mysqli_fetch_array($query);
							$a = $data['cat'];
							$query2 = mysqli_query($link, "SELECT * FROM cats");
							while($data = mysqli_fetch_array($query2)) {
								if($a == $data['id_cat']) {
									echo '<option selected value="'.$data['id_cat'].'">'.$data['cat'].'</option>';								
								} else {
									echo '<option value="'.$data['id_cat'].'">'.$data['cat'].'</option>';								
								}
							}
							?>
						</select>
					</div>




					<button type="submit" name="submit" class="btn btn-primary">Guardar</button>
				</form>
<?php include('footer.php'); ?>
?>