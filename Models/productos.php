<?php
    class Productos
    {
        public $id;
        public $name;
        public $price;
        public $exist;
        public $medida;
        public $limite;
        public $dateoff;
        public $state;

        public function __construct($id, $name, $price, $exist ,$medida, $limite, $dateoff, $state)
        {
            $this -> IdProd = $id;
            $this -> Name = $name;
            $this -> Price = $price;
            $this -> Exist = $exist;
            $this -> Medida = $medida;
            $this -> Limite = $limite;
            $this -> DateOff = $dateoff;
            $this -> Estado = $state;
        }

        public static function consult()
        {
            $lispr = [];
            $conectionDB=DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM productos");
            foreach($sql->fetchAll() as $prod)
            {
                $lispr []= new Productos($prod['IdProducto'],
                $prod['ProdName'], $prod['ProdPrice'], $prod['Existencias'],
                $prod['ProdMedida'], $prod['ProdLimite'], $prod['ProdDateOff'],
                $prod['Estado']);
            }
            return $lispr;
        }

        public static function create($name, $price, $exist, $medida, $limite, $dateoff, $state)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB->prepare("INSERT INTO productos(ProdName, ProdPrice, Existencias, ProdMedida, ProdLimite, ProdDateOff, Estado) VALUES (?,?,?,?,?,?,?)");
            $sql -> execute(array($name, $price, $exist, $medida, $limite, $dateoff, $state)); 
        }

        public static function delete($id)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB->prepare("UPDATE productos SET Estado=4 WHERE IdProducto=?");
            $sql -> execute(array($id));
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT * FROM productos WHERE IdProducto=?");
            $sql->execute(array($id));
            $prod = $sql -> fetch();
            return new Productos($prod['IdProducto'], $prod['ProdName'],
            $prod['ProdPrice'], $prod['Existencias'], $prod['ProdMedida'],
            $prod['ProdLimite'], $prod['ProdDateOff'], $prod['Estado']);
        }

        public static function edit($id, $name, $price, $exist, $medida, $limite, $dateoff, $state)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("UPDATE productos SET ProdName = ?, ProdPrice = ?, Existencias = ?, ProdMedida = ? , ProdLimite = ?, ProdDateOff = ? , Estado = ? WHERE IdProducto=?");
            $sql -> execute(array($name, $price, $exist, $medida, $limite, $dateoff, $state, $id));
        }
        public static function countprod()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM productos");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }

        public static function cantiprod($id)
        {
            $cant = '';
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT Existencias FROM productos WHERE IdProducto = ?");
            $sql -> execute(array($id));
            $cant = $sql -> fetch();
            return $cant['Existencias'];
        }
        public static function updatecant($id, $cant)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("UPDATE productos SET Existencias = ? WHERE IdProducto = ?");
            $sql -> execute(array($cant, $id));
        }
        public static function productosexistenes(){
            $lispr = [];
            $conectionDB=DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM productos WHERE Existencias > ProdLimite");
            foreach($sql->fetchAll() as $prod)
            {
                $lispr []= new Productos($prod['IdProducto'],
                $prod['ProdName'], $prod['ProdPrice'], $prod['Existencias'],
                $prod['ProdMedida'], $prod['ProdLimite'], $prod['ProdDateOff'],
                $prod['Estado']);
            }
            return $lispr;
            
        }
        public static function productosporagotarse(){
            $lispr = [];
            $conectionDB=DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM productos WHERE Existencias < ProdLimite AND Existencias > 0");
            foreach($sql->fetchAll() as $prod)
            {
                $lispr []= new Productos($prod['IdProducto'],
                $prod['ProdName'], $prod['ProdPrice'], $prod['Existencias'],
                $prod['ProdMedida'], $prod['ProdLimite'], $prod['ProdDateOff'],
                $prod['Estado']);
            }
            return $lispr;
            
        }
        public static function productosagotados(){
            $lispr = [];
            $conectionDB=DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM productos WHERE Existencias == 0");
            foreach($sql->fetchAll() as $prod)
            {
                $lispr []= new Productos($prod['IdProducto'],
                $prod['ProdName'], $prod['ProdPrice'], $prod['Existencias'],
                $prod['ProdMedida'], $prod['ProdLimite'], $prod['ProdDateOff'],
                $prod['Estado']);
            }
            return $lispr;;
            
        }
    }
?>