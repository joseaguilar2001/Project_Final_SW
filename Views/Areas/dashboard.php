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
                <p class="title"><?php echo $area; ?></p>
                <p class="subtitle">Areas</p>
            </article>
        </div>
    </div>
</section>
<div class="box">
        <h1> Areas </h1>
        <p>
            En está parte encontrarás las diferentes áreas que se trabajan en la empresa.
        </p>
    </div>
<table class="table" width="100%" id="tabla">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($consult as $c): ?>
        <tr>
            <td><?php echo $c -> NombreArea; ?></td>
            <td><?php echo $c -> DescAreas; ?></td>
        </tr>
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