<?php

namespace Entity;
use \PDO;

class UserEntity
{
    private $name;
    private $email;
    private $pwd;
    private $st = 1;

    function __construct($data)
    {
        if($data!=null){
            if(array_key_exists('name', $data)){
                $this->name  = $data['name'];
            }

            if(array_key_exists('email', $data)){
                $this->email = $data['email'];
            }

            if(array_key_exists('pwd', $data)){
                $this->pwd   = hash('sha256',$data['pwd']);
            }
        }

    }

    function doRequest($request)
    {
        try{
            if($request->execute()){
                return true;
            }
        }catch(PDOException $e){
            sendJsonResponse(['err' => $e->getMessage()]);
        }
        return false;
    }

    function insert()
    {
        global $conn;

        if(!$this->checkEmailRegistered()){

        $query  = 'call create_user(?, ?, ?);';

        $q = $conn->prepare($query);
            $q->bindParam(1, $this->name);
            $q->bindParam(2, $this->email);
            $q->bindParam(3, $this->pwd);

            return $this->doRequest($q);
        }else{
            sendJsonResponse(['err'=>'Este e-mail já está registrado.']);
        }
    }

    function addUserEthWallet($uid, $wallet)
    {
        global $conn;

        $query = "UPDATE user_data SET ether_wallet = ? WHERE user_id = ?";
        $user_data_id = $this->getUserDataId($uid);

        $q = $conn->prepare($query);
        $q->bindParam(1, $wallet);
        $q->bindParam(2, $user_data_id);

        return $this->executeQuery($q);

    }

    function getUserWallet($uid)
    {
        global $conn;

        $udata = $this->getUserDataId($uid);
        $query = "SELECT ether_wallet FROM user_data WHERE user_id = ?";

        $q = $conn->prepare($query);
        $q->bindParam(1, $udata);

        if($q = $this->executeQuery($q)){
            $r = $q->fetch(PDO::FETCH_NUM);
            return $r[0];
        }

        return false;

    }

    function checkEmailRegistered()
    {
        global $conn;

        $q = $conn->prepare('SELECT email FROM users WHERE email = ? LIMIT 1');
        $q->bindParam(1, $this->email);

        if($q->execute() && $q->rowCount() == 1){
            return true;
        }
        return false;
    }

    function bindUserPassword()
    {
        global $conn;

        $q = $conn->prepare('SELECT id FROM users WHERE email = ? AND pwd = ? LIMIT 1');
        $q->bindParam(1, $this->email);
        $q->bindParam(2, $this->pwd);

        if($q->execute() && $q->rowCount() == 1){
            return $q->fetch(PDO::FETCH_NUM)[0];
        }
        return false;
    }

    function saveToken($uid, $tok)
    {
        global $conn;


            $query = "INSERT INTO login_sessions (user_id, token) VALUES (?, ?)";

            $q = $conn->prepare($query);
            $q->bindParam(1, $uid);
            $q->bindParam(2, $tok);

            if($this->executeQuery($q)){
                return true;
            }
            return false;
    }

    function getActiveToken($uid)
    {
        global $conn;

        $query = "SELECT token FROM login_sessions WHERE user_id = ? AND status = 1";

        $q = $conn->prepare($query);
        $q->bindParam(1, $uid);

        $q = $this->executeQuery($q);

        if($q && $q->rowCount() === 1){
            $r = $q->fetch(PDO::FETCH_NUM)[0];
            return $r;
        }
        return false;

    }

    function getUserDataId($uid)
    {
        global $conn;

        $query = 'SELECT id FROM user_data WHERE user_id = ?';

        $q = $conn->prepare($query);
        $q->bindParam(1, $uid);

        if($q = $this->executeQuery($q)){
            $r = $q->fetch(PDO::FETCH_NUM);
            return $r[0];
        }
        return false;

    }

    function executeQuery($q)
    {
        try{
            if($q->execute()) return $q;
        }catch(PDOExeption $e){
            print_r($e->getMessage());
        }
        return false;
    }

}