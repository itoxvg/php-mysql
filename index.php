<?php
	error_reporting(E_ALL ^ E_NOTICE);
	//Evita msn de error pero sigue mostrando errores

	$op = $_GET["op"];

	switch ($op) {
		case 'alta':
			$contenido = "php/alta-contacto.php";
			$titulo = "Alta de Contactos";
			break;

		case 'baja':
			$contenido = "php/baja-contacto.php";
			$titulo = "Baja de Contactos";
			break;

		case 'cambio':
			$contenido = "php/cambios-contacto.php";
			$titulo = "Cambio de Contactos";
			break;
		
		case 'consultas':
			$contenido = "php/consultas-contacto.php";
			$titulo = "Consulta de Contactos";
			break;

		default:
			 $contenido = "php/home.php";
			 $titulo = "Mis Contactos";
			break;
	}
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title> <?php echo $titulo; ?> </title>
	<link rel="stylesheet" href="css/mis-contactos.css">
	<script src="js/jquery.min.js"></script>
	<script src="js/mis-contactos.js"></script>
</head>
<body>
	<section id="contenido">
		<nav>
			<ul>
				<li><a class="cambio" href="index.php">Home</a></li>
				<li><a class="cambio" href="?op=alta">Alta de Contacto</a></li>
				<li><a class="cambio" href="?op=baja">Baja de Contacto</a></li>
				<li><a class="cambio" href="?op=cambio">Cambio de Contacto</a></li>
				<li><a class="cambio" href="?op=consultas">Consultas</a></li>
			</ul>
		</nav>
		<section id="principal">
			<?php include($contenido); ?>
		</section>
	</section>
</body>
</html>