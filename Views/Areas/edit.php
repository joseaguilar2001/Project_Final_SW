<div class="modal-content has-background-whyte py-5 px-5">
<h3 class="title mb-6">Actualizar Registro</h3>
<p class="help is-success">
    En está parte se ingresará las diferentes areas 
    sistema, por favor, tomar en cuenta que son las 
    que se trabajan por default.
</p>
<form action="" method="post">
<div class="field">
  <label class="label">
Nombre del Area: </label>
  <div class="control">
    <input value="<?php echo $area -> NombreArea; ?>" class="input" type="text" placeholder="Area" name="name">
  </div>
  <p class="help is-success">Aquí coloque el nombre del area.</p>
</div>

<div class="field">
  <label class="label">
Descripción del Area: </label>
  <div class="control">
    <input class="input" value="<?php echo $area -> DescAreas; ?>" type="text" placeholder="Area Descripción" name="description">
  </div>
  <p class="help is-success">Escriba una breve Descripción para todos.</p>
</div>

<div class="field is-grouped">
  <div class="control">
    <button value="editar" type="submit" class="button is-link">Actualizar</button>
  </div>
  <div class="control">
    <a href="index.php?controller=areas&action=home" class="button is-text">Cancel</a>
  </div>
</div>
</form>
</div>