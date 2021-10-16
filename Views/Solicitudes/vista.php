<section class="section">
    <div class="container">
        <div class="columns is-4-tablet is-2-descktop is-centered">
            <div class="column is-4-tablet is-3-desktop">
                <div class="card card_deg_green">
                    <div class="card-content">
                        <div class="content is-size-3">
                            Solicitudes echas
                        </div>
                    </div>
                    <footer class="card-footer">
                        <p class="card-footer-item">
                            <span>
                                 <a href="#">Ver</a>
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
                                 <a href="#">Ver</a>
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
                                 <a href="#">Ver</a>
                            </span>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
<a class="button is-link" href="?controller=solicitudes&action=create">Create</a>
<br>
<table class="table" width="100%" id="tabla">
  <thead>
      <tr>
          <th><abbr title="Names">Nombre</abbr></th>
          <th><abbr title="Fech">Fecha</abbr></th>
          <th><abbr title="Cant">Cantidad</abbr></th>
         
      </tr>
  </thead>
  <tfoot>
      <tr>
      <th><abbr title="Names">Nombre</abbr></th>
          <th><abbr title="Fech">Fecha</abbr></th>
          <th><abbr title="Cant">Cantidad</abbr></th>
         
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($solicitudes as $soli) { ?>
    <?php if($soli -> Estado != '4' || $soli -> Estado < 4){ ?>
      <tr>
        <td><?php echo $soli->IdSolicitud; ?></td>
        <td><?php echo $soli->Fecha; ?></td>
        <td><?php echo $soli->Cantidad; ?></td>
        <td>
          <div class="field is-grouped">
            <p class="control">
              <a class="button is-warning" href="?controller=solicitudes&action=edit&id=<?php echo $soli->IdSoli; ?>">
                Editar
              </a>
            </p>
          </div>
        </td>
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
</section>