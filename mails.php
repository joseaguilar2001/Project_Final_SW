<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$email=$_POST['email'];
$name=$_POST['name'];


$serial= rand(1,99999);

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'gtintechldtare@gmail.com';                     //SMTP username // Usar credenciales para verificar llegada de correos a la cuenta pre configurada
    $mail->Password   = 'LDTare2021';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('bioradsystem@mail.com', 'BIORAD System');
    $mail->addAddress( $email , $name);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Confirmacion de recepcion';
    $mail->Body    = 'Codigo de prueba<b>clave</b>: '. $serial;

    $mail->send();
    echo '<script> 
        alert("Se ha enviado la autoriacion a su correo");
        window.history.go(-1);
    ';
} catch (Exception $e) {
    echo "Ha ocurrido un error al enviar el correo: {$mail->ErrorInfo}";
}

?>