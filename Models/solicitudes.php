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
            $sql=$conectionDB->query("INSERT INTO solicitudes(IdArea, IdProducto, idUsario, Fecha, Cantidad, Estado) VALUES (?, ?, ?, ?, ?, ?)");
            $sql -> execute(array($area, $product, $user, $date, $cant, $estado));
        }

        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("UPDATE solicitudes SET Estado = 4 WHERE IdSolicitud = ?");
            $sql -> execute(array($id));
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM solicitudes WHERE IdSolicitud = ?");
            $sql -> execute(array($id));
            $solicitud = $sql -> fetch();
            return new Solicitudes(
                $solicitud['IdSolicitud'],
                $solicitud['IdArea'],
                $solicitud['IdProducto'],
                $solicitud['idUser'],
                $solicitud['Fecha'],
                $solicitud['Cantidad'],
                $solicitud['Estado']
            );
        }

        public static function edit($id, $area, $product, $user, $date, $cant, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("UPDATE solicitudes SET IdArea = ?, IdProducto = ?, idUser = ?, Fecha = ?, Cantidad = ?, Estado = ? WHERE IdSolicitud = ?");
            $sql -> execute(array($area, $product, $user, $date, $cant, $estado, $id));
        }
    }

?>