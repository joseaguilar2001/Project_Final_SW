<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Autorización</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de las 
    autorizaciones, por favor tener en cuenta que fecha se realizo.
    Si desconoce algun dato, lo puede agregar normal, despues podrá modificarlo.
</p>
<form action="" method="post">
<div class="field">
  <label class="label">Escoger la Solicitud:</label>
  <div class="control">
  <div class="select">
  <select name="idsolicitud">
    <option value="0">Solicitud desconocida</option>
    <?php foreach($solicitud as $sld){ ?>
    <option value="<?php echo $sld -> IdSolicitud; ?>"><?php echo "Solicitud del producto: " . $sld -> Producto . "Para el area: " . $sld -> Area;?></option>
    <?php } ?>
  </select>
  </div>
</div>
</div>

<div class="field">
<label class="label">Escoger el usuario:</label>
  <div class="control">
<div class="select">
  <select name="iduser">
    <option value="0">Usuario desconocido</option>
    <?php foreach($usuarios as $use){ ?>
    <option value="<?php echo $use->IdUser; ?>"><?php echo $use->Username; ?></option>
    <?php } ?>
  </select>
</div>
</div>
</div>
<div class="field">
  <label class="label">Fecha</label>
  <div class="control">
    <input name="fecha" class="input" type="date">
  </div>
</div>
<div class="field">
  <label class="label">Codigo de Autorización: </label>
  <div class="control">
    <input class="input" name="codigoAuth" type="input" placeholder="Text input">
  </div>
</div>
<div class="select">
  <select name="estado">
    <option value="0" selected>Selecciones el Estado:</option>
    <option value="1">Autorizado</option>
    <option value="2">En proceso</option>
    <option value="3">Sin autorizar.</option>
  </select>
</div>

<div class="field is-grouped">
  <div class="control">
    <button value="Crear" type="submit" class="button is-link">Crear</button>
  </div>
  <div class="control">
        <a name="cancel" href="index.php?controller=autorizaciones&action=home" class="button is-text">Cancelar</a>
    </div>
    </form>
</div>