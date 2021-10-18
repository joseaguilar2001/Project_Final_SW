<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BIORAD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">
    <!-- Bulma Version 0.9.0-->
    <link rel="stylesheet" href="https://unpkg.com/bulma@0.9.0/css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="shortcut icon" href="logo_svg.svg">
</head>

<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                    <h3 class="title has-text-white">Inicio de sesión</h3>
                    <hr class="login-hr">
                    <p class="subtitle has-text-white">Ingrese su Usuario y Contraseña para continuar</p>
                    <div class="box">
                        <figure class="avatar">
                            <img src="logo_svg.svg" width="80%">
                        </figure>
                        <form action="validate.php" method="post">
                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" name="nameuser" type="text" placeholder="Nombre de Usuario" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input class="input is-large" name="password" type="password" placeholder="Contraseña">
                                </div>
                            </div>
                            <button class="button is-block is-info is-large is-fullwidth">Iniciar Sesion </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script async type="text/javascript" src="../js/bulma.js"></script>
</body>

</html>