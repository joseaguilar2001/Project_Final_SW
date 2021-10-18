<section class="hero is-info is-halfheight">
  <div class="hero-body">
    <div class = "">
    <p class="title">
      Bienvenido al sistema de BIORAID
    </p>
    <p class="subtitle">
       Todo está listo
    </p>
    </div>
  </div>
</section>

<section class="info-tiles">
  <?php if($_SESSION['Rol'] == "04" ): ?>
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Proveedores</p>
                <a class="button is-focused" href="index?controller=proveedores&action=dashboard">Administrar</a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Contactos</p>
                <a class="button is-focused" href="index?controller=contacto&action=dashboard" >Administrar</a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Productos</p>
                <a class="button is-focused" href="index?controller=productos&action=view">Administrar</a>
            </article>
        </div>
    </div>
  <?php endif ?> 
  <?php if($_SESSION['Rol'] == "03" ): ?>
    <div class="tile is-ancestor has-text-centered">
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Productos</p>
                <a class="button is-focused" href="index?controller=productos&action=view">Administrar</a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Abastecimientos</p>
                <a class="button is-focused" href="index?controller=abastecimientos&action=dashboard" >Administrar</a>
            </article>
        </div>
        <div class="tile is-parent">
            <article class="tile is-child box">
                <p class="title">Solicitudes</p>
                <a class="button is-focused" href="index?controller=solicitudes&action=vista">Administrar</a>
            </article>
        </div>
    </div>
  <?php endif ?>   
</section>