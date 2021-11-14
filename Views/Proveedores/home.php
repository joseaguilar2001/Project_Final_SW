<section class="hero is-info welcome is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
        <div class="container">
        <h1 class="title is-1">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle is-3">
                ¡Esperamos que tengas un buen día!
            </h2>
            <p>En está área encontrará los proveedores de los productos existentes en la empresa, cada uno tiene un limite.</p>
            <br>
            <?php if($idU == '04'): ?>
            <?php elseif($idU != '04'): ?>
            <a class="button is-primary" href="index.php?controller=proveedores&action=create">Añadir un producto</a>
            <?php endif ?>
        </div>
    </div>
</section>
<table class="table" width="100%" id="tabla">
    <!-- En está parte veremos los datos de todos los abastecimientos, tener en cuenta que el tfoot es un pie de página -->
  <thead>
      <tr>
          <th><abbr title="IdProv">IdProv</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Adress">Adress</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr>
  </thead>
  <tfoot>
      <tr>
          <th><abbr title="IdProv">IdProv</abbr></th>
          <th><abbr title="Name">Nombre</abbr></th>
          <th><abbr title="Adress">Adress</abbr></th>
          <th><abbr title="Email">Email</abbr></th>
          <th><abbr title="Estado">Estado</abbr></th>
          <th><abbr title="Actions">Acciones</abbr></th>
      </tr> 
  </tfoot>    
  <tbody>
  <?php foreach($prov as $a) { ?>
    <?php if($a -> Estado != '4' || $a -> Estado < 4){ ?>
    <tr>
      <td><?php echo $a->IdProv; ?></td>
      <td><?php echo $a->Name; ?></td>
      <td><?php echo $a->Adress; ?></td>
      <td><?php echo $a->Email; ?></td>
      <td><?php echo $a->Estado; ?></td>
      <td>
        <div class="field is-grouped">
          <p class="control">
            <a class="button is-warning" href="?controller=proveedores&action=edit&id=<?php echo $a->IdProv; ?>">
              Editar
            </a>
          </p>
          <p class="control">
            <a class="button is-danger" href="?controller=proveedores&action=delete&id=<?php echo $a->IdProv; ?>">
              Borrar
            </a>
          </p>
        </div>
      </td>
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