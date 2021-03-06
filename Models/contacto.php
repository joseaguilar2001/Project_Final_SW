<?php

    class Contacto
    {
        public $id;
        public $idProv;
        public $contName;
        public $contApe;
        public $contCel;
        public $contMail;
        public $estado;

        public function __construct($id, $prov, $name, $lastname, $celular, $email, $estado)
        {
            $this -> IdContacto = $id;
            $this -> Proveedor = $prov;
            $this -> Name = $name;
            $this -> LastName = $lastname;
            $this -> Celular = $celular;
            $this -> Email = $email;
            $this -> Estado = $estado;
        }

        public static function consult()
        {
            $ListContactos = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM contacto");
            foreach($sql -> fetchAll() as $cnto)
            {
                $ListContactos []= new Contacto(
                    $cnto['IdContacto'],
                    $cnto['IdPRoveedor'],
                    $cnto['ContactoName'],
                    $cnto['ContactoApe'],
                    $cnto['ContactoCell'],
                    $cnto['ContactoMail'],
                    $cnto['Estado']
                );
            }
            return $ListContactos;

        }

        public static function create($prov, $name, $lastname, $celular, $email, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("INSERT INTO contacto(IdPRoveedor, ContactoName, ContactoApe, ContactoCell, ContactoMail, Estado) VALUES (?,?,?,?,?,?)");
            $sql -> execute(array($prov, $name, $lastname, $celular, $email, $estado));
        }

        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("UPDATE contacto SET Estado = 4 WHERE IdContacto = ?");
            $sql -> execute($id);
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("SELECT * FROM contacto WHERE IdContacto = ?");
            $sql -> execute($id);
            $contact = $sql -> fetch();
            return new Contacto(
                $contact['IdContacto'],
                $contact['IdPRoveedor'],
                $contact['ContactoName'],
                $contact['ContactoApe'],
                $contact['ContactoCell'],
                $contact['ContactoMail'],
                $contact['Estado']
            );
        }

        public static function edit($id, $prov, $name, $lastname, $celular, $email, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("UPDATE contacto VALUES IdPRoveedor = ?, ContactoName = ?, ContactoApe = ?, ContactoCell = ?, ContactoMail = ?, Estado = ?    WHERE IdContacto = ?");
            $sql -> execute($prov, $name, $lastname, $celular, $email, $estado, $id);
        }

        public static function countcontacto()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM contacto");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }

        public static function consultNew()
        {
            $lstContacto = [];
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT Provname, ContactoName, ContactoApe, ContactoCell, ContactoMail FROM contacto INNER JOIN proveedores USING(IdProveedor) WHERE contacto.Estado = 1");
            foreach($sql -> fetchAll() as $contacto)
            {
                $lstContacto []= new Contacto(
                    null,
                    $contacto['ProvName'],
                    $contacto['ContactoName'],
                    $contacto['ContactoApe'],
                    $contacto['ContactoCell'],
                    $contacto['ContactoMail'],
                    null
                );
            }
            return $lstContacto;
        }
    }

?>