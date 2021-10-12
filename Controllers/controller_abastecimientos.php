<?php
    include_once("./Models/abastecimientos.php");
    include_once("./Models/productos.php");
    include_once("./Models/proveedores.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlAbastecimientos
    {
        public function Home()
        {
            $abas = Abastecimientos::consult();
            include_once("./Views/Abastecimientos/home.php");
        }
        
        // This is a function for create an register.
        public function Create()
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

        public function Edit()
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

        public function Delete()
        {
            print_r($_GET);
            $id = $_GET['id'];
            Abastecimientos::delete($id);
            header("Location: ./index.php?controller=abastecimientos&action=home");
        }
    }
?>