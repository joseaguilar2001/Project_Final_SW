<?php
    include_once("./Models/productos.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlProducto
    {
        public function Home()
        {
            $producto = Productos::consult();
            include_once("./Views/Productos/home.php");
        }

        public function Create()
        {
            if($_POST)
            {
                $name = $_POST['nombre'];
                $precio = $_POST['precio'];
                $exist = $_POST['exist'];
                $medida = $_POST['medida'];
                $limit = $_POST['limite'];
                $fecha = $_POST['fecha'];
                $esta = $_POST['estado'];

                Productos::create($name, $precio, $exist, $medida, $limit, $fecha, $esta);
                header("Location: ./index.php?controller=producto&action=home");
            }
            include_once("./Views/Productos/create.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $product = Productos::search($id);
            if($_POST)
            {
                $name = $_POST['nombre'];
                $precio = $_POST['precio'];
                $exist = $_POST['exist'];
                $medida = $_POST['medida'];
                $limit = $_POST['limite'];
                $fecha = $_POST['fecha'];
                $esta = $_POST['estado'];
                Productos::edit($id, $name, $precio, $exist, $medida, $limit, $fecha, $esta);
                header("Location: ./index.php?controller=producto&action=home");
            }
            include_once("./Views/Productos/edit.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Productos::delete($id);
            header("Location: ./index.php?controller=producto&action=home");
        }
    }

?>