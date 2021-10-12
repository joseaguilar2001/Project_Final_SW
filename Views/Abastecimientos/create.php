<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Registro</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de los 
    abastecimientos, por favor tener en cuenta que fecha se realizo.
</p>
    <form action="" method="post">

    <div class="field">
    <label class="label">Escoger el Proveedor:</label>
    <div class="control">
        <div class="select">
        <select name="idPrv">
            <option value="0">Proveedor desconocido</option>
            <?php foreach($proveedores as $prov){ ?>
            <option value="<?php echo $prov -> IdProv; ?>"><?php echo $prov -> Name; ?></option>
            <?php } ?>
        </select>
        </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Escoger Productos:</label>
    <div class="control">
        <div class="select">
        <select name="idPrd">
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
        <input class="input" pattern="^[0-9]{0,100}?$" type="text" name="cnt" placeholder="Cantidad">
    </div>
    <p class="help">Ingrese aquí la cantidad de productos.</p>
    </div>

    <div class="field">
    <label class="label">Fecha</label>
    <div class="control">
        <input type="date" name="fecha" data-display-mode="inline" data-is-range="true" data-close-on-select="false">
    </div>
    <p class="help">Ingrese aquí la fecha en la que se hizo el abastecimiento.</p>
    </div>

    <div class="control">
    <div class="select">
        <select name="estado">
        <option value="0" selected>Estado</option>
        <option value="1">Realizado</option>
        <option value="2">En Proceso</option>
        <option value="3">Sin iniciar</option>
        </select>
    </div>
    <p class="help">Ingrese aquí el estado del abastecimiento.</p>
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
</div>