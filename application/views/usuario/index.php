<h1>GeoPagos - Usuarios</h1></br>



<div class="content">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Listado de usuarios</a></li>
    <li><a data-toggle="tab" href="#menu1">Agregar usuarios</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <table class="table table-hover">
          <thead >
            <th>ID</th>
            <th>Usuario</th>
            <th>Edad</th>
            <th>Clave</th>
            <th><center>Ver pagos</center></th>
            <th><center>Ver Favoritos</center></th>
            <th><center>Acciones</center></th>
          </thead>
          <tbody>
            <?php  foreach ($listaDeUsuarios as $value) { ?>
              <tr>
                <td><?php echo $value->codigoUsuario; ?></td>
                <td><?php echo $value->usuario; ?></td>
                <td><?php echo $value->edad; ?></td>
                <td><?php echo $value->clave; ?></td>
                <td><center>
                  <a href="<?php echo base_url('pagos/getPagos/').$value->codigoUsuario; ?>" id="verPagos" class="btn btn-success" title="Ver Pagos"><span class="glyphicon glyphicon-euro" aria-hidden="true"></span></a>
                </center>
                </td>
                <td><center>
                  <a href="<?php echo base_url('favoritos/getFavoritos/').$value->codigoUsuario; ?>" class="btn btn-primary" title="Ver Favoritos"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></a>
                </center>
                </td>
                <td>
                  <center>
                  <a href="<?php echo base_url('usuario/editUsuario/').$value->codigoUsuario; ?>"" class="btn btn-warning" title="Editar usuario"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
                  <a href="<?php echo base_url('usuario/deleteUser/').$value->codigoUsuario; ?>" class="btn btn-danger" title="Eliminar usuario"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                </center>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Agregar</h3>
        <form method="POST" action="<?php echo base_url('usuario/insert')?>">
          <input type="hidden" name="tipo" value="usuario">
          <div class="form-group">
            <label for="nombre">Nombre de Usuario</label>
            <input type="nombre" name="nombre" required="true" class="form-control" id="nombre" aria-describedby="Nombre" placeholder="Ingrese el Nombre">
          </div>
          <div class="form-group">
            <label for="edad">Edad</label>
            <input type="number" class="form-control" required="true" name="edad" id="edad" aria-describedby="edad" min="18" placeholder="Ingrese su edad">
          </div>
          <div class="form-group">
            <label for="clave">Clave</label>
            <input type="password" name="clave" class="form-control" id="clave" placeholder="clave">
            <small id="clave" class="form-text text-muted">We'll never share your password with anyone else.</small>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form> 
    </div>
  </div>
</div>



<script>
  $( document ).ready(function(){
      $("#verPagos").on('click',function(e){
      console.log(e);
        $("#pagos").removeAttr('display');
    });
  });
</script>