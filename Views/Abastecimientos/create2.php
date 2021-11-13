<div class="modal-content has-background-whyte py-5 px-5">
<h3 class="title mb-2">Abastecimientos</h3>
    <p class="help is-success">
    En esté formulario, por favor colocar cada uno de los campos solicitados,
    se le recomienda que tenga mucho cuidado.
</p>
<br>
<section class="columns">
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
  <label class="label">Fecha</label>
  <div class="control">
    <input class="input" name="fecha" type="date" placeholder="Fecha Solicitud">
  </div>
</div>

    <div class="field is-grouped">
    <div class="control">
        <button value="Crear" type="submit" class="button is-link">Crear</button>
    </div>
    <div class="control">
        <a name="cancel" href="index.php?controller=abastecimientos&action=dashboard" class="button is-text">Cancelar</a>
    </div>
    </div>
    </form>
</section>
</div>