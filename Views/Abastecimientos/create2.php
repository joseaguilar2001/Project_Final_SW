<h3 class="title mb-6">Abastecimientos</h3>
    <p class="help is-success">
    En esté formulario, por favor colocar cada uno de los campos solicitados,
    se le recomienda que tenga mucho cuidado.
</p>
    <form action="" method="post">
    <div class="field">
    <label class="label">Escoger el Proveedor:</label>
    <div class="control">
        <div class="select">
        <select name="idPrv" class="select is-rounded">
            <option value="0">Proveedor desconocido</option>
            <?php foreach($proveedores as $prov){ ?>
            <option value="<?php echo $prov -> IdProv; ?>"><?php echo $prov -> Name; ?></option>
            <?php } ?>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Escoger Producto:</label>
    <div class="control">
        <div class="select">
        <select name="idPrd" class="select is-rounded">
            <option value="0">Producto Desconocido</option>
            <?php foreach($productos as $prod){ ?>
            <option value="<?php echo $prod -> IdProd; ?>"><?php echo $prod -> Name; ?></option>
            <?php } ?>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Cantidad</label>
    <div class="control">
        <input class="input" pattern="^[0-9]{0,1000}?$" type="text" name="cnt" placeholder="Cantidad">
    </div>
    <p class="help">Ingrese aquí la cantidad de productos.</p>
    </div>

    <div class="field">
    <label class="label" for="fecha">Fecha:</label>
    <div class="control">
        <input type="date" id="fecha" name="fecha" data-display-mode="inline" data-is-range="true" data-close-on-select="false">
    </div>
    <p class="help">Ingrese aquí la fecha en la que se hizo el abastecimiento.</p>
    </div>

    <div class="field is-grouped">
    <div class="control">
        <button value="Crear" type="submit" class="button is-link">Crear</button>
    </div>
    <div class="control">
        <a name="cancel" href="index.php?controller=abastecimientos&action=home" class="button is-text">Cancelar</a>
    </div>
    </div>
    </form>