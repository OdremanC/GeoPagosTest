 <?php
	//print_r($listaDeUsuarios);

?>
<form method="POST" action="<?php echo base_url('favoritos/updateFavoritos')?>">
	<input type="hidden" name="codigoUsuario" value="<?php echo $datosUserFavoritos[0]->codigoUsuario?>">
	<div class="form-group">
		<label for="nombre">Elija un Favorito</label>
		<select name="usuario" class="form-control" style="padding: 1px">
			<option value="">- Seleccione - </option>
		  <?php foreach ($listaDeUsuarios as $value) { ?>
		    <option value="<?php echo $value->codigoUsuario?>"><?php echo $value->usuario?></option>
		  <?php } ?>
		</select>
	</div>
	<button type="submit" class="btn btn-primary">Actualizar Favorito</button>
	<a href="<?php echo base_url('favoritos/getFavoritos/'.$datosUserFavoritos[0]->codigoUsuario);?>" class="btn btn-danger">Cancelar</a>
</form> 