<section class="hero is-link is-medium is-medium-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title">
                Áreas Existentes
            </h1>
            <h2 class="subtitle">
                Las diferentes áreas que existen en la empresa.
            </h2>
    </div>
</section>
<br>
<a class="button is-link" href="?controller=areas&action=create">Create</a>
<br>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdAreas">IdAreas</abbr></th>
          <th><abbr title="Nombre">Nombre</abbr></th>
          <th><abbr title="Descripcion">Descripción</abbr></th>
          <th><abbr title="Cantidad">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th><abbr title="IdAreas">IdAreas</abbr></th>
        <th><abbr title="Nombre">Nombre</abbr></th>
        <th><abbr title="Descripcion">Descripción</abbr></th>
        <th><abbr title="Cantidad">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php
    foreach($areas as $a) { ?>
    
      <tr>
      <th><?php echo $a -> IdAreas; ?></th>
        <th><?php echo $a -> NombreArea; ?></th>
        <th><?php echo $a -> DescAreas; ?></th>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=areas&action=edit&id=<?php echo $a->IdAreas; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=areas&action=delete&id=<?php echo $a->IdAreas; ?>">
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
	placeholder: "Buscar area...",
	perPage: "Mostrar {select} areas por pagina",
	noRows: "No hay areas para mostrar",
	info: "Mostrando del {start} al {end} de {rows} areas (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });
</script>