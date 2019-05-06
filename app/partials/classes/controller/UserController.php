<?php

namespace Controller\User;

use Model\User;
require_once ('app/partials/classes/model/User.php');
use Entity\UserEntity;
require_once('app/partials/classes/entities/UserEntity.php');

class UserController
{
    private $usr;
    private $ue;
    function __construct($request = null){
        $this->usr = new User($request);
        $this->ue  = new UserEntity($request);
    }

    function login()
    {
        global $_s;
        if($uid = $this->ue->bindUserPassword()){

            $tok = $this->generateLoginToken($uid);
            error_log($tok);

            if($tok != null && $tok != ""){
                \sendJsonResponse(['res'=> "Você entrou!", 'err'=>false, 'tok'=>$tok]);
                $_s->newSessionValue('auth', true);
                $_s->newSessionValue('uid', $uid);

            }else{
                \sendJsonResponse(['res'=> "Houve um problema ao realizar seu login :/", 'err'=>true]);
            }
            return true;
        }else{
            \sendJsonResponse(['res'=>'Seu e-mail ou senha estão incorretos!','err'=>true]);
        }
        return false;
    }

    function generateLoginToken($uid)
    {
        $tok = $this->ue->getActiveToken($uid);

        if(!$tok){
            $tok = $this->usr->generateLoginToken($uid);

            if($this->ue->saveToken($uid, $tok)){
                return $tok;
            }
            return false;
        }
        return $tok;
    }



    function signUp()
    {
        if($this->usr->signUp()){
            sendJsonResponse(['res' => 'Cadastro realizado com sucesso!']);
        }
    }

    function isLoggedIn()
    {
        if(\array_key_exists(hash('sha256', 'auth'), $_SESSION) && $_SESSION[hash('sha256', 'auth')]){
            return true;
        }
        return false;
    }

    function logOut()
    {
        $_SESSION = [];
        session_destroy();
        \sendJsonResponse(['res'=>'Você saiu.']);
    }

    function addUserEthWallet($uid, $wallet)
    {
        if($this->ue->addUserEthWallet($uid, $wallet)){
            \sendJsonResponse(['res' => 'Carteira '.$wallet.' inserida com sucesso.', 'err'=>false]);
        }else{
            \sendJsonResponse(['res' => 'Houve um problema ao alterar este parâmetro..', 'err'=>true]);
        }
    }

    function getUserWallet($uid)
    {
        $w = $this->ue->getUserWallet($uid);
        if($w)
            \sendJsonResponse(['res' => $w, 'err'=>false]);
        else
            \sendJsonResponse(['res' => 'Carteira ou usuário não encontrado.', 'err'=>true]);

    }

}
