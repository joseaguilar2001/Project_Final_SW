<?php
    include_once("./Models/proveedores.php");
    include_once("./db.php");
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
            if($_POST)
            {
                $name = $_POST['nombre'];
                $direccion = $_POST['direction'];
                $email = $_POST['email'];
                $estado = $_POST['estado'];
                Proveedores::create($name, $direccion, $email, $estado);
                header("Location: ./index.php?controller=proveedores&action=home");
            }
            include_once("./Views/Proveedores/home.php");
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
            include_once("./Views/Proveedores/home.php");
        }
        public function Delete()
        {
            $id = $_GET['id'];
            Proveedores::delete($id);
            header("Location: ./index.php?controller=proveedores&action=home");
        }
    }
?>