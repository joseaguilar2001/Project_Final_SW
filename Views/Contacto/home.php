<h3 class="title mb-6">Registros sobre los Contactos.</h3>
<br>
<a class="button is-link" href="?controller=contacto&action=create">Create</a>
<br>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdContacto">IdContacto</abbr></th>
          <th><abbr title="IdProveedor">IdProveedor</abbr></th>
          <th><abbr title="Nombre">Nombre</abbr></th>
          <th><abbr title="Apellido">Apellido</abbr></th>
          <th><abbr title="Celular">Celular</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Email">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th><abbr title="IdContacto">IdContacto</abbr></th>
        <th><abbr title="IdProveedor">IdProveedor</abbr></th>
        <th><abbr title="Nombre">Nombre</abbr></th>
        <th><abbr title="Apellido">Apellido</abbr></th>
        <th><abbr title="Celular">Celular</abbr></th>
        <th><abbr title="Email">Email</abbr></th>
        <th><abbr title="Email">Estado</abbr></th>
        <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($contactos as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4) ?>
      <tr>
        <td><?php echo $a->IdContacto; ?></td>
        <td><?php echo $a->Proveedor; ?></td>
        <td><?php echo $a->Name; ?></td>
        <td><?php echo $a->LastName; ?></td>
        <td><?php echo $a->Celular; ?></td>
        <td><?php echo $a->Email; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=abastecimientos&action=edit&id=<?php echo $a->IdContacto; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=abastecimientos&action=delete&id=<?php echo $a->IdContacto; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>
<script>
  var tabla = document.querySelector("#tabla");

  var dataTable = new DataTable(tabla, {
    perPage:5,
    perPageSelect:[5, 10, 15, 20]
  });
</script>