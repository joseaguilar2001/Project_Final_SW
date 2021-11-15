<h3 class="title mb-6">Registros sobre los Usuarios.</h3>
<br>
<a class="button is-link" href="?controller=usuario&action=create">Añadir un nuevo usuario</a>
<br>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdUser">Id</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Lastname">Apellido</abbr></th>
          <th><abbr title="Username">Usuario</abbr></th>
          <th><abbr title="Password">Contraseña</abbr></th>
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
          <th><abbr title="Password">Contraseña</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Email">Telefono</abbr></th>
          <th><abbr title="Rol">Rol</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
  <?php foreach($user as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->Id;?></td>
        <td><?php echo $a->Nombre;?></td>
        <td><?php echo $a->Apellido;?></td>
        <td><?php echo $a->Usuario;?></td>
        <td><?php echo $a->Contra;?></td>
        <td><?php echo $a->Email;?></td>
        <td><?php echo $a->Telefono;?></td>
        <td><?php 

        switch($a->Rol)
        {
          case 1:
            echo "Administrador";
            break;
          
          case 2:
            echo "Gerente";
            break;
          
          case 3:
            echo "Bodeguero";
            break;
          
          case 4: 
            echo "Trabajador";
            break;
            
          default:
            echo $a->$Rol;
            break;
        }

          ?></td>
        <td><?php echo $a->Estado;?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=usuario&action=edit&id=<?php echo$a->Id; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=usuario&action=delete&id=<?php echo$a->Id; ?>">
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

  var labelData = {
	placeholder: "Buscar usuario...",
	perPage: "Mostrar {select} usuarios por pagina",
	noRows: "No hay usuarios para mostrar",
	info: "Mostrando del {start} al {end} de {rows} usuarios (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });
</script>