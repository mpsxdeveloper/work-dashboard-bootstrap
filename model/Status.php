<?php

class Status implements JsonSerializable {

    private $id;
    private $descricao;

    public function __construct() {
    }

    public function jsonSerialize() : mixed {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setDescricao($descricao): void {
        $this->descricao = $descricao;
    }

}