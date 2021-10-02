<h3 class="title mb-6">Registros sobre los Contactos.</h3>
<br>
<a class="button is-link" href="?controller=rol&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdRol">IdRol</abbr></th>
          <th><abbr title="Nombre">Nombre Rol</abbr></th>
          <th><abbr title="Descripcion">Descripción</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="IdRol">IdRol</abbr></th>
          <th><abbr title="Nombre">Nombre Rol</abbr></th>
          <th><abbr title="Descripcion">Descripción</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
    <?php
    foreach($roles as $a) { ?>
    
      <tr>
        <td><?php echo $a->Id; ?></td>
        <td><?php echo $a->Nombre; ?></td>
        <td><?php echo $a->Descripcion; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=abastecimientos&action=edit&id=<?php echo $a->Id; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=abastecimientos&action=delete&id=<?php echo $a->Id; ?>">
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