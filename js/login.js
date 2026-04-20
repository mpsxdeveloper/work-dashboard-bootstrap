$(document).ready(function () {
    $('#matricula').focus();
    $('#matricula').mask('999.999.99-a');
    $('#matricula').blur(function() {
        $('#matricula').val($('#matricula').val().toUpperCase());
    });
    $('#acessar').click(function () {
        var matricula = $('#matricula').val().trim();
        var senha = $('#senha').val();
        var csrf_token = $('#csrf_token').val();
        if(matricula === '') {
            $('.alert').show();
            $('.alert-message').text("Insira a matrícula");
            $('#matricula').focus();
        }
        else if(senha === '') {
            $('.alert').show();
            $('.alert-message').text("Insira a senha");
            $('#senha').focus();
        }
        else {
            $.ajax({
                method: 'POST',
                url: 'controllers/FuncionarioController.php',
                data: {'query': 'login', 'matricula': matricula, 'senha': senha, 'csrf_token':csrf_token},
                dataType: 'json'
            })
            .done(function (data) {
                if(data === true) {
                    window.location = "views/dashboard.php";
                }
                else {
                    $('.alert').show();
                    $('.alert-message').text("Matrícula e/ou senha incorretas");
                    $('#matricula').focus();
                }
            });
        }
    });
});