<?php include('header.php'); ?>
	<div class="panel-body">
		<div class="form-group">
			<a type="button" href="user_new.php" class="btn btn-success">Crear nuevo usuario</a>
		</div>
    <div class="form-group"><input type="search" class="form-control" placeholder="Buscar" id="buscar"></div>
        <form method="post" action="">
    <div class="form-group">
      <input type="submit" name="delete" value="Eliminar" class="btn btn-default">
    </div>
    <div id="datos">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>

                      <?php
if(isset($_REQUEST['delete'])) {
  $chk = $_REQUEST['checkbox'];
  $a = implode(',', $chk);
  mysqli_query($link, "DELETE FROM users WHERE id_user IN ($a)");
}
?>


                        <th width="3%"><input type="checkbox" class="all"></th>
                        <th class="hidden-xs text-center">ID</th>
                        <th class="text-center">Usuario</th>
                  
                        <th class="text-center">Correo electrónico</th>
                        <th class="text-center">Rango</th>
                    </tr> 
                  </thead>
                  <tbody>
                  	<?php
					$query = mysqli_query($link, "SELECT * FROM users");
					while($data = mysqli_fetch_array($query)) {
            $id_user = $data['id_user'];
            $user = $data['user'];
						?>
                        <tr>
                            <td width="3%"><input type="checkbox" class="child" name="checkbox[]" value="<?php echo $data['id_user']; ?>"></td>
                            <td width="6%" align="center"><?php echo $data['id_user']; ?></td>
                            <td><a href="user_edit.php?id=<?php echo $data['id_user']; ?>"><?php echo $data['user']; ?></a></td>
                            
                            <td><?php echo $data['mail']; ?></td>
                            <td width="14%" class="text-center"><?php echo $data['rango']; ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                </table>
                </div>
            </div>
<?php include('footer.php'); ?>
<script>
$(function(){
  $('.all').on('click', function() {
    $('.child').prop('checked', this.checked)
  });
});
</script>
