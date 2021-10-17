<?php
    include_once("./Models/rol.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlRol
    {
        public function Home()
        {
            $roles = Rol::consult();
            include_once("./Views/Rol/home.php");
        }
        public function Create()
        {
            if($_POST)
            {
                $id = $_POST['id'];
                $name = $_POST['rol'];
                $dscrip = $_POST['dscrip'];
                $stado = $_POST['estado'];
                
                Rol::create($id, $name, $dscrip, $stado);
                header("Location: ./index.php?controller=rol&action=home");
            }
            include_once("./Views/Rol/create.php");
        }
        public function Edit()
        {
            $id = $_GET['id'];
            $rol = Rol::search($id);

            if($_POST)
            {
                $name = $_POST['rol'];
                $dscrip = $_POST['dscrip'];
                $stado = $_POST['estado'];
                Rol::edit($name, $dscrip, $stado, $id);
                header("Location: ./index.php?controller=rol&action=home");
            }
                
            include_once("./Views/Rol/edit.php");
        }
        public function Delete()
        {
            $id = $_GET['id'];
            Rol::delete($id);
            header("Location: ./index.php?controller=rol&action=home");
        }

        public function Dashboard()
        {
            $roles = Rol::consult();
            $rol = Rol::countrol();
            include_once("./Views/Rol/dashboard.php");
        }
    } 
?>