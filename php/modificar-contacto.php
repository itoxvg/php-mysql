<?php

	//Asigno a variables php los valores que vienen del cambio-formulario 
	//Como el campo del email esta deshabilitado en el form php no lo reconoce por eso tengo que guardar su valor en un campo oculto "email_hdn"

	$email = $_POST["email_hdn"];
	$nombre = $_POST["nombre_txt"];
	$sexo = $_POST["sexo_rdo"];
	$nacimiento = $_POST["nacimiento_txt"];
	$telefono = $_POST["telefono_txt"];
	$pais = $_POST["pais_slc"];

	include("conexion.php");

	$consulta = " SELECT * FROM contactos WHERE email='$email'";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows;

	if($num_regs == 1) {
		//si la foto viene vacia asignamos la foto del valor oculto(hidden) que es el valor anterior , sino subo la nueva foto y la reemplazo.
		
		if(empty($_FILES["foto_fls"]["tmp_name"])) {

			$imagen = $_POST["foto_hdn"];

		} else {
			//se ejecuta la funcion para subir la imagen
			include("funciones.php");
			$tipo = $_FILES["foto_fls"]["type"];
			$archivo = $_FILES["foto_fls"]["tmp_name"];
			$imagen = subir_imagen($tipo, $archivo, $email);
		}

		//actualizar datos del contacto en DB 
		$consulta = " UPDATE contactos SET nombre='$nombre', sexo='$sexo', nacimiento='$nacimiento', telefono = '$telefono', pais='$pais', imagen='$imagen' WHERE email='$email' ";
		$ejecutar_consulta = $conexion->query(utf8_encode($consulta));

		if($ejecutar_consulta) {

			$mensaje = "Se hicieron los cambios en los datos del contacto con el email <b>$email</b> ";

		} else {
			$mensaje = " No se hicieron los cambios para el contacto <b>$email</b> ";
		}

	} else {
		$mensaje = "No se hicieron cambios en los datos del contacto con el email <b>$email</b> porque no existe o esta duplicado";
	}
	$conexion->close();

	header("Location: ../index.php?op=cambio&mensaje=$mensaje");
?>