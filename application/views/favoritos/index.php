<h1>GeoPagos - Favoritos</h1></br>

<?php
//print_r($idUser);
?>

<div class="content">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Favoritos del usuario</a></li>
    <li><a data-toggle="tab" href="#menu1">Agregar Favoritoss</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <table class="table table-hover">
          <thead >
            <th>#</th>
            <th>Usuario</th>
            <th>Favorito</th>
            <th><center>Acciones</center></th>
          </thead>
          <tbody>
            <?php $nro = 1;  foreach ($datosUserFavoritos as $value) {  ?>

          <tr>
            <td><?php echo $nro; ?></td>
            <td><?php echo $value->usuario; ?></td>
            <td><?php echo $value->favorito; ?></td>
            <td>
              <center>
              <a href="<?php echo base_url('favoritos/editFavorito/').$value->codigoUsuario; ?>"" class="btn btn-warning" title="Editar Favorito"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
              <a href="<?php echo base_url('favoritos/deleteFavorito/').$value->codigoUsuarioFavorito.'-'.$value->codigoUsuario; ?>" class="btn btn-danger" title="Eliminar Favorito"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </center>
            </td>
          </tr>
           
            <?php  $nro++; } ?>
          </tbody>
        </table>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Agregar</h3>
        <form method="POST" action="<?php echo base_url('favoritos/insert')?>">
          <input type="hidden" name="codigoUsuario" value="<?php echo $idUser;?>">
          <div class="form-group">
            <label for="nombre">Elija un Favorito</label>
            <select name="usuario" class="form-control" style="padding: 1px">
              <option value="">- Seleccione - </option>
              <?php foreach ($listaDeUsuarios as $value) { ?>
                <option value="<?php echo $value->codigoUsuario?>"><?php echo $value->usuario?></option>
              <?php } ?>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
          <a href="<?php echo base_url('favoritos/getFavoritos/'.$idUser);?>" class="btn btn-danger">Cancelar</a>
        </form> 
    </div>
    <br>
    <a href="<?php echo base_url('');?>" class="btn btn-primary pull-right">Volver a Usuarios</a>
  </div>
</div>

