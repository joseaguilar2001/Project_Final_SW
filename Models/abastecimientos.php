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

        public static function consultNew()
        {
            $listN =[];
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->query("SELECT ProdName, Provname, Cantidad, AbasDate FROM abastecimientos INNER JOIN productos USING(IdProducto) INNER JOIN proveedores USING(IdProveedor) WHERE abastecimientos.Estado = 1");
            foreach($sql -> fetchAll() as $ab)
            {
                   $listN []= new Abastecimientos(
                        null,
                        $ab['Provname'],
                        $ab['ProdName'],
                        $ab['Cantidad'],
                        $ab['AbasDate'],
                        null
                   );
            }
            return $listN;
        }

        public static function searchDate($date)
        {
            $listF = [];
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->query("SELECT ProdName, Provname, Cantidad, AbasDate FROM abastecimientos INNER JOIN productos USING(IdProducto) INNER JOIN proveedores USING(IdProveedor) WHERE abastecimientos.Estado = 1 AND abastecimientos.AbasDate = ?");
            $sql -> execute(array($date));
            $abastecimiento = $sql -> fetchAll();
            foreach($abastecimiento as $aba)
            {
                $listF[] = new Abastecimientos(
                    null,
                    $aba['ProvName'],
                    $aba['ProdName'],
                    $aba['Cantidad'],
                    $aba['AbasDate'],
                    null
                );
            }
        }
        public static function countabas()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM abastecimientos");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }
    }

?>