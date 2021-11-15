<section class="hero is-link is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>
            <a class="button is-warning" href="index.php?controller=contacto&action=imprimir">Imprimir</a>
            <a class="button is-primary" href="index.php?controller=contacto&action=create">Añadir un contacto</a>
    </div>
</section>
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

  var labelData = {
	placeholder: "Buscar contacto...",
	perPage: "Mostrar {select} contactos por pagina",
	noRows: "No hay contactos para mostrar",
	info: "Mostrando del {start} al {end} de {rows} contactos (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });
</script>