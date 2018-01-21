

<form method="POST" action="<?php echo base_url('usuario/update')?>">
	<?php foreach ($datosUsuario as $per) { ?>
	<input type="hidden" name="codigoUsuario" class="form-control" id="nombre"  value="<?php echo $per->codigoUsuario;?>" aria-describedby="Nombre">
  <div class="form-group">
    <label for="nombre">Nombre de Usuario</label>
    <input type="text" name="nombre" class="form-control" id="nombre"  value="<?php echo $per->usuario;?>" aria-describedby="Nombre">
  </div>
  <div class="form-group">
    <label for="edad">Edad</label>
    <input type="number" class="form-control" name="edad" value="<?php echo $per->edad;?>" id="edad" aria-describedby="edad" placeholder="Ingrese su edad">
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="password" name="clave" class="form-control" id="clave" value="<?php echo $per->clave;?>" placeholder="clave">
    <small id="clave" class="form-text text-muted">We'll never share your password with anyone else.</small>
  </div>
 <?php } ?>
  <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
</form> 