<form id="baja-contacto" name="baja-frm" action="php/eliminar-contacto.php" method="POST"
enctype="application/x-www-form-urlencoded">
	<fieldset>
		<legend>Baja de contacto</legend>
		<div>
			<label for="email">Email:</label>
			<select name="email_slc" id="email" class="cambio" required>
				<option value="">- - -</option>
				<?php  include("select-email.php"); ?>
			</select>
		</div>
		<div>
			<input type="submit" id="enviar-baja" class="cambio" name="enviar_btn" value="eliminar" />
		</div>
		<?php  include("php/mensajes.php"); ?>
	</fieldset>
</form>