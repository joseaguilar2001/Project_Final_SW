<?php
    session_start();
    include_once("./Models/abastecimientos.php");
    include_once("./Models/productos.php");
    include_once("./Models/proveedores.php");
    include_once("./Models/contacto.php");
    include_once("./Models/usuario.php");
    include_once('./Lib/dompdf/autoload.inc.php');
    use Dompdf\Dompdf;
    include_once("./db.php");
    DB::createInstant();
    class ControlAbastecimientos
    {
        public function Home()
        {
            $idU = $_SESSION['Rol'];
            if($idU == '01')
            {
                $abas = Abastecimientos::consult();
                include_once("./Views/Abastecimientos/home.php");
            }
            else 
            {
                include_once("./Views/Abastecimientos/error.php");
            }
        }
        
        // This is a function for create an register.
        public function Create()
        {
            $idU = $_SESSION['Rol'];
            $proveedores = Proveedores::consult();
            $productos = Productos::consult();
            if($_POST)
            {
                $idPv = $_POST['idPrv'];
                $idPr = $_POST['idPrd'];
                $cant = $_POST['cnt'];
                $date = $_POST['fecha'];
                $stt = $_POST['estado'];
                if($idU != '01')
                {
                    $stt = '1';
                }
                if($idPr == '0' || $idPr == 0)
                {
                    $idPr = null;
                }
                if($idPv == '0' || $idPv == 0)
                {
                    $idPv = null;
                }
                $cant2 = Productos::cantiprod($idPr);
                $cant3 = $cant2 + $cant;
                Productos::updatecant($idPr, $cant3);
                Abastecimientos::create($idPv,$idPr,$cant,$date,$stt);
                header("Location: ./index.php?controller=abastecimientos&action=home");
            }
            include_once("./Views/Abastecimientos/create.php");

        }

        public function Edit()
        {
            $idU = $_SESSION['Rol'];
            if($idU == '01')
            {
                $id = $_GET['id'];
                $abas = Abastecimientos::search($id);
                $proveedores = Proveedores::consult();
                $productos = Productos::consult();
                if($_POST)
                {
                    
                    $idPv = $_POST['idPrv'];
                    $idPr = $_POST['idPrd'];
                    $cant = $_POST['cnt'];
                    $date = $_POST['fecha'];
                    $stt = $_POST['estado'];
                    if($idPr == '0' || $idPr == 0)
                    {
                        $idPr = null;
                    }
                    if($idPv == '0' || $idPv == 0)
                    {
                        $idPv = null;
                    }
                    Abastecimientos::edit($id, $idPv, $idPr, $cant, $date, $stt);
                    header("Location: ./index.php?controller=abastecimientos&action=home");
                }
                include_once("./Views/Abastecimientos/edit.php");
            }
            else
            {
                include_once("./Views/Abastecimientos/error.php");
            }
            
        }

        public function Delete()
        {
            $idU = $_SESSION['Rol'];
            if($idU == '01')
            {
                $id = $_GET['id'];
                Abastecimientos::delete($id);
                header("Location: ./index.php?controller=abastecimientos&action=home");
            }
            else 
            {
                include_once("./Views/Abastecimientos/error.php");
            }
        }

        public function Dashboard()
        {
            $idU = $_SESSION['Rol'];
            $abas = Abastecimientos::consultNew();
            $abasC = Abastecimientos::countabas();
            $prodC = Productos::countprod();
            $product = Productos::consult();
            $provs = Proveedores::countprov();
            $contacto = Contacto::countcontacto();
            $proveedores = Proveedores::consult();
            include_once("./Views/Abastecimientos/dashboard.php");
        }

        public function Imprimir()
        {
            $dompdf = new Dompdf();
            $abas = Abastecimientos::consult();
            include_once('./Views/Abastecimientos/imprimir.php');
            header("Location: ./index.php?controller=abastecimientos&action=home");
        }
    }
?>