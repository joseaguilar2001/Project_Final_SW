<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Crear Proveedores</h3>
    <p class="help is-success">
    En está parte se ingresará los registros de los 
    Proveedores.
</p>
<form method="POST" action="">
    <div class="field">
      <label class="label">Nombre del proveedor:</label>
      <div class="control">
        <input class="input" name="nombre" type="text" placeholder="Nombre del proveedor" required>
      </div>
    </div>
    <div class="field">
      <label class="label">Dirección del proveedor:</label>
      <div class="control">
        <input class="input" name="direction" type="text" placeholder="Dirección del proveedor" required>
      </div>
    </div>
    <div class="field">
      <label class="label">Email del proveedor:</label>
      <div class="control">
        <input class="input" name="email" type="email" placeholder="Email del proveedor" required>
      </div>
    </div>
    <div class="field is-grouped">
      <div class="control">
        <button value="crear" type="submit" class="button is-link">Crear</button>
      </div>
      <div class="control">
      <a href="index.php?controller=proveedores&action=dashboard" class="button is-text">Cancelar</a>
      </div>
    </div>
</form>
</div>