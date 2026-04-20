<?php

class Funcionario implements JsonSerializable {

    private $id;
    private $nome;
    private $matricula;
    private $senha;
    private $foto;
    private $setor_id;

    public function __construct() {
    }
    
    public function jsonSerialize() : mixed {
        $vars = get_object_vars($this);
        return $vars;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function getSetor_id() {
        return $this->setor_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNome($nome): void {
        $this->nome = $nome;
    }

    public function setMatricula($matricula): void {
        $this->matricula = $matricula;
    }

    public function setSenha($senha): void {
        $this->senha = $senha;
    }

    public function setFoto($foto): void {
        $this->foto = $foto;
    }

    public function setSetor_id($setor_id): void {
        $this->setor_id = $setor_id;
    }
    
}
