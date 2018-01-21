<?php
	//print_r($datosPago);
?>
<form method="POST" action="<?php echo base_url('pagos/updatePago')?>">
	<?php foreach ($datosPago as $pago) { ?>
	<input type="hidden" name="codigoPago" value="<?php echo $pago->codigoPago?>">
	<div class="form-group">
		<label for="nombre">Usuario a imputar el pago</label>
		<select name="usuario" class="form-control" style="padding: 1px">
			<option value="<?php echo $pago->codigoUsuario?>" selected="true"><?php echo $pago->usuario?></option>
		  <?php foreach ($listaDeUsuarios as $value) { ?>
		    <option value="<?php echo $value->codigoUsuario?>"><?php echo $value->usuario?></option>
		  <?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="importe">Importe</label>
		<input type="number" class="form-control" name="importe" id="importe" aria-describedby="importe" value="<?php echo $pago->importe?>">
	</div>
	<div class="form-group">
		<label for="fecha">Fecha</label>
		<input type="date" name="fecha" class="form-control datepicker" id="fecha" min="<?php echo date('Y-m-d');?>" value="<?php echo $pago->fecha;?>" >
	</div>
	<?php } ?>
	<button type="submit" class="btn btn-primary">Actualizar Pago</button>
</form> 