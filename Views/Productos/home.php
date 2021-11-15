<section class="hero is-link is-medium is-medium-with-navbar has-text-centered">
    <div class="hero-body">
        <div class="container">
        <h1 class="title is-1">
              Registros sobre los productos.
            </h1>
            <h2 class="subtitle is-3">
              Control sobre los productos.
            </h2>
            <p>En está área encontrará registros sobres los productos existentes en la empresa.</p>
            <br>
            <a class="button is-primary" href="?controller=productos&action=create">Añadir un producto</a>
            <a id="GeneratePDF" href="?controller=productos&action=imprimir"  class="button is-whyte">Imprimir</a>
        </div>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdProd">IdProducto</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Limite">Limite</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
      <th><abbr title="IdProd">IdProducto</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Limite">Limite</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($producto as $prod) { ?>
    <?php if($prod -> Estado != '4' || $prod -> Estado < 4){ ?>
      <tr>
        <td><?php echo $prod->IdProd; ?></td>
        <td><?php echo $prod->Name; ?></td>
        <td><?php echo $prod->Price; ?></td>
        <td><?php echo $prod->Exist; ?></td>
        <td><?php echo $prod->Medida; ?></td>
        <td><?php echo $prod->Limite; ?></td>
        <td><?php echo $prod->DateOff; ?></td>
        <td><?php echo $prod->Estado; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=productos&action=edit&id=<?php echo $prod->IdProd; ?>">
                Editar
              </a>
            </p>
            <p class="control">
              <a class="button is-danger" href="?controller=productos&action=delete&id=<?php echo $prod->IdProd; ?>">
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
	placeholder: "Buscar producto...",
	perPage: "Mostrar {select} productos por pagina",
	noRows: "No hay productos para mostrar",
	info: "Mostrando del {start} al {end} de {rows} productos (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
  });
</script>