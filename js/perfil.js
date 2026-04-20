$(document).ready(function () {
    
    $('#matricula').mask('999.999.99-A');
    $('#matricula').blur(function() {
        $('#matricula').val($('#matricula').val().toUpperCase());
    });
    
    $('#formulario').submit(function(e) {
        e.preventDefault();
    });
    
    $('#atualizar').click(function () {
        var nome = $('#nome').val().trim().toUpperCase();
        var matricula = $('#matricula').val().trim();
        var setor_id = $('#setor').val();
        var foto = $("#atualizarfoto")[0].files[0];
        var csrf_token = $('#csrf_token').val();
        var formulario = new FormData();
        if(nome === '') {
            $('.alert').show();
            $('.alert-message').text("Preencha o nome");
            $('#nome').focus();
        }
        else if(matricula === '') {
            $('.alert').show();
            $('.alert-message').text("Preencha a matrícula");
            $('#matricula').focus();
        }
        else if(setor_id === '') {
            $('.alert').show();
            $('.alert-message').text("Informe o setor");
            $('#setor').focus();
        }
        else {
            formulario.append('query', 'editar');
            formulario.append('nome', nome);
            formulario.append('matricula', matricula);
            formulario.append('setor_id', setor_id);
            formulario.append('csrf_token', csrf_token);
            formulario.append('foto', foto);
            $.ajax({
                method: 'POST',
                url: '../controllers/FuncionarioController.php',
                data: formulario,
                contentType: false,
                processData: false,
                dataType: 'json'
            })
            .done(function (data) {
                if(data === true) {
                    logout();
                }
                else {
                    $('.alert').show();
                    $('.alert-message').text("Erro. Verifique se a matrícula já foi utilizada");
                    $('#datastatus').focus();
                }
            });
        }
    });
    
    $('#fotoicone').click(function () {
        $('#atualizarfoto').click();
    });
    
    $.ajax({
        method: 'POST',
        url: '../controllers/FuncionarioController.php',
        data: {'query': 'get'},
        dataType: 'json'
    }).done(function (funcionario) {
        $('#nome').val(funcionario["nome"]);
        $('#matricula').val(funcionario["matricula"]);
        $('#setor').val(funcionario["setor_id"]);
        $('#foto').attr("src", "../imagens/" + funcionario["foto"]);
    });
    
});