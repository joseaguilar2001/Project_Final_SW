<?php

    class Autorizaciones
    {
        public $id;
        public $idSol;
        public $user;
        public $date;
        public $codA;
        public $state;
        public function __construct($id, $idSol, 
        $user, $date, $codA, $state)
        {
            $this -> IdAut = $id ;
            $this -> IdSoli = $idSol;
            $this -> IdUser = $user;
            $this -> Date = $date;
            $this -> CodA = $codA;
            $this -> Estado = $state;
        }
        public static function consult()
        {
            $listAu = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM autorizaciones");

            foreach($sql -> fetchAll() as $at)
            {
                $listAu [] = new Autorizaciones(
                    $at['IdAutorizaciones'], 
                    $at['IdSolicitud'],
                    $at['Usuario_ID'],
                    $at['Fecha'],
                    $at['CodigoAuth'],
                    $at['Estado']
                );
            }
            return $listAu;
        }
        public static function create($idSol, $user, $date, $codA, $state)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("INSERT INTO autorizaciones(IdSolicitud, Usuario_ID, Fecha, CodigoAuth, Estado) VALUES (?, ?, ?, ?, ?)");
            $sql -> execute(array($idSol, $user, $date, $codA, $state));
        }
        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("UPDATE autorizaciones SET Estado = 4 WHERE IdAutorizaciones=?");
            $sql -> execute(array($id));
        }
        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("SELECT * FROM autorizaciones WHERE IdAutorizaciones = ?");
            $sql -> execute(array($id));
            $aut = $sql -> fetch();
            return new Autorizaciones(
                $aut['IdAutorizaciones'],
                $aut['IdSolicitud'],
                $aut['Usuario_ID'],
                $aut['Fecha'],
                $aut['CodigoAuth'],
                $aut['Estado']
            );
        }
        public static function edit($id ,$idSol, $user, $date, 
        $codA, $state)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("UPDATE autorizaciones SET IdSolicitud = ?, Usuario_ID = ?, Fecha = ?, CodigoAuth = ?, Estado = ? WHERE IdAutorizaciones = ?");
            $sql -> execute(array( $idSol, $user, $date, $codA, $state, $id));
        }

        public static function countautor()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM autorizaciones");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }

        public static function consultNew()
        {
            $lstnew = [];
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT IdSolicitud, Username, Fecha, CodigoAuth FROM autorizaciones t1 INNER JOIN usuario t2 ON t1.Usuario_ID = t2.idUsuario");
            foreach($sql -> fetchAll() as $l)
            {
                $lstnew [] = new Autorizaciones(
                    null,
                    $l['IdSolicitud'],
                    $l['Username'],
                    $l['Fecha'],
                    $l['CodigoAuth'],
                    null
                );
            }
        }
        public static function generateRandomString($length = 10) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }   
    }    

?>