<?php

use Model\Email;
require_once 'app/partials/classes/model/Email.php';

$data = $_POST;
extract($data);

if($exec == 'send_countach_email'){

    $subject = "Contato do site: ".$name." quer falar com você!";
    $message = "Olá, Thallifa! tem alguém tentando entrar em contato.<br/>";
    $message.= "Nome: ". $name."<br/>.";
    $message.= "Telefone: ".$phone."</br>";
    $message.= "E-mail: ".$email."</br>";
    $message.= "Mensagem: <br/> ".$content;
    $message.= "<br/><center>--------------------------</center><br/>";

    $m = new Email($name,$subject, $message, CONT_EMAIL);
    if($m->send())
        $r = ['res'=>true];
    else{
        $r = ['erro'=>true];
    }
}else{
    $r = ['erro'=>'Ei, esta operação não é válida!'];
}

sendJsonResponse($r);