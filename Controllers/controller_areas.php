<?php
    include_once("./Models/areas.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlAreas
    {
        public function Home()
        {
            $areas = Areas::consult();
            include_once("./Views/Areas/home.php");
        }

        public function Create()
        {
            if($_POST)
            {
                $name = $_POST['name'];
                $descrip = $_POST['description'];
                Areas::create($name, $descrip);
                header("Location: ./index.php?controller=areas&action=home");
            }
            include_once("./Views/Areas/create.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $area = Areas::search($id);
            if($_POST)
            {
                $name = $_POST['name'];
                $descrip = $_POST['description'];
                Areas::edit($id, $name, $descrip);
                header("Location: ./index.php?controller=areas&action=home");
            }
            include_once("./Views/Areas/edit.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Areas::delete($id);
            header("Location: ./index.php?controller=areas&action=home");
        }
    }
?>