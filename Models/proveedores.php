<?php 
    class Proveedores
    {
        public $id;
        public $provname;
        public $provad;
        public $email;
        public $estado;

        public function __construct(
            $id, 
            $provname,
            $provad,
            $email,
            $estado
        )
        {
            $this -> IdProv = $id;
            $this -> Name = $provname;
            $this -> Adress = $provad;
            $this -> Email = $email;
            $this -> Estado = $estado;
        }

        public static function consult()
        {
            $listPr = [];
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> query("SELECT * FROM proveedores");
            foreach($sql -> fetchAll() as $prvo)
            {
                $listPr [] = new Proveedores(
                    $prvo['IdProveedor'],
                    $prvo['Provname'],
                    $prvo['ProvAdress'],
                    $prvo['Email'],
                    $prvo['Estado'] 
                );
            }
            return $listPr;
        }

        public static function create($name, $provad, $email, $estado)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> prepare("INSERT INTO proveedores(Provname, ProvAdress, Email, Estado) VALUES (?, ?, ?, ?)");
            $sql -> execute(array($name, $provad, $email, $estado));
        }

        public static function delete($id)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> prepare("UPDATE proveedores SET Estado = 4 WHERE IdProveedor = ?");
            $sql -> execute(array($id)); 
        }

        public static function search($id)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> prepare("SELECT * FROM proveedores WHERE IdProveedor = ?");
            $sql -> execute(array($id));
            $prov = $sql -> fetch();
            return new Proveedores(
                $prov['IdProveedor'],
                $prov['Provname'],
                $prov['ProvAdress'],
                $prov['Email'],
                $prov['Estado']
            );
        }

        public static function edit($id, $name, $provad, $email, $estado)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> prepare("UPDATE proveedores SET Provname = ?, ProvAdress = ?, Email = ?, Estado = ? WHERE IdProveedor = ?");
            $sql -> execute(array($name, $provad, $email, $estado, $id));
        }

        public static function countprov()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM proveedores");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }
    }
?>