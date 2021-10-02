<h3 class="title mb-6">Registros sobre los Áreas.</h3>
<br>
<a class="button is-link" href="?controller=areas&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdAreas">IdAreas</abbr></th>
          <th><abbr title="Nombre">Nombre</abbr></th>
          <th><abbr title="Descripcion">Descripcon</abbr></th>
          <th><abbr title="Cantidad">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th><abbr title="IdAreas">IdAreas</abbr></th>
        <th><abbr title="Nombre">Nombre</abbr></th>
        <th><abbr title="Descripcion">Descripcon</abbr></th>
        <th><abbr title="Cantidad">Acciones</abbr></th>
      </tr> 
  </tfoot>
    <?php
    foreach($areas as $a) { ?>
    
      <tr>
      <th><?php echo $a -> IdAreas; ?></th>
        <th><?php echo $a -> NombreArea; ?></th>
        <th><?php echo $a -> DescAreas; ?></th>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=areas&action=edit&id=<?php echo $a->IdAreas; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=areas&action=delete&id=<?php echo $a->IdAreas; ?>">
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