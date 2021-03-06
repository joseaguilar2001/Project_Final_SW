<section class="hero is-link is-medium is-medium-with-navbar has-text-centered">
    <div class="hero-body">
        <div class="container">
        <h1 class="title is-1">
              Registros sobre Abastecimientos
            </h1>
            <h2 class="subtitle is-3">
              Todo el control de los Abastecimientos. 
            </h2>
            <p>En está área encontrará registros sobres los abastecimientos hechos en la empresa.</p>
            <br>
            <a class="button is-primary" href="?controller=abastecimientos&action=create">Registrar un abastecimiento</a>
            <a id="GeneratePDF" href="?controller=abastecimientos&action=imprimir"  class="button is-whyte">Imprimir</a>
        </div>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdAbas">IdAbas</abbr></th>
          <th><abbr title="IdProveedor">IdProveedor</abbr></th>
          <th><abbr title="IdProducto">IdProducto</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <th><abbr title="AbasDate">Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tbody>
    <?php foreach($abas as $a): ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4): ?>
      <tr>
        <td><?php echo $a->Idbas; ?></td>
        <td><?php echo $a->IdProveedor; ?></td>
        <td><?php echo $a->IdProducto; ?></td>
        <td><?php echo $a->Cantidad; ?></td>
        <td><?php echo $a->AbasDate; ?></td>
        <td><?php echo $a->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=abastecimientos&action=edit&id=<?php echo $a->Idbas; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=abastecimientos&action=delete&id=<?php echo $a->Idbas; ?>">
                Borrar
              </a>
            </p>
          </div>
        </td>
      </tr>
      <?php endif ?>
    <?php endforeach ?>
  </tbody>
</table>
<script>

  var tabla = document.querySelector("#tabla");

  var labelData = {
	placeholder: "Buscar abastecimiento...",
	perPage: "Mostrar {select} abastecimientos por pagina",
	noRows: "No hay abastecimientos para mostrar",
	info: "Mostrando del {start} al {end} de {rows} abastecimientos (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });

</script>