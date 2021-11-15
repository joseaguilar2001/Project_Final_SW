<section class="hero is-link is-large is-large-with-navbar has-text-centered">
    <div class="hero-body">
            <h1 class="title">
                ¡Bienvenido!
            </h1>
            <h2 class="subtitle">
                ¡Esperamos que tengas un buen día!
            </h2>
            <a class="button is-warning" href="index.php?controller=contacto&action=imprimir">Imprimir</a>
            <a class="button is-primary" href="index.php?controller=contacto&action=create">Añadir un contacto</a>
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
            <?php if( $idU == '01' OR $idU == '03' ): ?>
            <th><abbr title="Confirmar">Enviar Email</abbr></th>
          <?php endif?>
        </tr>
    </thead>
    <tbody>
        <?php foreach($contactos as $cnt): ?>
        <tr>
            <td><?php echo $cnt -> Proveedor; ?></td>
            <td><?php echo $cnt -> Name; ?></td>
            <td><?php echo $cnt -> LastName; ?></td>
            <td><?php echo $cnt -> Celular; ?></td>
            <td><?php echo $cnt -> Email; ?></td>
            <?php if( $idU == '01' OR $idU == '03' ): ?>
            <td>
            <a class="button is-primary modal-button" data-target="#modal">Enviar</a>
            </td>
            <div id="modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="box">
                        <form action="" method="post">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input value="<?php echo $cnt -> Email; ?>" class="input" name="email" type="text" placeholder="Text input" disabled>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Asunto</label>
                            <div class="control">
                                <input class="input" type="text" name="asunto" placeholder="Asunto">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Message</label>
                            <div class="control">
                                <textarea name="mensaje" class="textarea" placeholder="Textarea"></textarea>
                            </div>
                        </div>
                        <div class="field is-grouped">
                            <div class="control">
                                <button value="enviar" type="submit" class="button is-link">Enviar</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <button class="modal-close is-large" aria-label="close"></button>
            </div>
            <?php endif ?>
        <?php endforeach ?>
        </tr>
    </tbody>
</table>
<script>
  var tabla = document.querySelector("#tabla");

  var dataTable = new DataTable(tabla, {
    perPage:5,
    perPageSelect:[5, 10, 15, 20]
    });
    $(".modal-button").click(function() {
            var target = $(this).data("target");
            $("html").addClass("is-clipped");
            $(target).addClass("is-active");
         });
         
         $(".modal-close").click(function() {
            $("html").removeClass("is-clipped");
            $(this).parent().removeClass("is-active");
         });
</script>