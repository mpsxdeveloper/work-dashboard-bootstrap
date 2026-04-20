<?php

class FuncionarioStatus implements JsonSerializable {

    private $id;
    private $datastatus;
    private $funcionario_id;
    private $status_id;

    public function __construct() {
    }

    public function jsonSerialize() : mixed {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function getId() {
        return $this->id;
    }

    public function getDatastatus() {
        return $this->datastatus;
    }

    public function getFuncionario_id() {
        return $this->funcionario_id;
    }

    public function getStatus_id() {
        return $this->status_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setDatastatus($datastatus): void {
        $this->datastatus = $datastatus;
    }

    public function setFuncionario_id($funcionario_id): void {
        $this->funcionario_id = $funcionario_id;
    }

    public function setStatus_id($status_id): void {
        $this->status_id = $status_id;
    }

}