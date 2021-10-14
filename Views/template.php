<?php session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html>  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema BIORAD
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <style type="text/css">
      body{
      padding: 0;
      margin: 0;
      }
      .hero{
      height: 100vh;
      position: relative;
      }
      .notification{
      padding-top: 20px;
      padding-bottom: 30px;
      }
      .button{
      margin-top: 10px;
      }
    </style>
  </head>
  <body>
      <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          
          <a class="navbar-item" href="../index.php">
            <img src="../logo_svg.svg" width="112" height="50">
          </a>
          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="index.php">
              Inicio
            </a>
            
            <?php  if($_SESSION['Rol'] == "01" or $_SESSION['Rol' == "02"]):?>
                <a class="navbar-item" href="index.php?controller=usuarios&action=home">
                  Usuarios
                </a>
            <?php else: ?>
            <?php endif ?>  

            <a class="navbar-item" href="index.php?controller=abastecimientos&action=home">
                  Abastecimientos
            </a>
            <a class="navbar-item" href="index.php?controller=autorizaciones&action=home">
              Autorizaciones
            </a>
            <a class="navbar-item" href="index.php?controller=productos&action=home">
              Productos
            </a>
            <a class="navbar-item" href="index.php?controller=Solicitudes&action=home">
              Solicitudes
            </a>
            <a class="navbar-item" href="index.php?controller=Proveedores&action=home">
              Proveedores
            </a>
            <a class="navbar-item" href="index.php?controller=contacto&action=home">
              Contactos
            </a>
            <a class="navbar-item" href="index.php?controller=areas&action=home">
              Areas
            </a>
            <a class="navbar-item" href="index.php?controller=rol&action=home">
              Roles de usuario
            </a>
          </div>
        </div>

        <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="index.php?controller=usuario&action=edit&id=<?php echo $_SESSION['id'];?>">
            <strong><?php echo $_SESSION['nameuser'];?></strong>
          </a>
          <a class="button is-light" href="../closesesion.php">
            Cerrar Sesion
          </a>
        </div>
      </div>
    </div>
      </nav>
  <section class="section" style="margin-top: 10px;">
    <div class="container">
      <?php include_once("./router.php"); ?>
    </div>
  </section>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>BIORAD</strong> es para todos una solución, es calidad y es seguridad.
      </p>
    </div>
  </footer>
  </body>
</html>