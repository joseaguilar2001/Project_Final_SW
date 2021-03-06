<section class="hero is-link is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>
            <a class="button is-primary" href="index.php?controller=solicitudes&action=create">Solicitar Producto</a>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdSolicitudes">IdSolicitud</abbr></th>
          <th><abbr title="IdArea">IdArea</abbr></th>
          <th><abbr title="IdProducto">IdProducto</abbr></th>
          <th><abbr title="IdUser">IdUser</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
      <th><abbr title="IdSolicitudes">IdSolicitud</abbr></th>
          <th><abbr title="IdArea">IdArea</abbr></th>
          <th><abbr title="IdProducto">IdProducto</abbr></th>
          <th><abbr title="IdUser">IdUser</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody> 
    <?php foreach($solicitudes as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->IdSolicitud; ?></td>
        <td><?php echo $a->Area; ?></td>
        <td><?php echo $a->Producto; ?></td>
        <td><?php echo $a->Usuario; ?></td>
        <td><?php echo $a->Fecha; ?></td>
        <td><?php echo $a->Cantidad; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=solicitudes&action=edit&id=<?php echo $a->IdSolicitud; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=solicitudes&action=delete&id=<?php echo $a->IdSolicitud; ?>">
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
	placeholder: "Buscar solicitud...",
	perPage: "Mostrar {select} solicitudes por pagina",
	noRows: "No hay solicitudes para mostrar",
	info: "Mostrando del {start} al {end} de {rows} solicitudes (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });
</script>