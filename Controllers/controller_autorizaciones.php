<?php 
    include_once("./Models/autorizaciones.php");
    include_once("./Models/solicitudes.php");
    include_once("./Models/usuario.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlAutorizaciones
    {
        public function Home()
        {
            $auth = Autorizaciones::consult();
            include_once("./Views/Areas/home.php");
        }

        public function Create()
        {
            $solicitud = Solicitudes::consult();
            $users = Usuario::consult();
            if($_POST)
            {
                $soli = $_POST['idsolicitud'];
                $user = $_POST['iduser'];
                $fecha = $_POST['fecha'];
                $codi = $_POST['codigoAuth'];
                $stt = $_POST['estado'];
                if($soli == '0')
                {
                    $soli = 'null';
                }
                else if($user == '0')
                {
                    $user = 'null';
                }
                Autorizaciones::create($soli, $user, $fecha, $codi, $stt);
                header("Location: ./index.php?controller=autorizaciones&action=home");
            }
            include_once("./Views/Autorizaciones/create.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $auth = Autorizaciones::search($id);
            if($_POST)
            {
                $soli = $_POST['idsolicitud'];
                $user = $_POST['iduser'];
                $fecha = $_POST['fecha'];
                $codi = $_POST['codigoAuth'];
                $stt = $_POST['estado'];
                if($soli == '0')
                {
                    $soli = 'null';
                }
                else if($user == '0')
                {
                    $user = 'null';
                }
                Autorizaciones::edit($id, $soli, $user, $fecha, $codi, $stt);
                header("Location: ./index.php?controller=autorizaciones&action=home");
            }
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Autorizaciones::delete($id);
            header("Location: ./index.php?controller=autorizaciones&action=home");
        }
    }

?>