<section class="hero is-small is-info welcome">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>

            <a class="button is-primary" href="index.php?controller=productos&action=create">Añadir un producto</a>
    </div>
</section>
<section class="section">
    <form action="" method="post">
        <div class="container">
            <div class="columns is-4-tablet is-2-descktop is-centered">
                <div class="column is-4-tablet is-3-desktop">
                    <div class="card card_deg_green">
                        <div class="card-content">
                            <div class="content is-size-3">
                                Productos existentes
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                    <a class="button is-link" href="?controller=productos&action=ViewE">ver</a>
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
                <div class="column is-4-tablet is-3-desktop">
                    <div class="card card_deg_warinig">
                        <div class="card-content">
                            <div class="content is-size-3">
                                Productos por agotarse
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                    <a class="button is-link" href="?controller=productos&action=ViewA">ver</a>   
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
                <div class="column is-4-tablet is-3-desktop">
                    <div class="card card_deg_red">
                        <div class="card-content">
                            <div class="content is-size-3">
                            Productos Agotados
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                    <a class="button is-link" href="?controller=productos&action=ViewN">ver</a>
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<section>
<a class="button is-link" href="?controller=productos&action=create">Crear</a>
<br>
<table class="table" width="100%" id="tabla">
  <thead>
      <tr>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($producto as $prod) { ?>
    <?php if($prod -> Estado != '4' || $prod -> Estado < 4){ ?>
        <tr>
            <td><?php echo $prod->Name; ?></td>
            <td><?php echo $prod->Price; ?></td>
            <td><?php echo $prod->Exist; ?></td>
            <td><?php echo $prod->Medida; ?></td>
            <td><?php echo $prod->DateOff; ?></td>
        </tr>
        <?php } ?>
    <?php } ?>
  </tbody>
</table>
<tbody>
<script>
  var tabla = document.querySelector("#tabla");

  var dataTable = new DataTable(tabla, {
    perPage:5,
    perPageSelect:[5, 10, 15, 20]
  });
</script>
