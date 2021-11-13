<?php
    session_start();
    include_once("./Models/productos.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlProductos
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
                header("Location: ./index.php?controller=productos&action=home");
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
                header("Location: ./index.php?controller=productos&action=home");
            }
            include_once("./Views/Productos/edit.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Productos::delete($id);
            header("Location: ./index.php?controller=productos&action=home");
        }

        public function Dashboard()
        {
            $idU = $_SESSION['Rol'];
            $id = $_GET['idN'];
            $producto = '';
            if($id == '0')
            {
                $producto = Productos::consult();
            }
            if($id == '1')
            {
                $c = Productos::numProductosAgotados();
                if($c == 0 || $c == '0')
                {
                    $producto = null;
                }
                else 
                {
                    $producto = Productos::productosagotados();
                }
            }
            if($id == '2')
            {
                $producto = Productos::productosNormales();
            }
            if($id == '3')
            {
                $producto = Productos::productosporagotarse();
                
            }
            include_once("./Views/Productos/dashboard.php");
        }        
    }

?>