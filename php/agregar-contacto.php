<?php

	//Asigno a variables de php los valores que vienen del formulario
	$email = $_POST["email_txt"];
	$nombre = $_POST["nombre_txt"];
	$sexo = $_POST["sexo_rdo"];
	$nacimiento = $_POST["nacimiento_txt"];
	$telefono = $_POST["telefono_txt"];
	$pais = $_POST["pais_slc"];

	//dependiendo el sexo ponemos img predeterminada 
	//evaluacion $imagen_generica = (condicion)?true:false;
	$imagen_generica = ($sexo == "M")?"amigo.png":"amiga.png";

	//verificamos que no exista previamente el email del usuario en la DB
	include("conexion.php");
	$consulta = " SELECT * FROM contactos WHERE email ='$email' ";
	$ejecutar_consulta = $conexion->query($consulta);
	$num_regs = $ejecutar_consulta->num_rows; //num_rows devuelve el # de registros

	//Si $num_regs = 0 el usuario no existe, insertamos en DB , sino mandamos MENSAJE que ya existe el usuario (el email) 

	if($num_regs == 0) {
		//Se ejecuta la funcion para subir la imagen
		include("funciones.php");
		$tipo = $_FILES["foto_fls"]["type"];
		$archivo = $_FILES["foto_fls"]["tmp_name"];
		$se_subio_imagen = subir_imagen($tipo,$archivo,$email);

		//si la foto en el formulario viene vacia, enconces le asigno el valor de la imagen generica, sino entonces el nombre de la foto que se subio.

		$imagen = empty($archivo)?$imagen_generica:$se_subio_imagen;

		$consulta = " INSERT INTO contactos (email, nombre, sexo, nacimiento, telefono, pais, imagen) VALUES ('$email','$nombre','$sexo','$nacimiento','$telefono','$pais','$imagen') ";

		$ejecutar_consulta = $conexion->query(utf8_encode($consulta));

		if($ejecutar_consulta)
			$mensaje = "Se a dado de alta al contacto con el email <b>$email</b> ";	
		else
			$mensaje = "No se a dado de alta al contacto con el email <b>$email</b> por que ya existe";	

	}else{
		$mensaje = "El email <b>$email</b>  ya existe, Necesitas otro email. ";
	}
	$conexion->close();

	header("Location: ../index.php?op=alta&mensaje=$mensaje");

?>