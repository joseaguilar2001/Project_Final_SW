<div class="modal-content has-background-whyte py-5 px-5">
        <h3 class="title mb-6">Crear Usuario</h3>
        <p class="help is-success">
        En está parte se ingresará los registros de los 
        usuario, por favor tener en cuenta que fecha se realizo.
        </p>
    <form method="POST" action="">
    <div class="field">
    <label class="label">Nombre</label>
    <div class="control">
        <input class="input" name="nombre" type="text" placeholder="Text input">
    </div>
    </div>
    <div class="field">
  <label class="label">Apellido</label>
  <div class="control">
    <input class="input" name="apellido" type="text" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Username</label>
  <div class="control">
    <input class="input" type="text" name="username" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Password</label>
  <div class="control">
    <input class="input" type="password" name="contra" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Email</label>
  <div class="control">
    <input class="input" type="email" name="mail" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Telefono</label>
  <div class="control">
    <input class="input" name="cel" type="input" placeholder="Text input">
  </div>
</div>
<div class="field">
  <label class="label">Rol</label>
  <div class="control">
    <div class="select">
      <select name="rol">
        <option value="0" >Rol desconocido</option>
        <?php foreach($rol as $r){ ?>
        <option value="<?php echo $r -> Id; ?>" ><?php echo $r->Nombre; ?></option>
        <?php } ?>
      </select>
    </div>
  </div>
</div>
<div class="field is-grouped">
          <div class="control">
            <button type="submit" value="crear" class="button is-link">Crear</button>
          </div>
          <div class="control">
          <a href="index.php?controller=usuario&action=home" class="button is-text">Cancelar</a>
          </div>
        </div>
    </form>
</div>