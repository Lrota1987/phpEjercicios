<?php
    require('vendor/autoload.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail= new PHPMailer();

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
    $mail->Host = "smtp.gmail.com";

    $mail->Port = 465; // or 587

    var_dump($_POST);

    if (isset($_POST['asunto'])) {
        $userEmail = $_POST['correo'];
        $asunto = $_POST['asunto'];
        $cuerpo = $_POST['cuerpo'];
        $nombre = $_POST['nombre'];
    }
    
    

    $address = "lucianodaw2@gmail.com";

    $mail->SetFrom($address, $nombre);

    $mail->Username = "lucianodaw2@gmail.com";
    $mail->Password="lrnomdvywphsobno";

    $mail->AddAddress($userEmail, $nombre);

    $mail->Subject = $asunto;

    $mail->MsgHTML($cuerpo);

    if(!$mail->Send()) {
        echo "Error al enviar el mensaje: " . $mail->ErrorInfo;
      } else {
        echo "Mensaje enviado!!";
    }

?>