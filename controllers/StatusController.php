<?php

header("Content-Type: application/json; charset=utf-8");
require_once("../dao/StatusDAO.php");

session_start();
$query = trim(filter_input(INPUT_POST, "query"));
if($query == "listar") {
    $statusDAO = new StatusDAO();
    echo json_encode($statusDAO->listar());
}
else if($query == "salvar") {
    $csrf_token = filter_input(INPUT_POST, "csrf_token");
    $descricao = filter_input(INPUT_POST, "descricao");
    $status = new Status();
    $statusDAO = new StatusDAO();
    $status->setDescricao($descricao);
    if($csrf_token == $_SESSION['csrf_token']) {
        echo json_encode($statusDAO->salvar($status));
    }
    else {
        echo json_encode(false);
    }
}