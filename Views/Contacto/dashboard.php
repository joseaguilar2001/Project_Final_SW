<section class="hero is-small is-info welcome">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $prov; ?></p>
                <p class="subtitle">Proveedores</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $cont; ?></p>
                <p class="subtitle">Contactos</p>
            </article>
        </div>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <thead>
        <tr>
            <th>Proveedor</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contactos as $cnt): ?>
        <th>
            <th><?php echo $cnt -> Proveedor; ?></th>
            <th><?php echo $cnt -> Name; ?></th>
            <th><?php echo $cnt -> LatName; ?></th>
            <th><?php echo $cnt -> Celular; ?></th>
            <th><?php echo $cnt -> Email; ?></th>
        </th>
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