<h3 class="title mb-6">Registros sobre los Productos.</h3>
<br>
<a class="button is-link" href="?controller=productos&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdProd">IdAbas</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Limite">Limite</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
      <th><abbr title="IdProd">IdAbas</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Limite">Limite</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
    <?php
    foreach($producto as $prod) { ?>
    
      <tr>
        <td><?php echo $prod->IdProd; ?></td>
        <td><?php echo $prod->Name; ?></td>
        <td><?php echo $prod->Price; ?></td>
        <td><?php echo $prod->Exist; ?></td>
        <td><?php echo $prod->Medida; ?></td>
        <td><?php echo $prod->Limite; ?></td>
        <td><?php echo $prod->DateOff; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=productos&action=edit&id=<?php echo $prod->IdProd; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=productos&action=delete&id=<?php echo $prod->IdProd; ?>">
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