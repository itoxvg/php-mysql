<?php
	//no se puede incluir dos veces la conexion, hacemos explusivo de alta-contacto el include ("conexion.php") , por que en cambios-contacto.php ya tengo establecida la conexion previamente

	if (!$registro_contacto["pais"]) {
		include("conexion.php");
	}	

	$consulta = " SELECT * FROM pais ORDER BY pais ";
	$ejecutar_consulta = $conexion->query($consulta);
	
	while ($registro = $ejecutar_consulta->fetch_assoc()) {

		$nombre_pais = utf8_encode($registro["pais"]);
		echo "<option value='$nombre_pais'";
			if( $nombre_pais == utf8_decode($registro_contacto["pais"])) {
				echo " selected";
			}
		echo ">$nombre_pais</option>";
	}
?>