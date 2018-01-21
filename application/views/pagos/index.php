<h1>GeoPagos - Pagos</h1></br>

<!--<?php print_r($listaDeUsuarios)?>-->
<div class="content">
  
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Pagos de Usuario</a></li>
    <li><a data-toggle="tab" href="#menu1">Agregar pagos</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <table class="table table-hover" id="pagos">
    <thead >
      <th>Codigo Pago</th>
      <th>Usuario</th>
      <th>Importe</th>
      <th>Fecha</th>
      <th><center>Acciones</center></th>
    </thead>
      <tbody>
        <?php  foreach ($datosUserPagos as $value) { ?>
          <tr>
            <td><?php echo $value->codigoPago; ?></td>
            <td><?php echo $value->usuario; ?></td>
            <td><?php echo $value->importe; ?></td>
            <td><?php echo $value->fecha; ?></td>
            <td>
              <center>
              <a href="<?php echo base_url('pagos/editPago/').$value->codigoPago; ?>"" class="btn btn-warning" title="Editar Pago"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> </a>
              <a href="<?php echo base_url('pagos/deletePago/').$value->codigoPago; ?>" class="btn btn-danger" title="Eliminar Pago"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
            </center>
            </td>
          </tr>
           
            <?php } ?>
          </tbody>
        </table>
    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Agregar</h3>
        <form method="POST" action="<?php echo base_url('pagos/insert')?>">
          <input type="hidden" name="tipo" value="usuario">
          <div class="form-group">
            <label for="nombre">Usuario a imputar el pago</label>
            <select name="usuario" class="form-control" style="padding: 1px">
              <?php foreach ($listaDeUsuarios as $value) { ?>
                <option value="<?php echo $value->codigoUsuario?>"><?php echo $value->usuario?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="importe">Importe</label>
            <input type="number" class="form-control" name="importe" id="importe" aria-describedby="importe" placeholder="Ingrese el monto">
          </div>
          <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" class="form-control datepicker" id="fecha" min="<?php echo date('Y-m-d');?>" value="<?php echo date('Y-m-d');?>" >
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
           <a href="<?php echo base_url('pagos/getPagos/'.$idUser);?>" class="btn btn-danger">Cancelar</a>
        </form> 
    </div>
     <a href="<?php echo base_url('');?>" class="btn btn-primary pull-right">Volver a Usuarios</a>
  </div>
</div>

