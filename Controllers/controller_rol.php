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
                $rol = '';
                $vRol = '';
                $name = $_POST['rol'];
                $dscrip = $_POST['dscrip'];
                $stado = $_POST['estado'];
                $idn = strlen($name);
                
                if($idn >= 2)
                {
                    for($i = 0; $i < $idn; $i++)
                    {
                        $rol .= $name[$i];
                    }
                    
                }
                $vRol = $rol . "-". rand(0, 10);
                Rol::create($vRol, $name, $dscrip, $stado);
                header("Location: ./index.php?controller=proveedores&action=home");
            }
            include_once("./Views/Rol/create.php");
        }
        public function Edit()
        {
            $id = $_GET['id'];
            $rol = Rol::search($id);

            if($_POST)
            {
                $rol = '';
                $vRol = '';
                $name = $_POST['rol'];
                $dscrip = $_POST['dscrip'];
                $stado = $_POST['estado'];
                $idn = strlen($name);
                
                if($idn >= 2)
                {
                    for($i = 0; $i < $idn; $i++)
                    {
                        $rol .= $name[$i];
                    }
                    
                }
            }
                $vRol = $rol . "-". rand(0, 10);
                Rol::create($vRol, $name, $dscrip, $stado);
            include_once("./Views/Rol/edit.php");
        }
        public function Delete()
        {
            $id = $_GET['id'];
            Rol::delete($id);
            header("Location: ./index.php?controller=proveedores&action=home");
        }
    } 
?>