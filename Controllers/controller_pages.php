<?php
    include_once("./Models/usuario.php");
    include_once("./db.php");
    session_start();
    class ControlPages
    {
        public function Home()
        {
            $idU = $_SESSION['Rol'];
            $id = $_SESSION['id'];
            $datos = Usuario::search($id);
            $rol = '';
            if($idU == '01')
            {
                $rol = 'Administrador';
            }
            else if($idU == '02')
            {
                $rol = 'Gerente';
            }
            else if($idU == '03')
            {
                $rol = 'Administrador de Bodega';
            }
            else if($idU == '04')
            {
                $rol = 'Trabajador';
            }
            include_once("./Views/Pages/home.php");
        }
        public function Error()
        {
            include_once("./Views/Pages/error.php");
        }
    }

?>