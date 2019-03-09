<?php include('header.php'); ?>

			
				<?php
                      $img = $_SESSION['img'];
                      $query = mysqli_query($link, "SELECT * FROM users WHERE img = '$img'");
                      $data = mysqli_fetch_array($query);
                      ?>
                      <div style="text-transform: capitalize;">Bienvenido <?php echo $_SESSION['user']; ?></div>
                      <img src="images/<?php echo $_SESSION['img']; ?>" class="img-responsive thumbnail" width="100">

<?php
include('config.php');
$query = mysqli_query($link, "SELECT * FROM posts");
$cont_posts = $query->num_rows;
echo '<div class="alert alert-success">'.$cont_posts.' registros</div>';

$query = mysqli_query($link, "SELECT * FROM users");
$cont_users = $query->num_rows;
echo '<div class="alert alert-success">'.$cont_users.' usuarios</div>';
?>

			

<?php include('footer.php'); ?>