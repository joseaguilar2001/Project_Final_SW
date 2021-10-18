<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Producto</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de los 
    Productos, por favor tener en cuenta que fecha se realizo.
</p>
<form method="POST" action="">
  <div class="field">
    <label class="label">
  Nombre Producto</label>
    <div class="control">
      <input class="input" name="nombre" type="text" placeholder="Nombre del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Precio</label>
    <div class="control">
      <input class="input" name="precio" type="text" placeholder="Precio del producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Existencias</label>
    <div class="control">
      <input class="input" name="exist" type="text" placeholder="Existencias del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Medida</label>
    <div class="control">
      <input class="input" name="medida" type="text" placeholder="Medida del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Limite</label>
    <div class="control">
      <input class="input" name="limite" type="text" placeholder="Limite del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Fecha de caducidad: </label>
    <div class="control">
      <input class="input" name="fecha" type="date" placeholder="Fecha del Producto">
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
      <button value="crear" type="submit" class="button is-link">Crear</button>
    </div>
    <?php if($_SESSION['Rol'] == "04"): ?>
          <a href="index.php?controller=productos&action=view" class="button is-text">Cancelar</a>
        <?php endif ?>
        <?php if($_SESSION['Rol'] == "03"): ?>
          <a href="index.php?controller=productos&action=view" class="button is-text">Cancelar</a>
        <?php endif ?>
        <?php if($_SESSION['Rol'] == "02"): ?>
          <a href="index.php?controller=productos&action=home" class="button is-text">Cancelar</a>
        <?php endif ?>
        <?php if($_SESSION['Rol'] == "01"): ?>
          <a href="index.php?controller=productos&action=home" class="button is-text">Cancelar</a>
        <?php endif ?>
  </div>
</form>
</div>