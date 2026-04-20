<?php

header("Content-Type: application/json; charset=utf-8");
require_once("../dao/FuncionarioDAO.php");

session_start();
$query = trim(filter_input(INPUT_POST, "query"));
if($query == "login") {
    $matricula = trim(filter_input(INPUT_POST, "matricula"));
    $senha = trim(filter_input(INPUT_POST, "senha"));
    $csrf_token = filter_input(INPUT_POST, "csrf_token");
    $funcionarioDAO = new FuncionarioDAO();
    $f = new Funcionario();
    $f->setMatricula($matricula);
    $f->setSenha($senha);
    $funcionario = $funcionarioDAO->login($f);
    if($funcionario != null) {
        if($csrf_token == $_SESSION['csrf_token']) {
            $_SESSION["id"] = $funcionario->getId();
            $_SESSION["nome"] = $funcionario->getNome();
            $_SESSION["setor_id"] = $funcionario->getSetor_id();            
            echo json_encode(true);
        }
        else {
            echo json_encode(false);
        }
    }
    else {
        echo json_encode(false);
    }
}
else if($query == "logout") {
    unset($_SESSION["id"]);
    unset($_SESSION["nome"]);
    unset($_SESSION["setor_id"]);
    session_destroy();
    echo json_encode(true);
}
else if($query == "get") {
    $id = $_SESSION["id"];
    $funcionarioDAO = new FuncionarioDAO();
    echo json_encode($funcionarioDAO->get($id));
}
else if($query == "alterarsenha") {
    $senha_atual = filter_input(INPUT_POST, "senha_atual");
    $nova_senha = filter_input(INPUT_POST, "nova_senha");
    $confirma_senha = filter_input(INPUT_POST, "confirma_senha");
    $id = filter_input(INPUT_POST, "id");
    $usuarioDAO = new FuncionarioDAO();
    echo json_encode($usuarioDAO->atualizarSenha($senha_atual, password_hash($nova_senha, PASSWORD_DEFAULT), $id));
}
else if($query == "salvar") {
    $csrf_token = filter_input(INPUT_POST, "csrf_token");
    $nome = filter_input(INPUT_POST, "nome");
    $matricula = filter_input(INPUT_POST, "matricula");
    $senha = password_hash(filter_input(INPUT_POST, "senha"), PASSWORD_DEFAULT);
    $setor_id = filter_input(INPUT_POST, "setor_id");
    $funcionario = new Funcionario();
    $funcionario->setNome($nome);
    $funcionario->setMatricula($matricula);
    $funcionario->setSenha($senha);
    $funcionario->setSetor_id($setor_id);
    $funcionarioDAO = new FuncionarioDAO();
    if($csrf_token == $_SESSION['csrf_token']) {
        echo json_encode($funcionarioDAO->salvar($funcionario));
    }
    else {
        echo json_encode(false);
    }
    
}
 else if ($query == "editar") {
    $id = $_SESSION["id"];
    $funcionario = new Funcionario();
    $csrf_token = filter_input(INPUT_POST, "csrf_token");
    $nome = filter_input(INPUT_POST, "nome");
    $matricula = filter_input(INPUT_POST, "matricula");
    $setor_id = filter_input(INPUT_POST, "setor_id");
    $foto = isset($_FILES["foto"]) ? $_FILES["foto"] : null;    
    if($foto != null) {
        if(in_array($foto['type'], ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
            $fotoNome = md5($id).'.jpg';
            $funcionario->setFoto($fotoNome);
            move_uploaded_file($_FILES['foto']['tmp_name'], "../imagens/".$fotoNome);
        }
        else {
            $funcionario->setFoto(null);
        }
    }
    else {
        $funcionario->setFoto(null);
    }
    $funcionario->setId($id);
    $funcionario->setNome($nome);
    $funcionario->setMatricula($matricula);
    $funcionario->setSetor_id($setor_id);    
    $funcionarioDAO = new FuncionarioDAO();
    if($csrf_token == $_SESSION['csrf_token']) {
        echo json_encode($funcionarioDAO->editar($funcionario));
    }
    else {
        echo json_encode(false);
    }
    
}
