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
            include_once("./Views/Autorizaciones/home.php");
        }

        public function Create()
        {
            $solicitud = Solicitudes::consult();
            $usuarios = Usuario::consult();
            if($_POST)
            {
                $soli = $_POST['idsolicitud'];
                $user = $_POST['iduser'];
                $fecha = $_POST['fecha'];
                $codi = $_POST['codigoAuth'];
                $stt = $_POST['estado'];
                if($soli == '0')
                {
                    $soli = null;
                }
                if($user == '0')
                {
                    $user = null;
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
                Autorizaciones::edit($id, $soli, $user, $fecha, $codi, $stt);
                header("Location: ./index.php?controller=autorizaciones&action=home");
            }
            include_once("./Views/Autorizaciones/edit.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Autorizaciones::delete($id);
            header("Location: ./index.php?controller=autorizaciones&action=home");
        }

        public function Dashboard()
        {
            $soli = Solicitudes::countsoli();
            $user = Usuario::countuser();
            $aut = Autorizaciones::countautor();
            $autoriza = Autorizaciones::consultNew();
            include_once("./Views/Autorizaciones/dashboard.php");
        }
    }

?>