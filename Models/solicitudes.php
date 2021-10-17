<?php

    class Solicitudes
    {
        public $id;
        public $area;
        public $producto;
        public $usuario;
        public $fecha;
        public $cantidad;
        public $estado;

        public function __construct(
            $id,
            $area,
            $product,
            $user,
            $fecha,
            $cant,
            $estado
        )
        {
            $this -> IdSolicitud = $id;
            $this -> Area = $area;
            $this ->  Producto = $product;
            $this -> Usuario = $user;
            $this -> Fecha = $fecha;
            $this -> Cantidad = $cant;
            $this -> Estado = $estado;
        }

        public static function consult()
        {
            $listStudes = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM solicitudes");
            foreach($sql -> fetchAll() as $sol)
            {
                $listStudes []= new Solicitudes(
                    $sol['IdSolicitud'],
                    $sol['IdArea'],
                    $sol['IdProducto'],
                    $sol['idUsuario'],
                    $sol['Fecha'],
                    $sol['Cantidad'],
                    $sol['Estado']
                );
            }
            return $listStudes;
        }

        public static function create($area, $product, $user, $date, $cant, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("INSERT INTO solicitudes(IdArea, IdProducto, idUsuario, Fecha, Cantidad, Estado) VALUES (?, ?, ?, ?, ?, ?)");
            $sql -> execute(array($area, $product, $user, $date, $cant, $estado));
        }

        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("UPDATE solicitudes SET Estado = 4 WHERE IdSolicitud = ?");
            $sql -> execute(array($id));
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("SELECT * FROM solicitudes WHERE IdSolicitud = ?");
            $sql -> execute(array($id));
            $solicitud = $sql -> fetch();
            return new Solicitudes(
                $solicitud['IdSolicitud'],
                $solicitud['IdArea'],
                $solicitud['IdProducto'],
                $solicitud['idUsuario'],
                $solicitud['Fecha'],
                $solicitud['Cantidad'],
                $solicitud['Estado']
            );
        }

        public static function edit($id, $area, $product, $user, $date, $cant, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("UPDATE solicitudes SET IdArea = ?, IdProducto = ?, idUsuario = ?, Fecha = ?, Cantidad = ?, Estado = ? WHERE IdSolicitud = ?");
            $sql -> execute(array($area, $product, $user, $date, $cant, $estado, $id));
        }


        public static function solisitudesaceptadas()
        {
            $listStudes = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT areas.NombreArea, productos.ProdName, usuario.NombreUsuario, solicitudes.Fecha, solicitudes.Cantidad FROM solicitudes INNER JOIN areas ON solicitudes.IdArea = areas.IdAreas INNER JOIN productos ON solicitudes.IdProducto = productos.IdProducto INNER JOIN usuario ON solicitudes.idUsuario = usuario.idUsuario WHERE solicitudes.Estado = 1");
            foreach($sql -> fetchAll() as $sol)
            {
                $listStudes []= new Solicitudes(
                    $sol['IdSolicitud'],
                    $sol['NombreArea'],
                    $sol['ProdName'],
                    $sol['NombreUsuario'],
                    $sol['Fecha'],
                    $sol['Cantidad'],
                    $sol['Estado']
                );
            }
            return $listStudes;
        }


        public static function solisitudesespera()
        {
            $listStudes = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT areas.NombreArea, productos.ProdName, usuario.NombreUsuario, solicitudes.Fecha, solicitudes.Cantidad FROM solicitudes INNER JOIN areas ON solicitudes.IdArea = areas.IdAreas INNER JOIN productos ON solicitudes.IdProducto = productos.IdProducto INNER JOIN usuario ON solicitudes.idUsuario = usuario.idUsuario WHERE solicitudes.Estado = 2");
            foreach($sql -> fetchAll() as $sol)
            {
                $listStudes []= new Solicitudes(
                    $sol['IdSolicitud'],
                    $sol['NombreArea'],
                    $sol['ProdName'],
                    $sol['NombreUsuario'],
                    $sol['Fecha'],
                    $sol['Cantidad'],
                    $sol['Estado']
                );
            }
            return $listStudes;
        }

        public static function solisitudesrechazadas()
        {
            $listStudes = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT areas.NombreArea, productos.ProdName, usuario.NombreUsuario, solicitudes.Fecha, solicitudes.Cantidad FROM solicitudes INNER JOIN areas ON solicitudes.IdArea = areas.IdAreas INNER JOIN productos ON solicitudes.IdProducto = productos.IdProducto INNER JOIN usuario ON solicitudes.idUsuario = usuario.idUsuario WHERE solicitudes.Estado = 3");
            foreach($sql -> fetchAll() as $sol)
            {
                $listStudes []= new Solicitudes(
                    $sol['IdSolicitud'],
                    $sol['NombreArea'],
                    $sol['ProdName'],
                    $sol['NombreUsuario'],
                    $sol['Fecha'],
                    $sol['Cantidad'],
                    $sol['Estado']
                );
            }
            return $listStudes;
        }

    }

?>