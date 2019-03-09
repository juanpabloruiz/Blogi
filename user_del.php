<?php
include('config.php');
$get = $_GET['id'];
mysqli_query($link, "DELETE FROM users WHERE id_user = '$get'");
echo '<script>window.location="users.php"</script>';
?>