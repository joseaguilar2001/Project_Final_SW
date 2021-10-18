<div class="modal-content has-background-whyte py-5 px-5">
        <h3 class="title mb-6">Actualizar Usuario</h3>
        <p class="help is-success">
        En está parte se actualizará los registros de los 
        usuario, por favor tener en cuenta que fecha se realizo.
        </p>
    <form method="POST" action="">
    <div class="field">
    <label class="label">Nombre</label>
    <div class="control">
        <input value="<?php echo $user -> Nombre; ?>" class="input" name="nombre" type="text" placeholder="Text input">
    </div>
    </div>
    <div class="field">
  <label class="label">Apellido</label>
  <div class="control">
    <input class="input" value="<?php echo $user -> Apellido; ?>" name="apellido" type="text" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Username</label>
  <div class="control">
    <input class="input" type="text" value="<?php echo $user -> Usuario; ?>" name="username" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" type="password" name="password" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" type="email" name="mail" value="<?php echo $user -> Email; ?>" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Telefono</label>
  <div class="control">
    <input class="input" value="<?php echo $user -> Telefono; ?>" name="cel" type="cel" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Rol</label>
  <div class="control">
    <div class="select">
      <select name="rol">
        <option value="0">Seleccione el rol:</option>
        <?php foreach($rol as $r){ ?>
        <option value="<?php echo $r -> Id; ?>" ><?php echo $r -> Nombre; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>
<div class="field">
  <label class="label">Rol</label>
  <div class="control">
<div class="select">
  <select name="estado">
    <option value="0" selected>Selecciones el estado</option>
    <option value="1">Activo</option>
    <option value="2">En progreso</option>
    <option value="3">Inactivo</option>
  </select>
</div>
  </div>
</div>
<div class="field is-grouped">
          <div class="control">
            <button type="submit" class="button is-link">Crear</button>
          </div>
          <div class="control">
          <a href="index.php?controller=usuario&action=home" class="button is-text">Cancelar</a>
          </div>
        </div>
    </form>
</div>