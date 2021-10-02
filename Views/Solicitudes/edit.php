<div class="modal-content has-background-whyte py-5 px-5">
        <h3 class="title mb-6">Actualizar Solicitud</h3>
        <p class="help is-success">
        En está parte se actualizará los registros de los 
        solicitudes, por favor tener en cuenta que fecha se realizo.
        </p>
    <form method="POST" action="">
    <div class="select">
    <select name="idarea">
        <option value="<?php echo $soli -> Area; ?>" selected>Seleccione es area:</option>
        <?php foreach($area as $ar){ ?>
        <option value="<?php echo $ar -> IdAreas; ?>"><?php echo $ar -> NombreArea; ?></option>
        <?php } ?>
        </select>
    </div>
    <div class="select">
    <select name="idprod">
        <option value="<?php echo $soli -> Producto; ?>" selected>Selecciones el producto: </option>
        <?php foreach($prod as $pr){ ?>
        <option value="<?php echo $pr -> IdProd; ?>"><?php echo $pr -> Name; ?></option>
        <?php } ?>
    </select>
    </div>
    <div class="select">
  <select name="user">
    <option value="<?php echo $soli -> Usuario; ?>" selected>Selecciones el usuario</option>
    <?php foreach($user as $us){ ?>
    <option value="<?php echo $us -> IdUser; ?>"><?php echo $us -> Name . " " . $us -> Lastname; ?></option>
    <?php } ?>
  </select>
</div>
<div class="field">
  <label class="label">Fecha</label>
  <div class="control">
    <input class="input" type="date" value="<?php echo $soli -> Fecha; ?>" placeholder="Fecha Solicitud">
  </div>
</div>
<div class="field">
  <label class="label">Cantidad</label>
  <div class="control">
    <input class="input" value="<?php echo $soli -> Cantidad; ?>" type="text" placeholder="Cantidad del producto">
  </div>
</div>
<div class="select">
  <select name="estado">
    <option value="0" selected>Selecciones el estado</option>
    <option value="1">Activo</option>
    <option value="2">En progreso</option>
    <option value="3">Inactivo</option>
  </select>
</div>
        <div class="field is-grouped">
          <div class="control">
            <button type="submit" class="button is-link">Actualizar</button>
          </div>
          <div class="control">
          <a href="index.php?controller=solicitudes&action=home" class="button is-text">Cancelar</a>
          </div>
        </div>
    </form>
</div>