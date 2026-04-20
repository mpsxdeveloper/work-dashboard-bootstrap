<?php

header("Content-Type: application/json; charset=utf-8");
require_once("../dao/SetorDAO.php");

session_start();
$query = trim(filter_input(INPUT_POST, "query"));

if($query == "salvar") {
    $funcionario_id = $_SESSION["id"];
    $nome = filter_input(INPUT_POST, "nome");
    $csrf_token = filter_input(INPUT_POST, "csrf_token");
    $setor = new Setor();
    $setor->setNome($nome);
    $setorDAO = new SetorDAO();
    if($csrf_token == $_SESSION['csrf_token']) {    
        echo json_encode($setorDAO->salvar($setor));
    }
    else {
        echo json_encode(false);
    }
    
}
else if($query == "get") {
    $id = filter_input(INPUT_POST, "setor_id");
    $setorDAO = new SetorDAO();
    echo json_encode($setorDAO->getSetor($id));
}
else if($query == "listar") {    
    $setorDAO = new SetorDAO();
    echo json_encode($setorDAO->listar());
}