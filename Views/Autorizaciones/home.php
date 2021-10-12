<h3 class="title mb-6">Registros sobre las Autorizaciones.</h3>
<br>
<a class="button is-link" href="?controller=autorizaciones&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdAbas">IdAutorizaciones</abbr></th>
          <th><abbr title="IdProveedor">IdSolicitud</abbr></th>
          <th><abbr title="IdProducto">IdUsuario</abbr></th>
          <th><abbr title="Cantidad">Fecha</abbr></th>
          <th><abbr title="AbasDate">Codigo Autorizacion</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
      <th><abbr title="IdAbas">IdAutorizaciones</abbr></th>
          <th><abbr title="IdProveedor">IdSolicitud</abbr></th>
          <th><abbr title="IdProducto">IdUsuario</abbr></th>
          <th><abbr title="Cantidad">Fecha</abbr></th>
          <th><abbr title="AbasDate">Codigo Autorizacion</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
    <?php foreach($auth as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->IdAut; ?></td>
        <td><?php echo $a->IdSoli; ?></td>
        <td><?php echo $a->IdUser; ?></td>
        <td><?php echo $a->Date; ?></td>
        <td><?php echo $a->CodA; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=autorizaciones&action=edit&id=<?php echo $a->IdAuts; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=autorizaciones&action=delete&id=<?php echo $a->IdAuts; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
      <?php } ?>
    <?php } ?>
    
  <tbody>
      
  </tbody>
</table>