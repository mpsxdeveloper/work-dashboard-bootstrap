<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Work Dashboard - Início</title>
</head>

<body class="bg-dark text-light fw-bold">
        
        <?php
            session_start();
            if(!isset($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = md5(time().rand(0,999));
            }
        ?>
        
        <div class="container w-75 bg-primary text-white text-center fw-bold fs-1 p-2">
            <p>Work Dashboard</p>
        </div>

        <div class="container w-50">
            <div class="row">
                <div class="col-6 mt-5">
                    <form class="mt-5">
                        <input type="hidden" id="csrf_token" value="<?=$_SESSION['csrf_token']?>" />
                        <div class="mb-3">
                            <label class="mb-2">Matrícula</label>
                            <input type="text" id="matricula" class="form-control" maxlength="12" />
                        </div>
                        <div class="mb-3">
                            <label class="mb-2">Senha</label>
                            <input type="password" id="senha" class="form-control" maxlength="60" />
                        </div>
                        <div class="mb-3">
                            <button id="acessar" class="btn btn-primary mb-2" type="button">
                                <i class="bi bi-arrow-right-circle-fill"></i> Acessar
                            </button>
                        </div>
                        <div class="mb-3">
                            <div class="alert alert-danger" role="alert" style="display: none;">
                                <span><i class="bi bi-exclamation-octagon-fill"></i></span><span class="ms-3 alert-message"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-6 text-center">
                    <i class="bi bi-person-lines-fill" style="font-size: 16rem;"></i>
                </div>
            </div>
            
        </div>

        <script src="js/login.js"></script>
        
    </body>

</html>