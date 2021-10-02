<?php
    include_once("./Models/solicitudes.php");
    include_once("./Models/area.php");
    include_once("./Models/producto.php");
    include_once("./Models/usuario.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlSolicitudes
    {
        public function Home()
        {
            $solicitudes = Solicitudes::consult();
            include_once("./Views/Solicitudes/home.php");
        }
        public function Create()
        {
            $prod = Productos::consult();
            $area = Areas::consult();
            $user = Usuario::consult();
            if($_POST)
            {
                $area = $_POST['idarea'];
                $prod = $_POST['idprod'];
                $user = $_POST['user'];
                $fecha = $_POST['fecha'];
                $cant = $_POST['cant'];
                $stado = $_POST['estado'];
                if($area == '0')
                {
                    $area = 'null';
                }
                if($prod == '0')
                {
                    $prod = 'null;';
                }
                if($user == '0')
                {
                    $user = 'null';
                }
                Solicitudes::create($area, $prod, $user, $fecha, $cant, $stado);
                header("Location: ./index.php?controller=solicitudes&action=home");
            } 
            include_once("./Views/Solicitudes/create.php");
        }
        public function Edit()
        {
            $id = $_GET['id'];
            $soli = Solicitudes::search($id);
            $prod = Productos::consult();
            $area = Areas::consult();
            $user = Usuario::consult();
            if($_POST)
            {
                $area = $_POST['idarea'];
                $prod = $_POST['idprod'];
                $user = $_POST['user'];
                $fecha = $_POST['fecha'];
                $cant = $_POST['cant'];
                $stado = $_POST['estado'];
                if($area == '0')
                {
                    $area = 'null';
                }
                if($prod == '0')
                {
                    $prod = 'null;';
                }
                if($user == '0')
                {
                    $user = 'null';
                }
                Solicitudes::edit($id,$area, $prod, $user, $fecha, $cant, $stado);
                header("Location: ./index.php?controller=solicitudes&action=home");
            } 
            include_once("./Views/Solicitudes/edit.php");
        }
        public function Delete()
        {
            $id = $_GET['id'];
            Solicitudes::delete($id);
            header("Location: ./index.php?controller=solicitudes&action=home");
        }
    }
?>