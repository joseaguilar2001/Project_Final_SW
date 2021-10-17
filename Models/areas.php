<?php

    class Areas
    {
        public $id;
        public $name;
        public $dscr;

        public function __construct($id, $name, $dscr)
        {
            $this -> IdAreas = $id;
            $this -> NombreArea = $name;
            $this -> DescAreas = $dscr; 
        }

        public static function consult()
        {
            $listArea = [];
            $conectionDB=DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM areas");
            foreach($sql -> fetchAll() as $ar)
            {
                $listArea [] = new Areas($ar['IdAreas'],
                $ar['NombreArea'], $ar['DescAreas']);
            }
            return $listArea;
        }

        public static function create($name, $dscr)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> prepare("INSERT INTO areas(NombreArea, DescAreas) VALUES (?,?)");
            $sql -> execute(array($name, $dscr));
        }

        public static function delete($id)
        {
            $conectionDB=DB::createInstant();
            $sql = $conectionDB -> prepare("DELETE FROM areas WHERE IdAreas=?");
            $sql -> execute(array($id));
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT * FROM areas WHERE IdAreas=?");
            $sql->execute(array($id));
            $area = $sql->fetch();
            return new Areas($area['IdAreas'], $area['NombreArea'], $area['DescAreas']);
        }

        public static function edit($id,$name, $dscr )
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("UPDATE areas SET NombreArea = ? , DescAreas = ? WHERE IdAreas = ?");
            $sql -> execute(array($name, $dscr, $id));
        }

        public static function countarea()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM areas");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }
    }

?>