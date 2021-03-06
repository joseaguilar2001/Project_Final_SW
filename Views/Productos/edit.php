<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Producto</h3>
    <p class="help is-success">
    En está parte se actualizará los registros de los 
    Productos, por favor tener en cuenta que fecha se realizo.
</p>
<form method="POST" action="">
  <div class="field">
    <label class="label">
  Nombre Producto</label>
    <div class="control">
      <input value="<?php echo $product -> Name; ?>" class="input" name="nombre" type="text" placeholder="Nombre del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Precio</label>
    <div class="control">
      <input class="input" name="precio"  value="<?php echo $product -> Price; ?>" type="text" placeholder="Precio del producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Existencias</label>
    <div class="control">
      <input class="input" name="exist" type="text" value="<?php echo $product -> Exist; ?>" placeholder="Existencias del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Medida</label>
    <div class="control">
      <input class="input" name="medida" type="text" value="<?php echo $product -> Medida; ?>" placeholder="Medida del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Limite</label>
    <div class="control">
      <input class="input" name="limite" type="text" value="<?php echo $product -> Limite; ?>" placeholder="Limite del Producto">
    </div>
  </div>
  <div class="field">
    <label class="label">
  Fecha de caducidad: </label>
    <div class="control">
      <input class="input" name="fecha" type="date" value="<?php echo $product -> DateOff; ?>" placeholder="Fecha del Producto">
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
      <button value="Editar" type="submit" class="button is-link">Editar</button>
    </div>
    <div class="control">
    <a href="index.php?controller=productos&action=home" class="button is-text">Cancelar</a>
    </div>
  </div>
</form>
</div>
