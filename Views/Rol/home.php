<h3 class="title mb-6">Registros sobre los Roles.</h3>
<br>
<a class="button is-link" href="?controller=rol&action=create">Create</a>
<br>
<table class="table" width="100%" id="tabla">
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
  <tbody>
    <?php foreach($roles as $a) { ?>
      <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->Id; ?></td>
        <td><?php echo $a->Nombre; ?></td>
        <td><?php echo $a->Descripcion; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=rol&action=edit&id=<?php echo $a->Id; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=rol&action=delete&id=<?php echo $a->Id; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
      <?php } ?>
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