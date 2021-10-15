<div class="modal-content has-background-whyte py-5 px-5">
        <h3 class="title mb-6">Crear Solicitud</h3>
        <p class="help is-success">
        En está parte se ingresará los registros de los 
        solicitudes, por favor tener en cuenta que fecha se realizo.
        </p>
    <form method="POST" action="">

    <div class="field">
    <label class="label">Escoger el Área:</label>
    <div class="control">
    <div class="select">
    <select name="idarea">
        <option value="0" selected>Area desconocida:</option>
        <?php foreach($area as $ar){ ?>
        <option value="<?php echo $ar -> IdAreas; ?>"><?php echo $ar -> NombreArea; ?></option>
        <?php } ?>
        </select>
    </div>
    </div>
    </div>
    <div class="field">
    <label class="label">Escoger el producto:</label>
    <div class="control">
    <div class="select">
    <select name="idprod">
        <option value="0" selected>Producto desconocido </option>
        <?php foreach($prod as $pr){ ?>
        <option value="<?php echo $pr -> IdProd; ?>"><?php echo $pr -> Name; ?></option>
        <?php } ?>
    </select>
    </div>
    </div>
    </div>

    <div class="field">
    <label class="label">Escoger el Usuario:</label>
    <div class="control">
    <div class="select">
  <select name="user">
    <option value="0" selected>Usuario desconocido</option>
    <?php foreach($user as $us){ ?>
    <option value="<?php echo $us -> Id; ?>"><?php echo $us -> Nombre . " " . $us -> Apellido; ?></option>
    <?php } ?>
  </select>
    </div>
    </div>
</div>
<div class="field">
  <label class="label">Fecha</label>
  <div class="control">
    <input class="input" name="fecha" type="date" placeholder="Fecha Solicitud">
  </div>
</div>
<div class="field">
  <label class="label">Cantidad</label>
  <div class="control">
    <input class="input" type="text" name="cant" placeholder="Cantidad del producto">
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
            <button type="submit" value="Crear" class="button is-link">Crear</button>
          </div>
          <div class="control">
          <a href="index.php?controller=solicitudes&action=home" class="button is-text">Cancelar</a>
          </div>
        </div>
    </form>
</div>