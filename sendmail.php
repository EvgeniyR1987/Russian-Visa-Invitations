<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'phpmailer/Exception.php';
  require 'phpmailer/PHPMailer.php';
  $mail = new PHPMailer(true);
  $mail->CharSet = 'UTF-8';
  $mail->setLanguage('ru', 'phpmailer/language/');
  $mail->IsHTML(true);
  $mail->setFrom('comandatt@yandex.ru', 'Евгений');
  $mail->addAddress('comandatt@yandex.ru');
  $mail->Subject = 'Подписка RVI';
  $body = '<h1>Встречайте письмо!</h1>';
  if(trim(!empty($_POST['email']))) {
    $body.='<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
  }
  $mail->Body = $body;
  if (!$mail->send()) {
    $message = 'Ошибка';
  } else {
    $message = 'Данные отправлены';
  }
  $response = ['message' => $message];
  header('Content-type: application/json');
  echo json_encode($response);
?>
