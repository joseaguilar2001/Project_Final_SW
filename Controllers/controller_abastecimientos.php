<?php
    include_once("./Models/abastecimientos.php");
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
            if($_POST)
            {
                // print_r($_POST);
                $idPv = $_POST['idPrv'];
                $idPr = $_POST['idPrd'];
                $cant = $_POST['cnt'];
                $date = $_POST['fecha'];
                $stt = $_POST['estado'];
                Abastecimientos::create(null,null,$cant,$date,$stt);
                header("Location: ./index.php?controller=abastecimientos&action=home");
            }
            include_once("./Views/Abastecimientos/create.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $abas = Abastecimientos::search($id);

            if($_POST)
            {
                
                $idPv = $_POST['idPrv'];
                $idPr = $_POST['idPrd'];
                $cant = $_POST['cnt'];
                $date = $_POST['fecha'];
                $stt = $_POST['estado'];
                Abastecimientos::edit($id, null, null, $cant, $date, $stt);
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