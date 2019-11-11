<?php
$email = $_REQUEST['e'];
$mensaje = $_REQUEST['mensaje'];
$name = $_REQUEST['n'];
$tema = $_REQUEST['t'];


require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'mailtrap.io';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '4851d7f46fbac3';                 // SMTP username
$mail->Password = '75c75bd28939f8';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 25;                                    // TCP port to connect to

$mail->From = $email;
$mail->setFrom = $email;
$mail->addAddress('raphael.richardson@gmail.com', 'DesigniumPartner');     // Add a recipient
$mail->addAddress('raphael.richardson@gmail.com');               // Name is optional
$mail->addReplyTo('info@example.com', 'Information');
$mail->addCC('designiumpartner@gmail.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->WordWrap = 50;
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Ha recibido un correo de su sitio web DesigniumPartner';
$mail->Body    = "Ha recibido un mensaje de <b>$name</b> <br> $email $tema <br> $mensaje";
$mail->AltBody = "Ha recibido un mensaje de $name ,  $email , $tema ,  $mensaje";

if(!$mail->send()) {
    echo 'El Mensaje no fue enviado, Intente de nuevo.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo "<script>
             alert('Su mensaje ha sido enviado Exitosamente.'); 
             window.history.go(-1);
     </script>";
}
?>