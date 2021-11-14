<section class="hero is-link is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>
            <a class="button is-primary" href="index.php?controller=solicitudes&action=create">Solicitar Producto</a>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Solicitudes Activas</p>
                <p class="subtitle">Registros de las solicitudes activas.</p>
            </article>
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
          <?php if( $idU == '01' OR $idU == '03' ): ?>
            <th><abbr title="Confirmar">Confirmar | Rechazar</abbr></th>
          <?php endif?>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="IdArea">Area</abbr></th>
          <th><abbr title="IdProducto">Producto</abbr></th>
          <th><abbr title="IdUser">Usuarios</abbr></th>
          <th><abbr title="Fecha">Fecha</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <?php if( $idU == '01' OR $idU == '03' ): ?>
            <th><abbr title="Confirmar">Confirmar | Rechazar</abbr></th>
          <?php endif?>
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
        <?php if( $idU == '01' OR $idU == '03' ): ?>
          <div class="modal">
            <div class="modal-background">Rechaza | Aceptar</div>
            <div class="modal-content">
              <form action="" method="post">
                <div class="field">
                  <label for="solicitud">Id Solicitud</label>
                  <div class="control">
                    <input id="solicitud" name="idsolicitud" type="text" class="input" value="<?php echo $a->IdSolicitud; ?>" disabled>
                  </div>
                </div>
                <div class="field">
                  <label for="codigo">Código de Autorización</label>
                  <div class="control">
                    <input type="text" name="codigo" class="input" value="<?php echo $cadena; ?>" disabled>
                  </div>
                </div>
                <div class="field">
                  <div class="control">
                    <label class="radio">
                      <input value="1" type="radio" name="question">
                      Aceptar
                    </label>
                    <label>
                    <input value="3" type="radio" name="question">
                      Rechazar
                    </label>
                  </div>
                </div>
                <div class="field is-grouped">
                  <div class="control">
                    <button type="submit" value="submit" class="button is-link">Confirmar</button>
                  </div>
                  <div class="control">
                    <a href="?controller=solicitudes&action=dashboard" class="button is-link is-light">Cancelar</a>
                  </div>
                </div>
              </form>
            </div>
            <button class="modal-close is-large" aria-label="close"></button>
          </div>
        <?php endif ?>
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