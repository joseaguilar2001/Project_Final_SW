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
            $this -> Id = $id;
            $this -> Nombre = $name;
            $this -> Apellido = $lastname;
            $this -> Usuario = $username;
            $this -> Contra = $password;
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
                $ListUsers []= new Usuario(
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
            $sql=$conectionDB->prepare("INSERT INTO usuario(idUsuario, NombreUsuario, ApellidoUsuario, Username, Password, Email, Telefono, Rol, Estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $sql->execute(array($id, $name, $lastname, $user, $password, $email, $tel, $rol, $estado));
        }

        public static function delete($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("UPDATE usuario SET Estado = 4 WHERE idUsuario = ?");
            $sql -> execute($id);
        }

        public static function search($id)
        {
            $conectionDB = DB::createInstant();
            $sql=$conectionDB->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
            $sql -> execute(array($id));
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
            $sql=$conectionDB->prepare("UPDATE usuario SET NombreUsuario = ?, ApellidoUsuario = ?, Username = ?, Password = ?, Email = ?, Telefono = ?, Rol = ?, Estado = ? WHERE idUsuario = ?");
            $sql -> execute(array($name, $lastname, $user, $password, $email, $tel, $rol, $estado, $id));
        }

        public static function existId($id)
        {
            $val = false;
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT * FROM usuario WHERE idUsuario = ?");
            $sql -> execute(array($id));
            $existe = $sql -> rowCount();
            if($existe > 0 || $existe != '0') 
            {
                $val = true;
            }
            else if($existe == 0 || $existe == '0')
            {
                $val = false;
            }
            return $val;
        }

        public static function existUser($user)
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB->prepare("SELECT COUNT(NombreUsuario) FROM usuario WHERE NombreUsuario = ?");
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
            $sql = $conectionDB->prepare("SELECT COUNT(Email) FROM usuario WHERE Email = ?");
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
            $randomString = rand(0,9999);
            return $randomString;
        }
        
        public static function countuser()
        {
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> query("SELECT COUNT(*) total FROM usuario");
            $rowcount = $sql -> fetchColumn();
            return $rowcount;
        }
        public static function emailUser($idRol)
        {
            $email = '';
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("SELECT Email FROM usuario WHERE Rol = ?");
            $sql -> execute(array($idRol));
            $email = $sql -> fetch();
            return $email['Email'];
        }

        public static function emailUserId($id)
        {
            $email = '';
            $conectionDB = DB::createInstant();
            $sql = $conectionDB -> prepare("SELECT Email FROM usuario WHERE idUsuario = ?");
            $sql -> execute(array($id));
            $email = $sql -> fetch();
            return $email['Email'];
        }
    }

    

?>