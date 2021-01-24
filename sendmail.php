<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language');
$mail->IsHTML(true)


$mail->setForm('taragorgodze@gmail.com', 'юлька')
$mail->addAddress('melnichenkoleva97@gmail.com')
$mail->Subject = 'Привет! У тебя получилось!!!'

$hand = 'пол';
if($_POST['hand'] == 'потолок'){
    $hand = 'потолок'
}
 $body = '<h1>Супер письмо</h1>';
 if(trim(!empty($_POST['name']))){
     $body.='<p><strong>Имя:</strong>'.$_POST['name'].'</p>';
 }
 if(trim(!empty($_POST['email']))){
     $body.='<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
 }
if(trim(!empty($_POST['hand']))){
     $body.='<p><strong>Что выбираем:</strong>'.$hand['name'].'</p>';
 }
 if(trim(!empty($_POST['message']))){
     $body.='<p><strong>Сообщение:</strong>'.$_POST['message'].'</p>';
 }

 if(trim(!empty($_FILES['image']['tmp_name']))){
     $filePath = __DIR__. "/files/" . $_FILES['image']['name'];
     if(copy($_FILES['image']['tmp_name'], $filePath)){
         $fileAttach = $filePath;
         $body.='<p><strong>Фото</strong>'.$_POST['email']'</p>';
         $mail->addAttachment($fileAttach);
     }
 }
 $mail->Body = $body;

 if(!$mail->send()){
     $message = 'Ошибка';
 } else {
     $message = 'Данные отправлены';
 }
 $response = ['message' => $message];
 header('Content-type: application/json');
 echo json_encode($response);
?>
