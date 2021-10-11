<!DOCTYPE html>
<html>  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="../node_modules/datatables-bulma/css/dataTables.bulma.css">
    <link  rel="stylesheet" href="../node_modules/datatables-bulma/css/dataTables.bulma.min.css">
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
          <a class="navbar-item" href="https://bulma.io">
            <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">
          </a>
      
          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item" href="index.php?controller=pages&action=home">
              Inicio
            </a>
      
            <a class="navbar-item">
              Documentación
            </a>
      
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Páginas
              </a>
      
              <div class="navbar-dropdown">
                <a class="navbar-item">
                  About
                </a>
                <a class="navbar-item">
                  Jobs
                </a>
                <a class="navbar-item">
                  Contact
                </a>
                <hr class="navbar-divider">
                <a class="navbar-item">
                  Report an issue
                </a>
              </div>
            </div>
          </div>
      
          <div class="navbar-end">
            <div class="navbar-item">
              <div class="buttons">
                <a class="button is-primary">
                  <strong>Registrarse</strong>
                </a>
                <a class="button is-light">
                  Inicio Sesión
                </a>
              </div>
            </div>
          </div>
        </div>
      </nav>
  <section class="section" style="margin-top: 10px;">
    <div class="container">
      <?php include_once("./router.php"); ?>
    </div>
  </section>
  <script type="text/javascript" src="../node_modules/datatables-bulma/js/dataTables.bulma.min.js"></script>
  <script type="text/javascript" src="../node_modules/datatables-bulma/js/dataTables.bulma.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(selector).DataTable();
  </script>

  </body>
</html>