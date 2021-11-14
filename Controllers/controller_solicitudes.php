<?php
    session_start();
    include_once("./Models/solicitudes.php");
    include_once("./Models/areas.php");
    include_once("./Models/productos.php");
    include_once("./Models/usuario.php");
    include_once("./Models/autorizaciones.php");
    include_once("./db.php");
    DB::createInstant();
    class ControlSolicitudes
    {
        public function Home()
        {
            $solicitudes = Solicitudes::consult();
            include_once("./Views/Solicitudes/home.php");
        }
        public function Create()
        {
            $message = '';
            $idU = $_SESSION['Rol'];
            $prod = Productos::consult();
            $area = Areas::consult();
            $user = Usuario::consult();
            if($_POST)
            {
                
                $area = $_POST['idarea'];
                $prod = $_POST['idprod'];
                if($idU == '04')
                {
                    $user = $_SESSION['id'];
                }
                else
                {
                    $user = $_POST['user'];
                }
                $fecha = '';
                if($idU == '04')
                {
                    $fecha = date('Y-m-d');
                }
                else 
                {
                    $fecha = $_POST['fecha'];
                }
                
                $cant = $_POST['cant'];
                $stado = '';
                if($idU == '04')
                {
                    $stado = '2';
                }
                else 
                {
                    $stado = $_POST['estado'];
                }
                if($area == '0')
                {
                    $area = null;
                }
                if($prod == '0')
                {
                    $prod = null;
                }
                if($user == '0')
                {
                    $user = null;
                }
                $userInfor = Usuario::search($user);
                $prodInfo = Productos::search($prod);
                $area = Areas::search($area);
                $message = '
                <html>
                <head>
                <title>Solicitud</title>
                </head>
                <body>
                <p>Se hizo una nueva solicitud el día '. date('Y-m-n') .'
                 de el usuario '. $userInfor -> Name .' '. $userInfor -> LastName .'
                 sobre el producto '. $prodInfo -> Name .' por la cantidad de '. $cant .' 
                 para el área '. $area->NombreArea .'. 
                 Este mensaje  viene de parte del departamento de control.
                 </p>
                </body>
                </html>
                ';
                $to = Usuario::emailUser('03');
                $subject = 'Solicitud de producto';
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                
                Solicitudes::create($area, $prod, $user, $fecha, $cant, $stado);
                mail($to, $subject, $message, implode("\r\n",$headers));
                header("Location: ./index.php?controller=solicitudes&action=home");
            } 
            include_once("./Views/Solicitudes/create.php");
        }
        public function Edit()
        {
            $id = $_GET['id'];
            $soli = Solicitudes::search($id);
            $prod = Productos::consult();
            $area = Areas::consult();
            $user = Usuario::consult();
            if($_POST)
            {
                $area = $_POST['idarea'];
                $prod = $_POST['idprod'];
                $user = $_POST['user'];
                $fecha = $_POST['fecha'];
                $cant = $_POST['cant'];
                $stado = $_POST['estado'];
                if($area == '0')
                {
                    $area = null;
                }
                if($prod == '0')
                {
                    $prod = null;
                }
                if($user == '0')
                {
                    $user = null;
                }
                Solicitudes::edit($id,$area, $prod, $user, $fecha, $cant, $stado);
                header("Location: ./index.php?controller=solicitudes&action=home");
            } 
            include_once("./Views/Solicitudes/edit.php");
        }
        public function Delete()
        {
            $id = $_GET['id'];
            Solicitudes::delete($id);
            header("Location: ./index.php?controller=solicitudes&action=home");
        }

        public function Dashboard()
        {
            $idU = $_SESSION['Rol'];
            $cadena = Autorizaciones::generateRandomString(15);
            $solicitudes = Solicitudes::consult();
            $fechaActual = date('Y-m-d');
            if( $idU == '01' OR $idU == '03')
            {
                if($_POST)
                {
                    $res = '';
                    $ids = $_POST['idsolicitud'];
                    $user = $_SESSION['id'];
                    $confirm = $_SESSION['question'];
                    $solicitudInfo = Solicitudes::search($ids);
                    if($confirm == '1')
                    {
                        $prodInfor = Productos::search($solicitudInfo -> Producto);
                        $cant = (int)$solicitudInfo -> Cantidad;
                        $cantP = (int)Productos::cantiprod($solicitudInfo -> Producto);
                        $cant3 = $cantP - $cant;
                        if($cant3 > (int)$prodInfor -> Limite)
                        {
                            Autorizaciones::create($ids, $user, $fechaActual, $cadena, $confirm);
                            $res = 'Se confirmo su solicitud';
                            Productos::updatecant($solicitudInfo -> Producto, $cant3);
                        }
                        else if($cant3 <= (int)$prodInfor -> Limite AND $cant3 > 0)
                        {
                            $to = Usuario::emailUser('03');
                            $subject = 'Riesgo de producto';
                            $headers[] = 'MIME-Version: 1.0';
                            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                            $message = '
                            <html>
                            <head>
                            <title>Solicitud</title>
                            </head>
                            <body>
                            <p>Se hizo una aprobo una solicitud el día '. date('Y-m-n') .'
                             Sin embargo el producto '. $prodInfor -> Name .' ya he llegado al
                             limite, o sea que está en riesgo, por favor tomar nota y comprar 
                             más producto de este.
                             Este mensaje  viene de parte del departamento de control.
                             </p>
                            </body>
                            </html>
                            ';
                            mail($to, $subject, $message, implode("\r\n",$headers));
                        }
                        else if($cant3 == 0)
                        {
                            $confirm = '3';
                            Autorizaciones::create($ids, $user, $fechaActual, $cadena, $confirm);
                            $res = 'Se rechazo su solicitud por que no hay suficiente producto';
                        }
                    }
                    else if($confirm == '3') 
                    {
                        $res = 'Se rechazo su solicitud';
                    }
                    $emailUser = Usuario::emailUserId($solicitudInfo -> Usuario);
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
                    $to = $emailUser;
                    $subject = 'Solicitud de producto';
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                    mail($to, $subject, $message, implode("\r\n",$headers));
                    header("Location: ./index.php?controller=solicitudes&action=dashboard");
                }
            }
            include_once("./Views/Solicitudes/dashboard.php");
        }
    }
?>
