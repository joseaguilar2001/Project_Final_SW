<?php 
session_start();
error_reporting(0);
?>

<?php if($_SESSION["nameuser"]==null || $_SESSION["nameuser"]==""): 
    header("location: login.php");
    die();  
?>
<?php else :?> 
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
    <link rel="stylesheet" href="../assets/css/Deradado_cards.css">
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
            
            <?php  if($_SESSION['Rol'] == "01"):?>
                <a class="navbar-item" href="index.php?controller=usuario&action=home">
                  Usuarios
                </a>

                <a class="navbar-item" href="index.php?controller=rol&action=home">
                  Roles de usuario
                </a>
            <?php endif ?> 

            <?php if($_SESSION['Rol'] ==  "02" or $_SESSION['Rol']  ==  "01"):?>
                <a class="navbar-item" href="index.php?controller=autorizaciones&action=home">
                  Autorizaciones
                </a>

                <a class="navbar-item" href="index.php?controller=areas&action=home">
                  Areas
                </a>
            <?php endif ?>

            <?php if($_SESSION['Rol'] != "01" or $_SESSION['Rol'] != "02"):?>
                <a class="navbar-item" href="index.php?controller=productos&action=home">
                  Productos
                </a>
            <?php endif ?>
          
            <?php if($_SESSION['Rol'] == "03"):?>
                <a class="navbar-item" href="index.php?controller=abastecimientos&action=dashboard">
                  Abastecimientos
                </a>
                <a class="navbar-item" href="index.php?controller=Solicitudes&action=home">
                  Solicitudes
                </a>
            <?php endif ?>

            <?php if($_SESSION['Rol'] ==  "04"):?>
                <a class="navbar-item" href="index.php?controller=Proveedores&action=home">
                  Proveedores
                </a>
                <a class="navbar-item" href="index.php?controller=contacto&action=home">
                  Contactos
                </a>
            <?php endif?>

            <?php if($_SESSION['Rol'] != "03" AND $_SESSION['Rol'] != "04"): ?>
                  <a class="navbar-item" href="index.php?controller=abastecimientos&action=home">
                    Abastecimientos
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
            <?php endif ?>
           
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
      <div class="container">
    
      <?php include_once("./router.php"); ?>
  </div>
  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>BIORAD</strong> es para todos una solución, es calidad y es seguridad.
      </p>
    </div>
  </footer>
  </body>
</html>
<?php endif?>