<script>
	window.onload = function() {
		var lista = document.getElementById("contacto-lista");
		lista.onchange = seleccionarContacto;

		function seleccionarContacto() {
			window.location = "?op=cambio&contacto_slc="+lista.value ;
		}
	}
</script>

<form action="php/modificar-contacto.php" id="cambio-contacto" name="cambio_frm" method="POST" enctype="multipart/form-data">
	<fieldset>
		<legend>Cambio de contacto</legend>
		<div>
			<label for="contacto-lista">Contacto: </label>
			<select name="contacto_slc" id="contacto-lista" class="cambio" required>
				<option value="">- - -</option>
				<?php  include("select-email.php"); ?>
			</select>
			<div>
				<?php

					if ($_GET["contacto_slc"] != null) {

						$conexion2 = conectarse();
						$contacto = $_GET["contacto_slc"];
						$consulta_contacto = " SELECT * FROM contactos WHERE email='$contacto'";
						// echo $consulta_contacto;
						$ejecutar_consulta_contacto = $conexion2->query($consulta_contacto);

						$registro_contacto = $ejecutar_consulta_contacto->fetch_assoc();
						//en el archivo cambio-form crea el formulario para editar contacto
						include("php/cambio-form.php");
					}
					include("php/mensajes.php");
				?>
			</div>
		</div>
	</fieldset>
</form> 