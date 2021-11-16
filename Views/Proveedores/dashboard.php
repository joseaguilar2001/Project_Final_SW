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
            <a class="button is-primary" href="index.php?controller=proveedores&action=create">Añadir un Proveedor</a>
            <a class="button is-warning" href="index.php?controller=proveedores&action=imprimir">Imprimir</a>
            <?php endif ?>
        </div>
    </div>
</section>
<section class="info-tiles">
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title"><?php echo $countpro; ?></p>
                <p class="subtitle">Proveedores</p>
            </article>
        </div>
    </div>
</section>

<table class="table" width="100%" id="tabla">
    <thead>
        <tr>
            <th><abbr>Nombre</abbr></th>
            <th><abbr>Direccion</abbr></th>
            <th><abbr>Email</abbr></th>
            <?php if($idU == '01' OR $idU == '03' OR $idU == '02'): ?>
                <th><abbr>Enviar Email</abbr></th>
            <?php else: ?>
            <?php endif ?>
        </tr>
    </thead>
    <tbody>
    <?php foreach($provs as $pr): ?>
        <?php if($pr -> Estado != '4' || $pr -> Estado > 4): ?>
        <tr>
            <td><?php echo $pr -> Name; ?></td>
            <td><?php echo $pr -> Adress; ?></td>
            <td><?php echo $pr -> Email; ?></td>
            <td>
                <?php if($idU == '01' OR $idU == '03' OR $idU == '02'): ?>
                    <?php if($pr -> Email != '' OR $pr -> Email != null): ?>
                        <a class="button is-primary modal-button" data-target="#modal">Enviar Email</a>
                    <?php endif ?>
                <?php else: ?>
                <?php endif ?>

                <div id="modal" class="modal">
                <div class="modal-background"></div>
                <div class="modal-content">
                    <div class="box">
                        <form action="../../mails.php" method="post">
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input value="<?php echo $pr -> Email; ?>" class="input" name="email" type="text" placeholder="Text input" >
                                <input value="<?php echo $pr -> Name; ?>" Class="input" name="name" type="text" placeholder="Proveedor">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Asunto</label>
                            <div class="control">
                                <input class="input" type="text" name="asunto" placeholder="Asunto">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Mensaje</label>
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
            </td>
        </tr>
        <?php endif ?>
        <?php endforeach ?>
    </tbody>
</table>

<script>
  var tabla = document.querySelector("#tabla");

  var labelData = {
	placeholder: "Buscar proveedores...",
	perPage: "Mostrar {select} proveedores por pagina",
	noRows: "No hay proveedores para mostrar",
	info: "Mostrando del {start} al {end} de {rows} proveedores (Pagina {page} de {pages} paginas)"
};

  var dataTable = new DataTable(tabla, {
    labels: labelData,
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