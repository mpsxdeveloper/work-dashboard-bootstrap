<?php

header("Content-Type: application/json; charset=utf-8");
require_once("../dao/FuncionarioStatusDAO.php");

session_start();
$query = trim(filter_input(INPUT_POST, "query"));

if($query == "salvar") {
    $funcionario_id = $_SESSION["id"];
    $datastatus = filter_input(INPUT_POST, "datastatus");
    $status_id = filter_input(INPUT_POST, "status_id");
    $funcionarioStatus = new FuncionarioStatus();
    $funcionarioStatus->setDatastatus($datastatus);
    $funcionarioStatus->setStatus_id($status_id);
    $funcionarioStatus->setFuncionario_id($funcionario_id);
    $funcionarioStatusDAO = new FuncionarioStatusDAO();
    echo json_encode($funcionarioStatusDAO->salvar($funcionarioStatus));
}
else if($query == "listar") {
    $setor_id = filter_input(INPUT_POST, "setor_id");
    $funcionarioStatusDAO = new FuncionarioStatusDAO();
    echo json_encode($funcionarioStatusDAO->listar($setor_id));
}