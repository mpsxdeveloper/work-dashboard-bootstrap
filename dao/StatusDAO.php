<?php

require("Conexao.php");
require("../model/Status.php");

class StatusDAO {
    
    public function salvar(Status $status) {        
        
        try {
            $connection = Conexao::conectar();
            $sql = "INSERT INTO status (descricao) VALUES (:descricao)";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":descricao", $status->getDescricao());            
            $rs->execute();
            if($rs->rowCount() > 0) {
                return true;
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return false;
        
    }
    
    public function listar() {
        
        $lista = array();
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT * FROM status";
            $rs = $connection->query($sql);            
            $rs->execute();            
            if($rs->rowCount() > 0) {
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    $status = new Status();
                    $status->setId($row->id);
                    $status->setDescricao($row->descricao);
                    array_push($lista, $status);
                }
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return $lista;
        
    }
    
    public function editar(Status $status) {
        
        try {
            $connection = Conexao::conectar();
            $sql = "UPDATE status SET descricao = :descricao WHERE id = :id";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":descricao", $status->getDescricao());            
            $rs->bindValue(":id", $status->getId());
            $rs->execute();
            return true;            
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return false;
        
    }
    
}