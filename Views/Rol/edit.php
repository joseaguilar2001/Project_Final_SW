<div class="modal-content has-background-whyte py-5 px-5">
    <h3 class="title mb-6">Actualizar Rol</h3>
    <p class="help is-success">
    En está parte se actualizarán los registros de los 
    Roles, por favor tener en cuenta que fecha se realizo.
</p>
<form method="POST" action="">
    <div class="field">
      <label class="label">
    Nombre del rol:</label>
      <div class="control">
        <input class="input" value="<?php echo $rol -> Nombre; ?>" name="rol" type="text" placeholder="Rol">
      </div>
    </div>
    <div class="field">
      <label class="label">
    Descripcion:</label>
      <div class="control">
        <textarea value="<?php echo $rol -> Descripcion; ?>" class="textarea" name="dscrip" placeholder="Rol">
          <?php echo $rol -> Descripcion; ?>
        </textarea>
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
        <button type="submit" class="button is-link">Editar</button>
      </div>
      <div class="control">
      <a href="index.php?controller=rol&action=home" class="button is-text">Cancelar</a>
      </div>
    </div>
    
</form>
</div>