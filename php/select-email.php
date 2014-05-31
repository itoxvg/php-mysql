<?php
	//incluyo el archivo de la conexion a la DB
	include("conexion.php");

	//construyo el query para traer los registros en el select del HTML
	$consulta = " SELECT email FROM contactos ORDER BY email ";
	//Ejecutar query
	$ejecutar_consulta = $conexion->query($consulta);

	//con un while recorro todos los registros generados de la consulta anterior
	//construyo las opciones del select de forma dinamica con los registros de la consulta

	while ($registro = $ejecutar_consulta->fetch_assoc()) {
		echo "<option value='".utf8_encode($registro["email"])."'";
		if($_GET["contacto_slc"] == $registro["email"]) {
			echo " selected ";
		}
		echo ">".utf8_encode($registro["email"])."</option>";
	}

	//cerrar conexion
	// $conexion->close();

?>