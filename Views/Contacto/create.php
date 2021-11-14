<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Contacto</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de los 
    Contactos, por favor tener en cuenta que fecha se realizo.
</p>
<form method="POST" action="">
<div class="select">
  <select name="proveedor">
    <option value="0">Seleccione el proveedor: </option>
    <?php foreach($prov as $p){ ?>
    <option value="<?php echo $p -> IdProv ?>"><?php echo $p -> Name ?></option>
    <?php } ?>
  </select>
</div>
  <div class="field">
    <label class="label">
  Nombre</label>
    <div class="control">
      <input class="input" name="nombre" type="text" placeholder="Nombre del Contacto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Apellido</label>
    <div class="control">
      <input class="input" name="apellido" type="text" placeholder="Apellido del Contacto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Celular</label>
    <div class="control">
      <input class="input" name="cel" type="cel" placeholder="Celular del Contacto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Email</label>
    <div class="control">
      <input class="input" name="email" type="email" placeholder="Email del Contacto">
    </div>
  </div>
  <div class="select">
  <select name="estado">
    <option value="0">Seleccione el estado: </option>
    <option value="1">Activo</option>
    <option value="2">Inconcluso</option>
    <option value="3">Inactivo</option>
  </select>
</div>
  <div class="field is-grouped">
    <div class="control">
      <button value="crear" class="button is-link">Crear</button>
    </div>
        <?php if($idU == "03" OR $idU == "02"): ?>
          <a href="index.php?controller=contacto&action=dashboard" class="button is-text">Cancelar</a>
        <?php endif ?>
        <?php if($idU == "01"): ?>
          <a href="index.php?controller=contacto&action=home" class="button is-text">Cancelar</a>
        <?php endif ?>
  </div>
</form>
</div>