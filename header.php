<?php session_start(); ?>
<?php
if(!isset($_SESSION['user'])) {
	echo '<script>window.location="404.php"</script>';
}
?>
<?php include('config.php'); ?>
<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Juan Pablo Ruiz</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/summernote.css">
  <link rel="stylesheet" href="css/font-awesome.css">
	<script src="js/jquery-3.2.1.min.js"></script>

 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="js/html5.image.preview.min.js"></script>
	<script src="js/summernote.js"></script>
	<script src="js/search.js"></script>
	<script src="js/yui-min.js"></script>
	<script src="js/cropbox.js"></script>





  

<script type="text/javascript">                         
    <!--
    
    $(document).ready(function() {
        
        $('.summernote').summernote({
            height: 600
        });
    
    
        $('#submitBtn').click(function() {
            var summernoteContent = $('.summernote').summernote('code');
            $('#result').val(summernoteContent);
        });
    
    });
    
    //-->
    </script>
    
</head>
<body>

  <!-- Menú -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://juanpabloruiz.com">Blogi</a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="dash.php">Inicio</a></li>
          <li><a href="options.php">Opciones</a></li>
          <li><a href="media.php">Multimedia</a></li>
          <li><a href="posts.php">Registros</a></li>
          <li><a href="cats.php">Categorías</a></li>
          <li><a href="users.php">Usuarios</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          
          <li class="active"><a href="out.php">Cerrar sesión</a></li>
        </ul>
      </nav>

	<!-- Contenedor -->
	<div class="container">

		<div class="page-header" width="100%">

    

       

                      
                      <a href="./"><img src="img/logo.jpg" alt="Logotipo" class="img-responsive"></a>
                      <a href="../" target="_BLANK" class="btn btn-primary">Ver sitio web</a>
                      
		</div>
                      
                    
	

	

<!-- Panel -->
			<div class="panel panel-default">
        <div class="panel-body">