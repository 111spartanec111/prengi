<?php 

$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$text1 = $_POST['textarea'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'spart103@yandex.ru';                 // Наш логин
$mail->Password = 'yhGTre4';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('spart103@yandex.ru', 'Portfolio');   // От кого письмо 
$mail->addAddress('spart103@rambler.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка с сайта "Портфолио"';
$mail->Body    = '
	<b>Пользователь оставил данные:</b> <br> 
	<b>Имя:</b> ' . $name . ' <br>
	<b>Номер телефона:</b> ' . $phone . '<br>
	<b>E-mail:</b> ' . $email . ' <br>
	<b>Текст заявителя:</b> ' . $text1 . '';

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>