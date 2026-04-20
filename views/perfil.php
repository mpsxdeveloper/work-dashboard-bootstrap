<?php require_once("sessao.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Work Dashboard - Meu Perfil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </head>
    
    <body class="bg-dark text-light fw-bold">
        
        <div class="container w-75">            
            <?php
                $pagina = "perfil";
                require_once "header.php";
                require_once "menu.php";
                if(!isset($_SESSION['csrf_token'])) {
                    $_SESSION['csrf_token'] = md5(time().rand(0,999));
                }
            ?>
            
        <form id="formulario" enctype="multipart/form-data" method="post">
                <div class="row mt-3">           
                    <div class="col-6">                        
                        <img id="foto" class="img-flclassuid" width="400" height="400" />
                        <button id="fotoicone" class="btn btn-warning" style="position: absolute; top: 25%; left: 40%;"><i class="bi bi-camera-fill"></i></button>
                        <input type="file" id="atualizarfoto" style="position: relative; left: -1000px;" />
                    </div>
                    <div class="col-6">
                        <input type="hidden" id="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" />
                        <div class="mb-3">
                            <label class="mb-1">Nome</label>
                            <input type="text" id="nome" class="form-control" maxlength="30" />
                        </div>
                        <div class="mb-3">
                            <label class="mb-1">Matrícula</label>
                            <input type="text" id="matricula" class="form-control" />
                        </div>                        
                        <div class="mb-3">
                            <label class="mb-1">Setor</label>
                            <select class="form-select" id="setor" aria-label="Default select example">
                                <option selected value="">Selecione o setor</option>                                
                            </select>
                        </div>
                        <div class="mb-3 text-end">
                            <button id="atualizar" class="btn btn-success mb-2" type="submit">
                                <i class="bi bi-pencil-square"></i> Atualizar
                            </button>
                        </div>
                        <div class="mb-3">
                            <div class="alert alert-danger" role="alert" style="display: none;">
                                <span><i class="bi bi-exclamation-octagon-fill"></i></span><span class="ms-3 alert-message"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
        <script src="../js/logout.js"></script>
        <script src="../js/setores.js"></script>
        <script src="../js/perfil.js"></script>
        
        <script>
            listar();
        </script>
        
    </body>
    
</html>