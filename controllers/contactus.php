<?php

use PHPMailer\PHPMailer\PHPMailer;
require (__DIR__."/../vendor/autoload.php");

class ContactUs
{
    public $from;
    public $html;
    public $name;
    public $surname;
    public $phone;

    public function sendMail(){

        date_default_timezone_set('Etc/UTC');

        $mail = new PHPMailer;

        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tsl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->Priority = 1;
        $mail->isHTML(true);
        $mail->Username = 'multishop.proyecto.daw@gmail.com';
        $mail->Password = 'proyectoDaw';
        $mail->setFrom($this->from);
        $mail->addAddress('multishop.proyecto.daw@gmail.com');
        $mail->Subject = 'PHPMailer SMTP test';
        $mail->Body = '<p>'. $this->html .'. '. $this->name . ' ' .$this->surname .'</p>';
        if (!$mail->send()) {
            echo json_encode(array('response' => 'error'));
        } else {
            echo json_encode(array('response' => 'ok'));
        }
    }
}

if (isset($_POST['Contact'])){
    $contact = new ContactUs();
    $contact->html = $_POST['Contact']['message'];
    $contact->from=$_POST['Contact']['mail'];
    $contact->name = $_POST['Contact']['name'];
    $contact->surname = $_POST['Contact']['surname'];
    $contact->phone = $_POST['Contact']['phone'];
    $contact->sendMail();
}

