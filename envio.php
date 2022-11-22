<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);
if(isset($_POST['enviar'])){
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nao-responda@funlec.edu.br';                     //SMTP username
        $mail->Password   = 'funlec2019';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('nao-responda@funlec.edu.br', 'Mailer');
        $mail->addAddress('thieko.kumagai@gmail.com', 'Thieko kumagai');     //Add a recipient
        $mail->addReplyTo('thieko.kumagai@gmail.com', 'Information'); /*Quando responder o email vai para quem*/
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Formulario de contato';
        $mail->Body    = $_POST['mensagem'];

        $mail->send();
        echo 'Message enviada com sucesso';
    } catch (Exception $e) {
        echo "Mensagem não enviada. Mailer Error: {$mail->ErrorInfo}";
    }
}