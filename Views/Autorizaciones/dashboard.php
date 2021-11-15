<section class="hero is-link is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title is-1">
                Autorizaciones
            </h1>
            <h2 class="subtitle is-3">
                En está página se podrá ver las autorizaciones hechas a las solicitudes.
            </h2>
            <p>En está área encontrará registros sobres las autorizaciones hechass sobre las solicitudes.</p>
            <br>
            <a class="button is-primary" href="index.php?controller=autorizaciones&action=create">Autorizar una solicitud.</a>
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
        <tr>
            <th><?php echo $aut -> IdSoli;  ?></th>
            <th><?php echo $aut -> IdUser; ?></th>
            <th><?php echo $aut -> Date; ?></th>
            <th><?php echo $aut -> CodA; ?></th>
        </tr>
        <?php endforeach  ?>
    </tbody>
</table>
<script>
  var tabla = document.querySelector("#tabla");

  var labelData = {
	placeholder: "Buscar autorizacion...",
	perPage: "Mostrar {select} autorizaciones por pagina",
	noRows: "No hay autorizaciones para mostrar",
	info: "Mostrando del {start} al {end} de {rows} autorizaciones (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    perPage:5,
    labels: labelData,
    perPageSelect:[5, 10, 15, 20]
    });
</script>