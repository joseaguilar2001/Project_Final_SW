<?php
    session_start();
    include_once("./Models/proveedores.php");
    include_once("./db.php");
    include_once('./Lib/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    DB::createInstant();
    class ControlProveedores
    {
        public function Home()
        {
            $prov = Proveedores::consult();
            include_once("./Views/Proveedores/home.php");
        }
        public function Create()
        {
            $idU = $_SESSION['Rol'];
            if($_POST)
            {
                $name = $_POST['nombre'];
                $direccion = $_POST['direction'];
                $email = $_POST['email'];
                $estado = $_POST['estado'];
                Proveedores::create($name, $direccion, $email, $estado);
                if($idU == '01')
                {
                    header("Location: ./index.php?controller=proveedores&action=home");
                }
                else 
                {
                    header("Location: ./index.php?controller=proveedores&action=dashboard");
                }
            }
            include_once("./Views/Proveedores/create.php");
        }
        public function Edit()
        {
            $id = $_GET['id'];
            $prov = Proveedores::search($id);
            if($_POST)
            {
                $name = $_POST['nombre'];
                $direccion = $_POST['direction'];
                $email = $_POST['email'];
                $estado = $_POST['estado'];
                Proveedores::edit($id, $name, $direccion, $email, $estado);
                header("Location: ./index.php?controller=proveedores&action=home");
            }
            include_once("./Views/Proveedores/edit.php");
        }
        public function Delete()
        {
            $id = $_GET['id'];
            Proveedores::delete($id);
            header("Location: ./index.php?controller=proveedores&action=home");
        }
        public function Dashboard()
        {
            $idU = $_SESSION['Rol'];
            $countpro = Proveedores::countprov();
            $provs = Proveedores::consult();
            if($_POST)
            {
                
                $emailU = $_POST['email'];
                $asunto = $_POST['asunto'];
                $mensaje = $_POST['mensaje'];
                mail($emailU, $asunto, $mensaje);
                header("Location: ./index.php?controller=proveedores&action=dashboard");
            }
            include_once("./Views/Proveedores/dashboard.php");
        }

        public function Imprimir()
        {
            $dompdf = new Dompdf();
            $provs = Proveedores::consult();
            include_once("./Views/Proveedores/imprimir.php");
        }
    }
?>