<?php require_once("sessao.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Work Dashboard - Meu Status</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>
    
    <body class="bg-dark text-light fw-bold">

        <div class="container w-75">            
            <?php
                $pagina = "status";
                require_once "header.php";
                require_once "menu.php";
            ?>            
            <div class="row mt-3">
                <div class="col-6 text-center">
                    <i class="bi bi-info-square-fill" style="font-size: 12rem;"></i>
                </div>
                <div class="col-6">
                    <form class="mt-5">
                        <input type="hidden" id="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" />
                        <div class="mb-3">
                            <label class="mb-2">Data</label>
                            <input type="text" id="datastatus" class="form-control" readonly value="<?=date('d/m/Y')?>" />
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Status</label>
                            <select class="form-select" id="status_id" aria-label="Default select example">
                                <option selected value="">Selecione seu status</option>                                
                            </select>
                        </div>
                        <div class="mb-3 text-end">
                            <button id="salvarfuncionariostatus" class="btn btn-success mb-2" type="button">
                                <i class="bi bi-save-fill"></i> Salvar
                            </button>
                        </div>
                        <div class="mb-3">
                            <div class="alert alert-danger" role="alert" style="display: none;">
                                <span><i class="bi bi-exclamation-octagon-fill"></i></span><span class="ms-3 alert-message"></span>
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
        
        <script src="../js/status.js"></script>
        <script src="../js/funcionario_status.js"></script>
        
        <script>
            listar();
        </script>
        
    </body>
    
</html>