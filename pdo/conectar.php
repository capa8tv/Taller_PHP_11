<?php
//namespace Capa8;
//llamamos al Namespace de la clase nativa de PDO
//use PDO;
abstract class Conectar
{
    private $pdo;
    
    public function con()
    {
        try
        {
            return $this->pdo=new PDO("mysql:dbname=curso_java;host=localhost","root","");
        }catch(PDOException $e)
        {
            echo $e->getMessage();
            exit;
        }
    }  
    public function setNames()
    {
       return $this->pdo->query("SET NAMES 'utf8'"); 
    } 
} 
