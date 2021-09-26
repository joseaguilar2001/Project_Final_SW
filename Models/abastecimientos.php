<?php
    
    class Abastecimientos{
        public $id;
        public $idprov;
        public $idprod;
        public $cant;
        public $date;
        public $state;

        public function __construct($id, $idprov, $idprod, $cant, $date, $state)
        {
            $this->Idbas=$id;
            $this->IdProveedor=$idprov;
            $this->IdProducto=$idprod;
            $this->Cantidad=$cant;
            $this->AbasDate=$date;
            $this->Estado=$state;
        }

        public static function consult()
        {
            $listAbas =[];
            $conectionDB=DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM abastecimientos");

            foreach($sql->fetchAll() as $abas)
            {
                $listAbas []=new Abastecimientos($abas['IdAbas'],
                $abas['IdProveedor'], $abas['IdProducto'], $abas['Cantidad'],
                $abas['AbasDate'], $abas['Estado']);
            }

            return $listAbas;
        }
        public static function create($idprov, $idprod, $cant, $date, $state)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("INSERT INTO abastecimientos(IdProveedor, IdProducto, Cantidad, AbasDate, Estado) VALUES (?,?,?,?,?)");
            $sql->execute(array($idprov, $idprod, $cant, $date, $state));
        }
        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("UPDATE abastecimientos SET Estado=4 WHERE IdAbas=?");
            $sql->execute(array($id));
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT * FROM abastecimientos WHERE IdAbas=?");
            $sql->execute(array($id));
            $abast = $sql->fetch();
            return new Abastecimientos($abast['IdAbas'], $abast['IdProveedor'], $abast['IdProducto'], $abast['Cantidad'], $abast['AbasDate'], $abast['Estado']);
        }

        public static function edit($id, $idprov, $idprod, $cant, $date, $state)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("UPDATE abastecimientos SET IdProveedor = ?, IdProducto = ?, Cantidad = ?, AbasDate = ?, Estado = ?  WHERE IdAbas=?");
            $sql->execute(array($idprov, $idprod, $cant, $date, $state, $id));
        }
    }

?>