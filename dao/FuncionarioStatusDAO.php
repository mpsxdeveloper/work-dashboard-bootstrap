<?php

require("Conexao.php");
require("../model/FuncionarioStatus.php");

class FuncionarioStatusDAO {
    
    public function salvar(FuncionarioStatus $funcionarioStatus) {     
        
        try {
            $connection = Conexao::conectar();
            $id = $this->checar($funcionarioStatus);

            if($id == null) {
                $sql = "INSERT INTO funcionarios_status (datastatus, status_id, funcionario_id) 
                    VALUES (:datastatus, :status_id, :funcionario_id)";
                $rs = $connection->prepare($sql);
                $rs->bindValue(":datastatus", $funcionarioStatus->getDatastatus());
                $rs->bindValue(":status_id", $funcionarioStatus->getStatus_id());
                $rs->bindValue(":funcionario_id", $funcionarioStatus->getFuncionario_id());
                $rs->execute();
                if($rs->rowCount() > 0) {
                    return true;
                }
            }
            else {
                $sql = "UPDATE funcionarios_status SET datastatus = :datastatus, 
                    status_id = :status_id WHERE id = :id";
                $rs = $connection->prepare($sql);
                $rs->bindValue(":datastatus", $funcionarioStatus->getDatastatus());
                $rs->bindValue(":status_id", $funcionarioStatus->getStatus_id());
                $rs->bindValue(":id", $id);
                $rs->execute();
                return true;
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return false;
        
    }
    
    public function listar($setor_id) {
        
        $lista = array();
        $data = date('Y-m-d');
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT f.id, func.nome, func.foto, s.descricao FROM funcionarios_status f
                    INNER JOIN status s 
                    ON f.status_id = s.id
                    INNER JOIN funcionarios func
                    ON func.id = f.funcionario_id
                    WHERE func.setor_id = :setor_id AND f.datastatus = :datastatus";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":setor_id", $setor_id);
            $rs->bindValue(":datastatus", $data);
            $rs->execute();
            if($rs->rowCount() > 0) {
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    $class = new stdClass();                    
                    $class->foto = $row->foto;
                    $class->nome = $row->nome;
                    $class->descricao = $row->descricao;
                    array_push($lista, $class);
                }
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return $lista;
        
    }
    
    public function checar(FuncionarioStatus $funcionarioStatus) {
        
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT id FROM funcionarios_status 
                WHERE datastatus = :datastatus AND funcionario_id = :funcionario_id";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":datastatus", $funcionarioStatus->getDatastatus());
            $rs->bindValue(":funcionario_id", $funcionarioStatus->getFuncionario_id());
            $rs->execute();
            if($rs->rowCount() > 0) {
                $row = $rs->fetch(PDO::FETCH_ASSOC);
                return $row["id"];
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return null;
        
    }
    
}