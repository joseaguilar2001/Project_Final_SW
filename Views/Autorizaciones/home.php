<section class="hero is-link is-medium is-medium-with-navbar has-text-centered">
    <div class="hero-body">
        <div class="container">
        <h1 class="title is-1">
              Registros sobre Autorizaciones
            </h1>
            <h2 class="subtitle is-3">
              Autorizaciones hechas, una vista más facíl.
            </h2>
            <p>En está área encontrará registros sobres los autorizaciones hechas en las solicitudes.</p>
            <br>
            <a class="button is-primary" href="?controller=autorizaciones&action=create">Crear</a>
            <a id="GeneratePDF" href="?controller=abastecimientos&action=imprimir"  class="button is-white">Imprimir</a>
        </div>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdAbas">IdAutorizaciones</abbr></th>
          <th><abbr title="IdProveedor">IdSolicitud</abbr></th>
          <th><abbr title="IdProducto">IdUsuario</abbr></th>
          <th><abbr title="Cantidad">Fecha</abbr></th>
          <th><abbr title="AbasDate">Codigo Autorizacion</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tbody>
    <?php foreach($auth as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->IdAut; ?></td>
        <td><?php echo $a->IdSoli; ?></td>
        <td><?php echo $a->IdUser; ?></td>
        <td><?php echo $a->Date; ?></td>
        <td><?php echo $a->CodA; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=autorizaciones&action=edit&id=<?php echo $a->IdAuts; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=autorizaciones&action=delete&id=<?php echo $a->IdAuts; ?>">
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
	placeholder: "Buscar autorizacion...",
	perPage: "Mostrar {select} autorizaciones por pagina",
	noRows: "No hay autorizaciones para mostrar",
	info: "Mostrando del {start} al {end} de {rows} autorizaciones (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });
</script>