<section class="hero is-small is-info welcome">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>

            <a class="button is-primary" href="index.php?controller=solicitudes&action=create">Realizar una nueva solicitud</a>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="columns is-4-tablet is-2-descktop is-centered">
            <div class="column is-4-tablet is-3-desktop">
                <div class="card card_deg_green">
                    <div class="card-content">
                        <div class="content is-size-3">
                            Solicitudes ya hechas
                        </div>
                    </div>
                    <footer class="card-footer">
                    <p class="card-footer-item">
                                <span>
                                    <a class="button is-link" href="?controller=solicitudes&action=vistaS">ver</a>
                                </span>
                            </p>
                    </footer>
                </div>
            </div>
            <div class="column is-4-tablet is-3-desktop">
                <div class="card card_deg_warinig">
                    <div class="card-content">
                        <div class="content is-size-3">
                            Solicitudes en espera
                        </div>
                    </div>
                    <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                <a class="button is-link" href="?controller=solicitudes&action=vistaE">ver</a>
                                </span>
                            </p>
                    </footer>
                </div>
            </div>
            <div class="column is-4-tablet is-3-desktop">
                <div class="card card_deg_red">
                    <div class="card-content">
                        <div class="content is-size-3">
                           Solicitudes rechazadas
                        </div>
                    </div>
                    <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                <a class="button is-link" href="?controller=solicitudes&action=vistaR">ver</a>
                                </span>
                            </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>

<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdArea">Area</abbr></th>
          <th><abbr title="IdProducto">Producto</abbr></th>
          <th><abbr title="IdUser">Usuario</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="IdArea">Area</abbr></th>
          <th><abbr title="IdProducto">Producto</abbr></th>
          <th><abbr title="IdUser">Usuarios</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
      </tr> 
  </tfoot>
  <tbody> 
    <?php foreach($solicitudes as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->Area; ?></td>
        <td><?php echo $a->Producto; ?></td>
        <td><?php echo $a->Usuario; ?></td>
        <td><?php echo $a->Fecha; ?></td>
        <td><?php echo $a->Cantidad; ?></td>

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