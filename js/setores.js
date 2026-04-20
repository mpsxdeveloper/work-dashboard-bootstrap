$(document).ready(function () {
    
    $('#salvar').click(function () {
        var nome = $('#nome').val().trim().toUpperCase();        
        var csrf_token = $('#csrf_token').val();
        if(nome === '') {
            $('.alert').show();
            $('.alert-message').text("Insira o nome do setor");
            $('#nome').focus();
        }
        else {
            $.ajax({
                method: 'POST',
                url: '../controllers/SetorController.php',
                data: {'query': 'salvar', 'nome': nome, 'csrf_token':csrf_token},
                dataType: 'json'
            })
            .done(function (data) {
                if(data === true) {
                    window.location = "dashboard.php";
                }
                else {
                    $('.alert').show();
                    $('.alert-message').text("Erro. Verifique se já existe um setor com esse nome");
                    $('#nome').focus();
                }
            });
        }
    });
    
});

function listar() {
    $.ajax({
        method: 'POST',
        url: '../controllers/SetorController.php',
        data: {'query': 'listar'},
        dataType: 'json'
    }).done(function (data) {
        $.each(data, function (index, element) {
            $('#setor').append($("<option />").val(element['id']).text(element['nome']));
        });
    });
}