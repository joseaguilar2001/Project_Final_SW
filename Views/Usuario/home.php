<h3 class="title mb-6">Registros sobre los Usuarios.</h3>
<br>
<a class="button is-link" href="?controller=usuario&action=create">Create</a>
<br>
<table class="table" width="100%">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdUser">Id</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Lastname">Apellido</abbr></th>
          <th><abbr title="Username">Usuario</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Email">Telefono</abbr></th>
          <th><abbr title="Rol">Rol</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
      <th><abbr title="IdUser">Id</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Lastname">Apellido</abbr></th>
          <th><abbr title="Username">Usuario</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Email">Telefono</abbr></th>
          <th><abbr title="Rol">Rol</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
  <?php foreach($user as $a) { ?>
      <tr>
        <td><?php echo $a->Id;?></td>
        <td><?php echo $a->Nombre;?></td>
        <td><?php echo $a->Apellido;?></td>
        <td><?php echo $a->Usuario;?></td>
        <td><?php echo $a->Contra;?></td>
        <td><?php echo $a->Email;?></td>
        <td><?php echo $a->Telefono;?></td>
        <td><?php echo $a->Rol;?></td>
        <td><?php echo $a->Estado;?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=usuario&action=edit&id=<?php echo $a->IdUser; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=usuario&action=delete&id=<?php echo $a->IdUser; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>