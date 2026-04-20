<?php

require("Conexao.php");
require("../model/Funcionario.php");

class FuncionarioDAO {
    
    public function get($id) {
        
        $funcionario = null;
        try {            
            $connection = Conexao::conectar();
            $sql = "SELECT * FROM funcionarios WHERE id = :id";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":id", $id);
            $rs->execute();
            if($rs->rowCount() > 0) {
                $row = $rs->fetch(PDO::FETCH_OBJ);
                $funcionario = new Funcionario();
                $funcionario->setId($row->id);
                $funcionario->setMatricula($row->matricula);
                $funcionario->setNome($row->nome);
                $funcionario->setFoto($row->foto);
                $funcionario->setSetor_id($row->setor_id);                
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return $funcionario;
        
    }
    
    public function salvar(Funcionario $funcionario) {        
        
        try {
            $connection = Conexao::conectar();
            $sql = "INSERT INTO funcionarios (nome, matricula, senha, setor_id) 
                   VALUES (:nome, :matricula, :senha, :setor_id)";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":nome", $funcionario->getNome());
            $rs->bindValue(":matricula", $funcionario->getMatricula());
            $rs->bindValue(":senha", $funcionario->getSenha());
            $rs->bindValue(":setor_id", $funcionario->getSetor_id());
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
    
    public function login(Funcionario $f) {        
        
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT * FROM funcionarios WHERE matricula = :matricula";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":matricula", $f->getMatricula());
            $rs->execute();
            if($rs->rowCount() > 0) {
                $row = $rs->fetch(PDO::FETCH_OBJ);
                $funcionario = new Funcionario();
                if(password_verify($f->getSenha(), $row->senha)) {
                    $funcionario = new Funcionario();
                    $funcionario->setSenha("");
                    $funcionario->setId($row->id);
                    $funcionario->setNome($row->nome);
                    $funcionario->setMatricula($row->matricula);
                    $funcionario->setSetor_id($row->setor_id);
                    return $funcionario;
                }
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return null;
        
    }
    
    public function atualizarSenha(Funcionario $f, $novasenha) {
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT senha FROM usuarios WHERE id = :id";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":id", $f->getId());
            $rs->execute();
            if($rs->rowCount() > 0) {
                $row = $rs->fetch(PDO::FETCH_ASSOC);
                if(password_verify($f->getSenha(), $row["senha"])) {
                    $sql = "UPDATE usuarios SET senha = :senha WHERE id = :id";
                    $rs = $connection->prepare($sql);
                    $rs->bindValue(":senha", $novasenha);
                    $rs->bindValue(":id", $f->getId());
                    $rs->execute();
                    return true;
                }
                else {
                    return "senhaincorreta";
                }
            }
            else {
                return null;
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return null;
    }
    
    public function listar($setor_id) {
        
        $funcionarios = array();
        try {
            $connection = Conexao::conectar();
            $sql = "SELECT * FROM funcionarios WHERE setor_id = :setor_id";
            $rs = $connection->prepare($sql);
            $rs->bindValue(":setor_id", $setor_id);
            $rs->execute();            
            if($rs->rowCount() > 0) {
                while($row = $rs->fetch(PDO::FETCH_OBJ)) {
                    $funcionario = new Funcionario();
                    $funcionario->setId($row->id);
                    $funcionario->setMatricula($row->matricula);
                    $funcionario->setNome($row->nome);
                    $funcionario->setSetor_id($row->setor_id);
                    array_push($funcionarios, $funcionario);
                }
            }
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return $funcionarios;
        
    }
    
    public function editar(Funcionario $funcionario) {
        
        try {
            $connection = Conexao::conectar();
            $sql = "";
            $rs = "";
            if($funcionario->getFoto() != null) {
                $sql = "UPDATE funcionarios SET matricula = :matricula, nome = :nome, 
                        setor_id = :setor_id, foto = :foto WHERE id = :id";
                $rs = $connection->prepare($sql);
                $rs->bindValue(":foto", $funcionario->getFoto());
            }
            else {
                $sql = "UPDATE funcionarios SET matricula = :matricula, nome = :nome, 
                        setor_id = :setor_id WHERE id = :id";
                $rs = $connection->prepare($sql);
            }           
            $rs->bindValue(":matricula", $funcionario->getMatricula());
            $rs->bindValue(":nome", $funcionario->getNome());
            $rs->bindValue(":setor_id", $funcionario->getSetor_id());            
            $rs->bindValue(":id", $funcionario->getId());
            $rs->execute();
            return true;            
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
        return false;
        
    }
    
}