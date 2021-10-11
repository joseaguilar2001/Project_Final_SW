<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Autorización</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de las 
    autorizaciones, por favor tener en cuenta que fecha se realizo.
</p>
<div class="select">
  <select name="idsolicitud">
    <option value="0">Selecciones la Solicitud:</option>
    <?php foreach($solicitud as $sld){ ?>
    <option value="<?php echo $sld -> IdSolicitud; ?>"><?php echo "Solicitud del producto: " . $sld -> Producto . "Para el area: " . $sld -> Area;?></option>
    <?php } ?>
  </select>
</div>
<br/>
<div class="select">
  <select name="iduser">
    <option value="0">Selecciones el Usuario:</option>
    <?php foreach($usuarios as $use){ ?>
    <option value="<?php echo $use->IdUser; ?>"><?php echo $use->Username; ?></option>
    <?php } ?>
  </select>
</div>
<div class="field">
  <label class="label">Fecha</label>
  <div class="control">
    <input name="fecha" class="input" type="date" placeholder="Text input">
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
    <option selected>Selecciones el Estado:</option>
    <option value="1">Autorizado</option>
    <option value="2">En proceso</option>
    <option value="3">Sin autorizar.</option>
  </select>
</div>

<div class="field is-grouped">
  <div class="control">
    <button value="crear" class="button is-link">Crear</button>
  </div>
  <div class="control">
        <a name="cancel" href="index.php?controller=autorizaciones&action=home" class="button is-text">Cancelar</a>
    </div>
</div>