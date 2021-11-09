<section class="hero is-link is-fullheight-with-navbar has-text-centered">
    <div class="hero-body">
        <div class="container">
        <h1 class="title is-1">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle is-3">
                ¡Esperamos que tengas un buen día!
            </h2>

            <a class="button is-primary" href="index.php?controller=productos&action=create">Añadir un producto</a>
        </div>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title"></p>
                    <p class="subtitle">En Riesgo</p>
                    <a class="button is-link" href="?controller=productos&action=dashboard&idN=1">Listar</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title"></p>
                    <p class="subtitle">Normal</p>
                    <a class="button is-link" href="?controller=productos&action=dashboard&idN=2">Listar</a>
                </article>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <p class="title"></p>
                    <p class="subtitle">Al limite</p>
                    <a class="button is-link" href="?controller=productos&action=dashboard&idN=3">Listar</a>
                </article>
            </div>
    </div>
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
