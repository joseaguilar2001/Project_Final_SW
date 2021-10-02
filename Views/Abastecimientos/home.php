<h3 class="title mb-6">Registros sobre los Abastecimientos.</h3>
<br>
<a class="button is-link" href="?controller=abastecimientos&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdAbas">IdAbas</abbr></th>
          <th><abbr title="IdProveedor">IdProveedor</abbr></th>
          <th><abbr title="IdProducto">IdProducto</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <th><abbr title="AbasDate">Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th><abbr title="IdAbas">IdAbas</abbr></th>
        <th><abbr title="IdProveedor">IdProveedor</abbr></th>
        <th><abbr title="IdProducto">IdProducto</abbr></th>
        <th><abbr title="Cantidad">Cantidad</abbr></th>
        <th><abbr title="AbasDate">Fecha</abbr></th>
        <th><abbr title="Estado">Estado</abbr></th>
        <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
    <?php
    foreach($abas as $a) { ?>
    
      <tr>
        <td><?php echo $a->Idbas; ?></td>
        <td><?php echo $a->IdProveedor; ?></td>
        <td><?php echo $a->IdProducto; ?></td>
        <td><?php echo $a->Cantidad; ?></td>
        <td><?php echo $a->AbasDate; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=abastecimientos&action=edit&id=<?php echo $a->Idbas; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=abastecimientos&action=delete&id=<?php echo $a->Idbas; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
    <?php } ?>
    
  <tbody>
      
  </tbody>
</table>