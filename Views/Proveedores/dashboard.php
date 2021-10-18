<section class="hero is-small is-info welcome">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>

            <a class="button is-primary" href="index.php?controller=proveedores&action=CreateTwo">Añadir un proveedor</a>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $countpro; ?></p>
                <p class="subtitle">Proveedores</p>
            </article>
        </div>
    </div>
</section>

<table class="table" width="100%" id="tabla">
    <thead>
        <tr>
            <th><abbr>Nombre</abbr></th>
            <th><abbr>Direccion</abbr></th>
            <th><abbr>Email</abbr></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($provs as $pr): ?>
        <?php if($pr -> Estado != '4' || $pr -> Estado > 4): ?>
        <tr>
            <th><?php echo $pr -> Name; ?></th>
            <th><?php echo $pr -> Adress; ?></th>
            <th><?php echo $pr -> Email; ?></th>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>

<script>
  var tabla = document.querySelector("#tabla");

  var dataTable = new DataTable(tabla, {
    perPage:5,
    perPageSelect:[5, 10, 15, 20]
  });
</script>