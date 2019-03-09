<?php include('header.php'); ?>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>



	<div class="panel-body">
    <div class="form-group">
      <a type="button" href="post_new.php" class="btn btn-success">Crear nuevo registro</a>
    </div>
    <div class="form-group"><input type="search" class="form-control" placeholder="Buscar" id="buscar_post"></div>
    <form method="post" action="">
    <div class="form-group">
      <input type="submit" name="delete" value="Eliminar" class="btn btn-default">
    </div>

    <div id="datos">
                <table class="table table-striped table-bordered table-list">
                 
                    <tr>
                      
                      


<?php
if(isset($_REQUEST['delete'])) {
  $chk = $_REQUEST['checkbox'];
  $a = implode(',', $chk);
  mysqli_query($link, "DELETE FROM posts WHERE id_post IN ($a)");
}
?>











                        <th width="3%"><input type="checkbox" class="all"></th>
                        <th width="6%" class="text-center">ID</th>
                        <th class="text-center">Título</th>
                        <th class="text-center">Fecha</th>
                    </tr> 
                 

                  	


<?php

					$query = mysqli_query($link, "SELECT * FROM posts ORDER BY id_post Desc");
					while($data = mysqli_fetch_array($query)) {
            $id_post = $data['id_post'];
            $title = $data['titulo'];
						?>
                        <tr>
                          <td width="3%"><input type="checkbox" class="child" name="checkbox[]" value="<?php echo $data['id_post']; ?>"></td>
                            
                            
                            <td width="6%"  class="text-center"><?php echo $data['id_post']; ?></td>
                            <td><a href="post_edit.php?id=<?php echo $data['id_post']; ?>"><?php echo $data['titulo']; ?></a></td>
                            <td width="14%" class="text-center"><?php echo $data['fecha']; ?></td>
                          </tr>
                          <?php
                      }
                      ?>
                        
                </table>
                </div>
            </form> 
              </div>

<?php include('footer.php'); ?>
<script>
$(function(){
  $('.all').on('click', function() {
    $('.child').prop('checked', this.checked)
  });
});
</script>
