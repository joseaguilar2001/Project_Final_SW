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
                <p class="title"><?php echo $soli; ?></p>
                <p class="subtitle">Solicitudes</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $user; ?></p>
                <p class="subtitle">Usuarios</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $aut; ?></p>
                <p class="subtitle">Autorizaciones</p>
            </article>
        </div>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <thead>
        <tr>
            <th>Solicitud</th>
            <th>Usuario</th>
            <th>Fecha</th>
            <th>Codigo Autorización</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($autoriza as $aut): ?>
        <th>
            <th><?php echo $aut -> IdSoli;  ?></th>
            <th><?php echo $aut -> IdUser; ?></th>
            <th><?php echo $aut -> Date; ?></th>
            <th><?php echo $aut -> CodA; ?></th>
        </th>
        <?php endforeach  ?>
    </tbody>
</table>
<script>
  var tabla = document.querySelector("#tabla");

  var dataTable = new DataTable(tabla, {
    perPage:5,
    perPageSelect:[5, 10, 15, 20]
    });
</script>