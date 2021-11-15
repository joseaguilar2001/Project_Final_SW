<?php
    session_start();
    include_once("./Models/contacto.php");
    include_once("./Models/proveedores.php");
    include_once('./Lib/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    include_once("./db.php");
    DB::createInstant();
    class ControlContacto
    {
        public function Home()
        {
            $contactos = Contacto::consult();
            include_once("./Views/Contacto/home.php");
        }

        public function Create()
        {
            $idU = $_SESSION['Rol'];
            $prov = Proveedores::consult();
            if($_POST)
            {
                $pro = $_POST['proveedor'];
                $name = $_POST['nombre'];
                $lstna = $_POST['apellido'];
                $cel = $_POST['cel'];
                $mail = $_POST['email'];
                $stado = $_POST['estado'];
                if($pro == '0')
                {
                    $pro = null;
                }
                Contacto::create($pro, $name, $lstna, $cel, $mail, $stado);
                if($idU == '01')
                {
                    header("Location: ./index.php?controller=contacto&action=home");
                }
                else
                {
                    header("Location: ./index.php?controller=contacto&action=dashboard");
                }
                
            }
            include_once("./Views/Contacto/create.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $cont = Contacto::search($id);
            $prov = Proveedores::consult();
            if($_POST)
            {
                $pro = $_POST['proveedor'];
                $name = $_POST['nombre'];
                $lstna = $_POST['apellido'];
                $cel = $_POST['cel'];
                $mail = $_POST['email'];
                $stado = $_POST['estado'];
                if($pro == '0')
                {
                    $pro = null;
                }
                Contacto::edit($id, $pro, $name, $lstna, $cel, $mail, $stado);
                header("Location: ./index.php?controller=contacto&action=home");
            }
            include_once("./Views/Areas/edit.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Contacto::delete($id);
            header("Location: ./index.php?controller=contacto&action=home");
        }

        public function Dashboard()
        {
            $idU = $_SESSION['Rol'];
            $contactos = Contacto::consultNew();
            $prov = Proveedores::countprov();
            $cont = Contacto::countcontacto();
            if($_POST)
            {
                $emailU = $_POST['email'];
                $asunto = $_POST['asunto'];
                $mensaje = $_POST['mensaje'];
                mail($emailU, $asunto, $mensaje);
                header("Location: ./index.php?controller=proveedores&action=dashboard");
            }
            include_once("./Views/Contacto/dashboard.php");
        }

        public function Imprimir()
        {
            $contactos = Contacto::consultNew();
            $dompdf = new Dompdf();
            include_once("./Views/Contacto/imprimir.php");
        }

    }

?>