<?php

require("Conexao.php");
require("../model/Setor.php");

class SetorDAO {
    
    public function salvar(Setor $setor) {
        
        try {
            $connection = Conexao::conectar();
            $sql = "INSERT INTO setores (nome) VALUES (:nome)";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":nome", $setor->getNome());            
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
        
        $setores = array();
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT * FROM setores";
            $rs = $connection->query($sql);            
            $rs->execute();            
            if($rs->rowCount() > 0) {
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    $setor = new Setor();
                    $setor->setId($row->id);
                    $setor->setNome($row->nome);
                    array_push($setores, $setor);
                }
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return $setores;
        
    }

    public function getSetor($id) {
        
        $setor = null;
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT * FROM setores WHERE id = :id";
            $rs = $connection->prepare($sql);
            $rs->bindParam(":id", $id);
            $rs->execute();
            if($rs->rowCount() > 0) {
                $row = $rs->fetch(PDO::FETCH_OBJ);
                $setor = new Setor();
                $setor->setId($row->id);
                $setor->setNome($row->nome);                
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return $setor;
        
    }
    
    public function editar(Setor $setor) {
        
        try {
            $connection = Conexao::conectar();
            $sql = "UPDATE setores SET nome = :nome WHERE id = :id";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":nome", $setor->getNome());            
            $rs->bindValue(":id", $setor->getId());
            $rs->execute();
            return true;            
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return false;
        
    }
    
}