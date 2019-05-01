<?php

namespace Entity\News;
use \PDO;

class NewsEntity
{
    private $title;
    private $text;

    function __construct($data)
    {
        if($data!=null){
            if(array_key_exists('arttitulo', $data)){
                $this->title  = $data['arttitulo'];
            }
            
            if(array_key_exists('arttexto', $data)){
                $this->text = $data['arttexto'];
            }

        }

    }

    function doRequest($request)
    {
        try{
            if($request->execute()){
                return $request;
            }
        }catch(PDOException $e){
            sendJsonResponse(['err' => $e->getMessage()]);
        }
        return false;
    }

    function getNews($search = "")
    {   
        global $conn;
        $c = "";
        if($search != ""){
            $c = " WHERE (arttitulo LIKE '%".$search."%' OR arttexto LIKE '%".$search."%') OR ";
            $s = explode(',', \swapChars($search));
            if(is_array($s)){
                foreach($s as $key){
                    $c .= " (arttitulo LIKE '%".$key."%' OR arttexto LIKE '%".$key."%') OR ";
                }
            }
            $c = rtrim($c, ' OR ');
        }
        $query = 'SELECT * FROM artigo '.$c. ' LIMIT 0, 20';
        
        $q = $conn->prepare($query);

        return \makeArrayFromQuery($this->doRequest($q));
    }


}