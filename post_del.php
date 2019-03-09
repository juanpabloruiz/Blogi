<?php
include('config.php');
$get = $_GET['id'];
mysqli_query($link, "DELETE FROM posts WHERE id_post = '$get'");
echo '<script>window.location="posts.php"</script>';
?>