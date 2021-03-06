<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Proveedores</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de los 
    Proveedores, por favor tener en cuenta que fecha se realizo.
</p>
<form method="POST" action="">
    <div class="field">
      <label class="label">
    Nombre del proveedor:</label>
      <div class="control">
        <input class="input" name="nombre" type="text" placeholder="Nombre del proveedor">
      </div>
    </div>
    <div class="field">
      <label class="label">
    Dirección del proveedor:</label>
      <div class="control">
        <input class="input" name="direction" type="text" placeholder="Dirección del proveedor">
      </div>
    </div>
    <div class="field">
      <label class="label">
    Email del proveedor:</label>
      <div class="control">
        <input class="input" name="email" type="email" placeholder="Email del proveedor">
      </div>
    </div>
<?php if($idU == '01'): ?>
    <div class="select">
  <select name="estado">
    <option value="0">Seleccione el estado: </option>
    <option value="1">Activo</option>
    <option value="2">Inconcluso</option>
    <option value="3">Inactivo</option>
  </select>
</div>
<?php endif ?>
    <div class="field is-grouped">
      <div class="control">
        <button value="crear" type="submit" class="button is-link">Crear</button>
      </div>
      <div class="control">
      <?php if($idU == '01'): ?>
        <a href="index.php?controller=proveedores&action=home" class="button is-text">Cancelar</a>
      <?php elseif($idU == '02' OR $idU == '03'): ?>
        <a href="index.php?controller=proveedores&action=dashboard" class="button is-text">Cancelar</a>
      <?php endif ?>
      </div>
    </div>
</form>
</div>