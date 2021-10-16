<section class="section">
    <form action="" method="post">
        <div class="container">
            <div class="columns is-4-tablet is-2-descktop is-centered">
                <div class="column is-4-tablet is-3-desktop">
                    <div class="card card_deg_green">
                        <div class="card-content">
                            <div class="content is-size-3">
                                Productos Existentes
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                <button value="Exsitentes" type="submit" class="button is-link">Ver</button>
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
                <div class="column is-4-tablet is-3-desktop">
                    <div class="card card_deg_warinig">
                        <div class="card-content">
                            <div class="content is-size-3">
                                productos por agotarse
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                <button value="agotarse" type="submit" class="button is-link">Ver</button>
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
                <div class="column is-4-tablet is-3-desktop">
                    <div class="card card_deg_red">
                        <div class="card-content">
                            <div class="content is-size-3">
                            productos sin existensia
                            </div>
                        </div>
                        <footer class="card-footer">
                            <p class="card-footer-item">
                                <span>
                                <button value="sin existensia" type="submit" class="button is-link">Ver</button>
                                </span>
                            </p>
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<section>
<a class="button is-link" href="?controller=productos&action=create">Create</a>
<br>
<table class="table" width="100%" id="tabla">
  <thead>
      <tr>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Price">Precio</abbr></th>
          <th><abbr title="Exist">Existencias</abbr></th>
          <th><abbr title="Medida">Medida</abbr></th>
          <th><abbr title="Fecha">Producto Fecha</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>
  <tbody>
    <?php foreach($producto as $prod) { ?>
    <?php if($prod -> Estado != '4' || $prod -> Estado < 4){ ?>
        <?php if ($_POST["Exsitentes"] == "Exsitentes"){?>
            <?php if( $prod -> Limite < $prod -> Exist){ ?>
            <tr>
                <td><?php echo $prod->Name; ?></td>
                <td><?php echo $prod->Price; ?></td>
                <td><?php echo $prod->Exist; ?></td>
                <td><?php echo $prod->Medida; ?></td>
                <td><?php echo $prod->DateOff; ?></td>
                <td>
                <div class="field is-grouped">
                    <p class="control">
                    <a class="button is-warning" href="?controller=productos&action=edit&id=<?php echo $prod->IdProd; ?>">
                        Editar
                    </a>
                    </p>
                </div>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
        <?php if ($_POST["agotarse"] == "agotarse"){?>
            <?php if($prod -> Exist < $prod -> Limite){ ?>
            <tr>
                <td><?php echo $prod->Name; ?></td>
                <td><?php echo $prod->Price; ?></td>
                <td><?php echo $prod->Exist; ?></td>
                <td><?php echo $prod->Medida; ?></td>
                <td><?php echo $prod->DateOff; ?></td>
                <td>
                <div class="field is-grouped">
                    <p class="control">
                    <a class="button is-warning" href="?controller=productos&action=edit&id=<?php echo $prod->IdProd; ?>">
                        Editar
                    </a>
                    </p>
                </div>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
        <?php if ($_POST["sin existensia"] == "sin existensia"){?>
            <?php if($prod -> Exist == 0){ ?>
            <tr>
                <td><?php echo $prod->Name; ?></td>
                <td><?php echo $prod->Price; ?></td>
                <td><?php echo $prod->Exist; ?></td>
                <td><?php echo $prod->Medida; ?></td>
                <td><?php echo $prod->DateOff; ?></td>
                <td>
                <div class="field is-grouped">
                    <p class="control">
                    <a class="button is-warning" href="?controller=productos&action=edit&id=<?php echo $prod->IdProd; ?>">
                        Editar
                    </a>
                    </p>
                </div>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
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