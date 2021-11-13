<?php 
session_start();
?>

<?php if($_SESSION["nameuser"]==null || $_SESSION["nameuser"]==""): 
    header("location: login.php");
    die();  
?>
<?php else: ?>
<!DOCTYPE html>
<html>  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema BIORAD
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" type="text/css" href="../assets/css/admin.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/Deradado_cards.css">

    <link rel="shortcut icon" href="logo_svg.svg">
  </head>
  <body>
  
      <nav class="navbar is-white is-fixed-top" role="navigation" aria-label="main navigation">
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
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Productos
            </a>
            <div class="navbar-dropdown">
          <?php if($_SESSION['Rol'] == '01'): ?>
              <a class="navbar-item" href="index.php?controller=productos&action=home">
                Registros
              </a>
              <a class="navbar-item" href="index.php?controller=productos&action=create">
                Crear
              </a>
              <a class="navbar-item" href="index.php?controller=productos&action=dashboard&idN=0">
                Productos
              </a>
          <?php elseif($_SESSION['Rol']=='02' OR $_SESSION['Rol']=='03' OR $_SESSION['Rol']=='04'): ?>
            <a class="navbar-item" href="index.php?controller=productos&action=dashboard&idN=0">
                Productos
              </a>
          <?php endif ?>
            </div>
          </div>
          <!-- Abastecimientos -->
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
              Abastecimientos
            </a>
            <div class="navbar-dropdown">
          <?php if($_SESSION['Rol'] == '01'): ?>
              <a class="navbar-item" href="index.php?controller=abastecimientos&action=home">
                Registros
              </a>
              <a class="navbar-item" href="index.php?controller=abastecimientos&action=create">
                Crear
              </a>
              <a class="navbar-item" href="index.php?controller=abastecimientos&action=dashboard">
                Abastecimientos
              </a>
          <?php elseif($_SESSION['Rol']=='02' OR $_SESSION['Rol']=='03'): ?>
            <a class="navbar-item" href="index.php?controller=abastecimientos&action=dashboard">
                Abastecimientos
              </a>
          <?php endif ?>
            </div>
            </div>
            <!-- Autorizaciones -->
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            <span><i class="fa-solid fa-abacus"></i></span><span>Autorizaciones</span>  
            </a>
            <div class="navbar-dropdown">
          <?php if($_SESSION['Rol'] == '01'): ?>
              <a class="navbar-item" href="index.php?controller=autorizaciones&action=home">
                Registros
              </a>
              <a class="navbar-item" href="index.php?controller=autorizaciones&action=create">
                Crear
              </a>
              <a class="navbar-item" href="index.php?controller=autorizaciones&action=dashboard">
                Autorizaciones
              </a>
          <?php elseif($_SESSION['Rol']=='02' OR $_SESSION['Rol']=='03' OR $_SESSION['Rol']=='04'): ?>
            <a class="navbar-item" href="index.php?controller=autorizaciones&action=dashboard">
                Autorizaciones
              </a>
          <?php endif ?>
            </div>
          </div>
          <!-- Solicitudes -->
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            Proveedores  
            </a>
            <div class="navbar-dropdown">
          <?php if($_SESSION['Rol'] == '01'): ?>
              <a class="navbar-item" href="index.php?controller=proveedores&action=home">
                Registros
              </a>
              <a class="navbar-item" href="index.php?controller=proveedores&action=create">
                Crear
              </a>
              <a class="navbar-item" href="index.php?controller=proveedores&action=dashboard">
                Proveedores
              </a>
              <a class="navbar-item" href="index.php?controller=contacto&action=home">
                Contactos
              </a>
              <a class="navbar-item" href="index.php?controller=contacto&action=dashboard">
                Lista de Contactos
              </a>
          <?php elseif($_SESSION['Rol']=='02' OR $_SESSION['Rol']=='03'): ?>
            <a class="navbar-item" href="index.php?controller=solicitudes&action=dashboard">
                Solicitudes
              </a>
              <a class="navbar-item" href="index.php?controller=contacto&action=dashboard">
                Contactos
              </a>
          <?php endif ?>
            </div>
          </div>
          <!-- Proveedores -->
          <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            Solicitudes  
            </a>
            <div class="navbar-dropdown">
          <?php if($_SESSION['Rol'] == '01'): ?>
              <a class="navbar-item" href="index.php?controller=solicitudes&action=home">
                Registros
              </a>
              <a class="navbar-item" href="index.php?controller=solicitudes&action=create">
                Crear
              </a>
              <a class="navbar-item" href="index.php?controller=solicitudes&action=dashboard">
                Solicitudes
              </a>
              <a class="navbar-item" href="index.php?controller=areas&action=home">
                Control de Áreas
              </a>
          <?php elseif($_SESSION['Rol']=='02' OR $_SESSION['Rol']=='03' OR $_SESSION['Rol']=='04'): ?>
            <a class="navbar-item" href="index.php?controller=solicitudes&action=dashboard">
                Solicitudes
              </a>
              <a class="navbar-item" href="index.php?controller=areas&action=dashboard">
                Áreas
              </a>
          <?php endif ?>
            </div>
          </div>
          <!-- Usuarios -->
          <?php if($_SESSION['Rol'] == '01'): ?>
            <div class="navbar-item has-dropdown is-hoverable">
            <a class="navbar-link">
            Usuarios  
            </a>
            <div class="navbar-dropdown">
              <a class="navbar-item" href="index.php?controller=usuario&action=home">
                Registros
              </a>
              <a class="navbar-item" href="index.php?controller=usuario&action=create">
                Crear
              </a>
              <a class="navbar-item" href="index.php?controller=rol&action=home">
                Control de Roles
              </a>
            </div>
          </div>
            <?php else: ?>
            <?php endif ?>
          </div>
          
        </div>

        <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary" href="index.php?controller=usuario&action=edit&id=<?php echo $_SESSION['id'];?>">
            <strong><?php echo $_SESSION['nameuser'];?></strong>
          </a>
          <a class="button is-danger" href="../closesesion.php">
           <span class="icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></span><span>Cerrar Sesion</span>
          </a>
        </div>
      </div>
    </div>
      </nav>
      <main>
      <?php include_once("./router.php"); ?>
      </main>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>BIORAD</strong> seguridad y certeza es lo que nosotros proveemos.
      </p>
    </div>
  </footer>
  </body>
</html>
<?php endif?>