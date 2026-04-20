<?php require_once("sessao.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Work Dashboard - Funcionários</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    
    <body class="bg-dark text-light fw-bold">

        <div class="container w-75">            
            <?php
                $pagina = "funcionarios";
                require_once "header.php";
                require_once "menu.php";
            ?>            
            <div class="row mt-3">
                <div class="col-6 text-center">
                    <i class="bi bi-people-fill" style="font-size: 12rem;"></i>
                </div>
                <div class="col-6">
                    <form class="mt-3">
                        <input type="hidden" id="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" />
                        <div class="mb-2">
                            <label class="mb-2">Matrícula</label>
                            <input type="text" id="matricula" class="form-control" maxlength="12" />
                        </div>
                        <div class="mb-2">
                            <label class="mb-2">Nome</label>
                            <input type="text" id="nome" class="form-control" maxlength="30" />
                        </div>
                        <div class="mb-2">
                            <label class="mb-2">Senha</label>
                            <input type="password" id="senha" class="form-control" maxlength="60" />
                        </div>
                        <div class="mb-2">
                            <label class="mb-1">Setor</label>
                            <select class="form-select" id="setor" aria-label="Default select example">
                                <option selected value="">Selecione o setor</option>                                
                            </select>
                        </div>
                        <div class="mb-2 text-end">
                            <button id="salvarfuncionario" class="btn btn-success mb-2" type="button">
                                <i class="bi bi-save-fill"></i> Salvar
                            </button>
                        </div>
                        <div class="mb-2">
                            <div class="alert alert-danger" role="alert" style="display: none;">
                                <span><i class="bi bi-exclamation-octagon-fill"></i></span><span class="ms-3 alert-message"></span>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        
        <script src="../js/funcionarios.js"></script>
        <script src="../js/setores.js"></script>
        
        <script>
            listar();
        </script>
        
    </body>
    
</html>