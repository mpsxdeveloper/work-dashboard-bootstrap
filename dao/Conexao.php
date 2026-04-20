<?php

class Conexao {
    
    public static function conectar() {
        
        $dbname = "workdashboard";
        $dbhost = "localhost";
        $dbuser = "";
        $dbpassword = "";
        try {
            $conexao = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpassword);
            return $conexao;
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
        return null;
        
    }
    
}
