<section class="hero is-link is-large is-large-with-navbar has-text-centered">
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
<div class="box has-text-centered">
        <h1 class="title"> Áreas </h1>
        <p>
            En está parte encontrará las diferentes áreas que se trabajan en la empresa, aquí es para que usted puede tener un excelente descripción de que se trata cadea una.
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