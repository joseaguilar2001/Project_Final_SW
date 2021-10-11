<h3 class="title mb-6">Registros sobre los Contactos.</h3>
<br>
<a class="button is-link" href="?controller=proveedores&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdProv">IdProv</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Adress">Adress</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="IdProv">IdProv</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Adress">Adress</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>    
  <tbody>
  <?php foreach($prov as $a) { ?>
    
    <tr>
      <td><?php echo $a->IdProv; ?></td>
      <td><?php echo $a->Name; ?></td>
      <td><?php echo $a->Adress; ?></td>
      <td><?php echo $a->Email; ?></td>
      <td><?php echo $a->Estado; ?></td>
      <td>
        <div class="field is-grouped">
          <p class="control">
            <a class="button is-warning" href="?controller=abastecimientos&action=edit&id=<?php echo $a->IdProv; ?>">
              Editar
            </a>
          </p>
          <p class="control">
            <a class="button is-danger" href="?controller=abastecimientos&action=delete&id=<?php echo $a->IdProv; ?>">
              Borrar
            </a>
          </p>
        </div>
      </td>
    </tr>
  <?php } ?>
  </tbody>
</table>