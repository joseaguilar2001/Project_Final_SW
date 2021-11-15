<?php 
    session_start();
    include_once("./Models/autorizaciones.php");
    include_once("./Models/solicitudes.php");
    include_once("./Models/usuario.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlAutorizaciones
    {
        public function Home()
        {
            $auth = Autorizaciones::consult();
            include_once("./Views/Autorizaciones/home.php");
        }

        public function Create()
        {
            $solicitud = Solicitudes::consult();
            $usuarios = Usuario::consult();
            $cadena = Autorizaciones::generateRandomString(15);
            $user = '';
            $idU = $_SESSION['Rol'];
            
            if($_POST)
            {
                $soli = $_POST['idsolicitud'];
                $solInfo = Solicitudes::search($soli);
                $emailUser = Usuario::emailUser($solInfo -> Usuario);
                $res = '';
                if($idU != '01')
                {
                    $user = $_SESSION['id'];
                }
                else
                {
                    $user = $_POST['iduser'];
                }
                
                $fecha = $_POST['fecha'];
                $codi = $_POST['codigoAuth'];
                $stt = $_POST['estado'];
                if($soli == '0')
                {
                    $soli = null;
                }
                if($user == '0')
                {
                    $user = null;
                }
                if( $stt == '1' OR $stt == 1 )
                {
                        $prodInfor = Productos::search($solInfo -> Producto);
                        $cant = (int)$solInfo -> Cantidad;
                        $cantP = (int)Productos::cantiprod($solInfo -> Producto);
                        $cant3 = $cantP - $cant;
                        if($cant3 > (int)$prodInfor -> Limite)
                        {
                            $res = 'Se confirmo su solicitud';
                            Productos::updatecant($solInfo -> Producto, $cant3);
                        }
                        else if($cant3 <= (int)$prodInfor -> Limite AND $cant3 > 0)
                        {
                            $to = Usuario::emailUser('03');
                            $subject = 'Riesgo de producto';
                            $headers[] = 'MIME-Version: 1.0';
                            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                            $message1 = '
                            <html>
                            <head>
                            <title>Solicitud</title>
                            </head>
                            <body>
                            <p>Se hizo una aprobación de una solicitud el día '. date('Y-m-n') .'
                             Sin embargo el producto '. $prodInfor -> Name .' ya he llegado al
                             limite, o sea que está en riesgo, por favor tomar nota y comprar 
                             más producto de este.
                             Este mensaje  viene de parte del departamento de control.
                             </p>
                            </body>
                            </html>
                            ';
                            mail($to, $subject, $message1, implode("\r\n",$headers));
                        }
                        else if($cant3 == 0)
                        {
                            $stt = '3';
                            $res = 'Se rechazo su solicitud por que no hay suficiente producto';
                        }   
                }
                else if($stt == '3' OR $stt == 3)
                {
                    $res = 'Se rechazo su solicitud';
                }
                $message = '
                <html>
                <head>
                <title>Solicitud</title>
                </head>
                <body>
                <p> '. $res .' el día '. date('Y-m-n') .'.
                Este fue un mensaje del departamento de administración.
                </p>
                </body>
                </html>
                ';
                $to = Usuario::emailUser($solInfo -> Usuario);
                $subject = 'Solicitud de producto';
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                mail($to, $subject, $message, implode("\r\n",$headers));
                Autorizaciones::create($soli, $user, $fecha, $codi, $stt);
                header("Location: ./index.php?controller=autorizaciones&action=home");
            }
            include_once("./Views/Autorizaciones/create.php");
        }

        public function Edit()
        {
            $id = $_GET['id'];
            $auth = Autorizaciones::search($id);
            $users = Usuario::consult();
            if($_POST)
            {
                $soli = $_POST['idsolicitud'];
                $user = $_POST['iduser'];
                $fecha = $_POST['fecha'];
                $codi = $_POST['codigoAuth'];
                $stt = $_POST['estado'];
                if($soli == '0')
                {
                    $soli = 'null';
                }
                else if($user == '0')
                {
                    $user = 'null';
                }
                Autorizaciones::edit($id, $soli, $user, $fecha, $codi, $stt);
                header("Location: ./index.php?controller=autorizaciones&action=home");
            }
            include_once("./Views/Autorizaciones/edit.php");
        }

        public function Delete()
        {
            $id = $_GET['id'];
            Autorizaciones::delete($id);
            header("Location: ./index.php?controller=autorizaciones&action=home");
        }

        public function Dashboard()
        {
            $idU = $_SESSION['Rol'];
            $soli = Solicitudes::countsoli();
            $user = Usuario::countuser();
            $aut = Autorizaciones::countautor();
            $autoriza = Autorizaciones::consultNew();
            include_once("./Views/Autorizaciones/dashboard.php");
        }
         
        
    }

?>