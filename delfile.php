<?php
$file = $_GET['file'];
unlink('images/'.$file);
echo '<script>window.location="media.php"</script>';
?>