<?php

namespace Core;
use PDO;
use Core\Response;

class Database{

    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '') {
        $dsn = 'mysql:'. http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, $username, $password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }


    public function query($query, $params=[]){
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        
        return $this;
    }


    public function get(){
        return $this->statement->fetch();
    }
    public function getAll(){
        return $this->statement->fetchAll();
    }


    public function findOrFail(){
        $result = $this->get();
        if(!$result){
            abort(Response::NOT_FOUND);
        }
        return $result;
    }



}