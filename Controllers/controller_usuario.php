<?php
    include_once("./Models/usuario.php");
    include_once("./Models/rol.php");
    DB::createInstant();
    class ControlUsuario
    {
        public function Home()
        {
            $user = Usuario::consult();
            include_once("./Views/Usuario/home.php");
        }

        public function Create()
        {
            $rol = Rol::consult();
            if($_POST)
            {
                $id = Usuario::IdUser(10);
                $name = $_POST['nombre'];
                $last = $_POST['apellido'];
                $usern = $_POST['username'];
                $pass = $_POST['password'];
                $mail = $_POST['mail'];
                $cel = $_POST['cel'];
                $rol = $_POST['rol'];

                if($rol == '0')
                {
                    $rol == 'null';
                }
                $userName = Usuario::existId($id);
                while($userName == false)
                {
                    $userName = Usuario::existId($id);
                    if($userName == true)
                    {
                        $id = Usuario::IdUser(10);
                    }
                    else if($userName == false)
                    {
                        break;
                    }
                }
                Usuario::create($id, $name, $last, $usern, $pass, $mail, $cel, $rol, 1);
                header("Location: ./index.php?controller=usuario&action=home");
            }
            include_once("./Views/Usuario/home.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $user = Usuario::search($id);
            $rol = Rol::consult();
            if($_POST)
            {
                
                $name = $_POST['nombre'];
                $last = $_POST['apellido'];
                $usern = $_POST['username'];
                $pass = $_POST['password'];
                $mail = $_POST['mail'];
                $cel = $_POST['cel'];
                $rol = $_POST['rol'];

                if($rol == '0')
                {
                    $rol == 'null';
                }
                Usuario::edit($id, $name, $last, $usern, $pass, $mail, $cel, $rol, 1);
                header("Location: ./index.php?controller=usuario&action=home");
            }
            include_once("./Views/Usuario/home.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Usuario::delete($id);
            header("Location: ./index.php?controller=usuario&action=home");
        }
    }
?>