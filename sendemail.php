<?php

require './PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$correo_destino = 'informacion@dbagro.cl'; //donde llegara el mensaje

$nombre=$_POST['name'];
$correo=$_POST['email'];
$asunto=$_POST['subject'];
$mensaje=$_POST['message'];
//echo "nombre: ".$nombre."\n";
//echo "correo: ".$correo."\n";
//echo "asunto: ".$asunto."\n";
//echo "mensaje: ".$mensaje."\n";

$cuerpo='<table><tr><td>Nombre: </td><td>'.$nombre.' </td></tr> ';
$cuerpo.='<tr><td>Correo: </td><td>'.$correo.' </td></tr> ';
$cuerpo.='<tr><td>Asunto: </td><td>'.$asunto.' </td></tr> ';
$cuerpo.='<tr><td>Mensaje: </td><td>'.$mensaje.' </td></tr> </table>';


$mail->isSMTP(); 
$mail->CharSet = 'UTF-8';
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = 'mail.dbagro.cl'; //especifica el servidor de correo (no modificar)
$mail->SMTPAuth = true; 
$mail->Username = 'informacion@dbagro.cl'; //correo desde donde se envia el mensaje (debe ser un coreo del hosting)
$mail->Password = 'Elalamo2017';   // Clave del correo de arriba 
$mail->SMTPSecure = 'ssl';  // Tipo de encriptado
$mail->Port = 465;   

$mail->setFrom('informacion@dbagro.cl', 'Mailer'); // el correo del que se enviará el mensaje  
$mail->addAddress($correo_destino, $nombre);     

$mail->Subject = 'Mensaje desde web DBagro formulario contacto';
$mail->Body    = html_entity_decode($cuerpo);
$mail->IsHTML(true);  
if(!$mail->send()) {
    echo 0;
} else {
    echo 1;
    
}

?>