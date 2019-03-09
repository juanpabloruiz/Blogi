<?php include('header.php'); ?>

	<div class="panel-body">


<form class="form-inline" method="post" action="">
  
  <div class="form-group">
    <input type="text" class="form-control" name="cate" placeholder="Categoría">
  </div>
  <button type="submit" name="cat" class="btn btn-success">Crear categoría</button>
</form>
<br>

<?php
if(isset($_POST['cat'])) {
  $cat = $_POST['cate'];
  mysqli_query($link, "INSERT INTO cats (cat) VALUES ('$cat')");
}
?>





    
     
    
   
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
  mysqli_query($link, "DELETE FROM cats WHERE id_cat IN ($a)");
}
?>

                     <th width="3%"><input type="checkbox" class="all"></th>
                        <th width="6%" class="text-center">ID</th>
                        <th class="text-center">Categoría</th>
                        
                    </tr> 
                 

<?php

					$query = mysqli_query($link, "SELECT * FROM cats ORDER BY id_cat Desc");
					while($data = mysqli_fetch_array($query)) {
            $id_post = $data['id_cat'];
            $title = $data['cat'];
						?>
                        <tr>
                          <td width="3%"><input type="checkbox" class="child" name="checkbox[]" value="<?php echo $data['id_cat']; ?>"></td>
                            
                            
                            <td width="6%"  class="text-center"><?php echo $data['id_cat']; ?></td>
                            <td><a href="post_edit.php?id=<?php echo $data['id_cat']; ?>"><?php echo $data['cat']; ?></a></td>
                            
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