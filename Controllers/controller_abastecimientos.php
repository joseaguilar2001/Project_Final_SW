<?php
    session_start();
    include_once("./Models/abastecimientos.php");
    include_once("./Models/productos.php");
    include_once("./Models/proveedores.php");
    include_once("./Models/contacto.php");
    include_once("./Models/usuario.php");
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
            if($idU == '01')
            {
                $proveedores = Proveedores::consult();
                $productos = Productos::consult();
                if($_POST)
                {
                    // print_r($_POST);
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
                    Abastecimientos::create($idPv,$idPr,$cant,$date,$stt);
                    header("Location: ./index.php?controller=abastecimientos&action=home");
                }
                include_once("./Views/Abastecimientos/create.php");
            }
            else 
            {
                include_once("./Views/Abastecimientos/error.php");
            }
            
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
            $abas = Abastecimientos::consultNew();
            $abasC = Abastecimientos::countabas();
            $prodC = Productos::countprod();
            $product = Productos::consult();
            $provs = Proveedores::countprov();
            $contacto = Contacto::countcontacto();
            $proveedores = Proveedores::consult();
            include_once("./Views/Abastecimientos/dashboard.php");
        }

        public function CreateNew()
        {
            $proveedores = Proveedores::consult();
            $productos = Productos::consult();
            if($_POST)
            {
                // print_r($_POST);
                $idPv = $_POST['idPrv'];
                $idPr = $_POST['idPrd'];
                $cant = $_POST['cnt'];
                $date = $_POST['fecha'];
                if($idPr == '0' || $idPr == 0)
                {
                    $idPr = null;
                }
                else
                {
                    $cantidad = Productos::cantiprod($idPr);
                    $n = (int)($cantidad + $cant);
                    Productos::updatecant($idPr, $n); 
                }
                if($idPv == '0' || $idPv == 0)
                {
                    $idPv = null;
                }
                Abastecimientos::create($idPv,$idPr,$cant,$date,1);
                header("Location: ./index.php?controller=abastecimientos&action=dashboard");
            }
            include_once("./Views/Abastecimientos/create2.php");
        }

        public function Imprimir()
        {
            
        }
    }
?>