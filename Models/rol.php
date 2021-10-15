<?php 

    class Rol
    {
        public $id;
        public $name;
        public $desc;
        public $estado;

        public function __construct(
            $id,
            $name, 
            $desc,
            $estado
        )
        {
            $this -> Id = $id;
            $this -> Nombre = $name;
            $this -> Descripcion = $desc;
            $this -> Estado = $estado;
        }

        public static function consult()
        {
            $listRol = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM rol");
            foreach($sql -> fetchAll() as $rol)
            {
                $listRol[] = new Rol(
                    $rol['idRol'],
                    $rol['Nombre_Rol'],
                    $rol['Descripcion'],
                    $rol['Estado']
                );
            }
            return $listRol;
        }

        public static function create($id, $name, $desc, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("INSERT INTO rol(idRol, Nombre_Rol, Descripcion, Estado) VALUE (?, ?, ?, ?)");
            $sql -> execute(array($id, $name, $desc, $estado));
        }

        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("UPDATE rol SET Estado = 4 WHERE idRol = ?");
            $sql -> execute(array($id));
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT * FROM rol WHERE idRol = ?");
            $sql -> execute(array($id));
            $roles = $sql -> fetch();
            return new Rol(
                $roles['idRol'],
                $roles['Nombre_Rol'],
                $roles['Descripcion'],
                $roles['Estado']
            );
        }

        public static function edit($id, $name, $desc, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("UPDATE rol SET  Nombre_Rol = ?, Descripcion = ?, Estado = ? WHERE idRol = ?");
            $sql -> execute(array($name, $desc, $estado, $id));
        }
    }

?>