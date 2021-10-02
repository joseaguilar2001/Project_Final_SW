<?php

    class Usuario
    {
        public $id;
        public $name;
        public $lastname;
        public $username;
        public $password;
        public $email;
        public $tel;
        public $rol;
        public $estado;

        public function __construct(
            $id, 
            $name, 
            $lastname,
            $username,
            $password,
            $email, 
            $tel,
            $rol,
            $estado
        )
        {
            $this -> IdUser = $id;
            $this -> Name = $name;
            $this -> Lastname = $lastname;
            $this -> Username = $username;
            $this -> Password = $password;
            $this -> Email = $email;
            $this -> Telefono = $tel;
            $this -> Rol = $rol;
            $this -> Estado = $estado;
        }

        public static function consult()
        {
            $ListUsers = [];
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM usuario");
            foreach($sql -> fetchAll() as $user)
            {
                $ListUsers = new Usuario(
                    $user['idUsuario'],
                    $user['NombreUsuario'],
                    $user['ApellidoUsuario'],
                    $user['Username'],
                    $user['Password'],
                    $user['Email'],
                    $user['Telefono'],
                    $user['Rol'],
                    $user['Estado']
                );
            }
            return $ListUsers;
        }

        public static function create($id, $name, $lastname, $user, $password, $email, $tel, $rol, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("INSERT INTO usuario(idUsuario, NombreUsuario, ApellidoUsario, Username, Password, Email, Telefono, Rol, Estado) VALUES (?,?,?,?,?,?,?,?)");
            $sql -> execute(array($id, $name, $lastname, $user, $password, $email, $tel, $rol, $estado));
        }

        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("UPDATE usuario SET Estado = 4 WHERE idUsuario = ?");
            $sql -> execute($id);
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("SELECT * FROM usuario WHERE idUsuario = ?");
            $sql -> execute($id);
            $iusers = $sql -> fetch();
            return new Usuario(
                $iusers['idUsuario'],
                $iusers['NombreUsuario'],
                $iusers['ApellidoUsuario'],
                $iusers['Username'],
                $iusers['Password'],
                $iusers['Email'],
                $iusers['Telefono'],
                $iusers['Rol'],
                $iusers['Estado']
            );
        }
        public static function edit($id, $name, $lastname, $user, $password, $email, $tel, $rol, $estado)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->query("UPDATE usuario SET NombreUsuario = ?, ApellidoUsuario = ?, Username = ?, Password = ?, Email = ?, Telefono = ?, Rol = ?, Estado = ? WHERE idUsuario = ?");
            $sql -> execute($name, $lastname, $user, $password, $email, $tel, $rol, $estado, $id);
        }

        public static function existId($id)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->query("SELECT COUNT(idUsuario) AS Nombre FROM usuario WHERE idUsuario = ?");
            $sql -> execute(array($id));
            $existe = (int) $sql -> fetch();
            if($existe > 0)
            {
                return true;
            }
            else if($existe == 0)
            {
                return false;
            }
        }

        public static function existUser($user)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->query("SELECT COUNT(NombreUsuario) AS Nombre FROM usuario WHERE NombreUsuario = ?");
            $sql -> execute(array($user));
            $existe = (int) $sql -> fetch();
            if($existe > 0)
            {
                return true;
            }
            else if($existe == 0)
            {
                return false;
            }
        }

        public static function existEmail($email)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->query("SELECT COUNT(Email) FROM usuario WHERE Email = ?");
            $sql -> execute(array($email));
            $existe = (int) $sql -> fetch();
            if($existe > 0)
            {
                return true;
            }
            else if($existe == 0)
            {
                return false;
            }
        }

        public static function IdUser($length = 5)
        {
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