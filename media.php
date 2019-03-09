<?php include('header.php'); ?>
<div class="panel-body">	
		<form method="post" action="" enctype="multipart/form-data">
			<div class="form-group">
				
					<input type="file" name="files" multiple> 
				
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary">Subir</button>
			</div>
		</form>
<?php
if(isset($_POST['submit'])) {
	$name = rand().'.'.pathinfo($_FILES['files']['name'], PATHINFO_EXTENSION);
	
	move_uploaded_file($_FILES['files']['tmp_name'], 'images/'.$name);
}
$dir = opendir('images');
while($file = readdir($dir)) {
	if($file != '.' && $file != '..') {
		?>
		<div class="col-md-3">
			<div class="thumbnail">
				<a href="images/<?php echo $file; ?>" target="_BLANK"><img src="images/<?php echo $file; ?>" style="height: 170px;width: 100%;"></a>
				<a href="delfile.php?file=<?php echo $file; ?>" type="button" class="btn btn-danger glyphicon glyphicon-remove"></a>
			</div>
		</div>
		<?php
	}
}
?>
</div></div>
<?php include('footer.php'); ?>