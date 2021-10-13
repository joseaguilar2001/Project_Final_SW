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
                <p class="title"><?php echo $provs; ?></p>
                <p class="subtitle">Proveedores</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $prodC; ?></p>
                <p class="subtitle">Productos</p>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $abasC; ?></p>
                <p class="subtitle">Abastecimientos</p>
            </article>
        </div>
    </div>
</section>
<div class="columns">
    <div class="column is-6">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    Productos
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
    <span class="icon">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
    </span>
</a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <tbody>
                            <?php foreach($product as $prd){ ?>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td><?php echo $prd -> Name; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">View All</a>
            </footer>
        </div>
    </div>

    <div class="column is-6">
        <div class="card events-card">
            <header class="card-header">
                <p class="card-header-title">
                    Proveedores
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
    <span class="icon">
    <i class="fa fa-angle-down" aria-hidden="true"></i>
    </span>
</a>
            </header>
            <div class="card-table">
                <div class="content">
                    <table class="table is-fullwidth is-striped">
                        <tbody>
                            <?php foreach($proveedores as $prv){ ?>
                            <tr>
                                <td width="5%"><i class="fa fa-bell-o"></i></td>
                                <td><?php echo $prv -> Name; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <footer class="card-footer">
                <a href="#" class="card-footer-item">View All</a>
            </footer>
        </div>
    </div>
    </div>
    <table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdProveedor">Proveedor</abbr></th>
          <th><abbr title="IdProducto">Producto</abbr></th>
          <th><abbr title="Cantidad">Cantidad</abbr></th>
          <th><abbr title="AbasDate">Fecha</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
        <th><abbr title="IdProveedor">IdProveedor</abbr></th>
        <th><abbr title="IdProducto">IdProducto</abbr></th>
        <th><abbr title="Cantidad">Cantidad</abbr></th>
        <th><abbr title="AbasDate">Fecha</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($abas as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
      <tr>
        <td><?php echo $a->IdProveedor; ?></td>
        <td><?php echo $a->IdProducto; ?></td>
        <td><?php echo $a->Cantidad; ?></td>
        <td><?php echo $a->AbasDate; ?></td>
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